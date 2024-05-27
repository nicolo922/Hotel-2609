<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['accept']) || isset($_POST['declined'])) {
        $reservation_id = isset($_POST['reservation_id']) ? intval($_POST['reservation_id']) : 0;

        if ($reservation_id > 0) {
            $action = isset($_POST['accept']) ? 'Accepted' : 'Declined';

            $sql_update = "UPDATE reservation_table SET reservation_status = '$action' WHERE reservation_id = $reservation_id";
            if ($conn->query($sql_update) === TRUE) {
                $message = "Reservation has been $action.";
            } else {
                $message = "An error occurred while updating reservation status.";
            }
        } else {
            $message = "Invalid reservation ID.";
        }
    } else {
        $checkin_date = mysqli_real_escape_string($conn, $_POST['checkin_date']);
        $checkout_date = mysqli_real_escape_string($conn, $_POST['checkout_date']);
        $room_id = isset($_POST['roomSelect']) ? intval($_POST['roomSelect']) : 0;
        $adults = isset($_POST['adults']) && is_numeric($_POST['adults']) && $_POST['adults'] >= 0 ? intval($_POST['adults']) : 0;
        $children = isset($_POST['children']) && is_numeric($_POST['children']) && $_POST['children'] >= 0 ? intval($_POST['children']) : 0;
        $totalGuests = $adults + $children;

        $roomPrices = [
            10 => 20000, // presidential suite
            8 => 15000, // executive_suite
            2 => 7000, // deluxe_room
        ];

        // Calculate total price
        $checkin = new DateTime($checkin_date);
        $checkout = new DateTime($checkout_date);
        $interval = $checkin->diff($checkout);
        $nights = $interval->days;
        $price_per_night = isset($roomPrices[$room_id]) ? $roomPrices[$room_id] : 0;
        $total_price = $nights * $price_per_night;
        // Insert reservation into database
        $sql = "INSERT INTO reservation_table (user_id, room_id, check_in_date, check_out_date, adults, children, total_price, reservation_status)
                VALUES ($user_id, $room_id, '$checkin_date', '$checkout_date', $adults, $children, $total_price, 'Pending')";


        // Redirect after processing
        header("Location: ReservationTable.php");
        exit();
    }
}

$conn->close();
?>
