<?php
include 'dbconnect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['accept']) || isset($_POST['declined'])) {
        $reservation_id = isset($_POST['reservation_id']) ? intval($_POST['reservation_id']) : 0;

        if ($reservation_id > 0) {
            $action = isset($_POST['accept']) ? 'Accepted' : 'Declined';
            $sql_update = "UPDATE reservation_table SET reservation_status = ? WHERE reservation_id = ?";
            $stmt = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt, "si", $action, $reservation_id);
            if (mysqli_stmt_execute($stmt)) {
                $message = "Reservation has been $action.";
            } else {
                $message = "An error occurred while updating reservation status: " . mysqli_error($conn);
            }
        } else {
            $message = "Invalid reservation ID.";
        }
    } else {
        $check_in_date = isset($_POST['check_in_date']) ? $_POST['check_in_date'] : '';
        $check_out_date = isset($_POST['check_out_date']) ? $_POST['check_out_date'] : '';
        $room_id = isset($_POST['roomSelect']) ? intval($_POST['roomSelect']) : 0;
        $adults = isset($_POST['adults']) ? intval($_POST['adults']) : 1;
        $children = isset($_POST['children']) ? intval($_POST['children']) : 0;

        if (!$check_in_date || !$check_out_date || $room_id <= 0) {
            $message = "Please fill in all required fields.";
        } else {
            // Calculate total price
            $check_in_date = new DateTime($check_in_date);
            $check_out_date = new DateTime($check_out_date);
            $interval = $check_in_date->diff($check_out_date);
            $nights = $interval->days;

            $roomPrices = [
                10 => 20000, // Presidential Suite
                8 => 15000, // Executive Suite
                2 => 7000,  // Deluxe Room
            ];

            if (isset($roomPrices[$room_id])) {
                $price_per_night = $roomPrices[$room_id];
                $total_price = $nights * $price_per_night;

                // Check if the room_id exists in the room_table
                $sql_check_room = "SELECT COUNT(*) as count FROM your_room_table WHERE room_id = ?";
                $stmt_check_room = mysqli_prepare($conn, $sql_check_room);
                mysqli_stmt_bind_param($stmt_check_room, "i", $room_id);
                mysqli_stmt_execute($stmt_check_room);
                $result_check_room = mysqli_stmt_get_result($stmt_check_room);
                $row_check_room = mysqli_fetch_assoc($result_check_room);

                if ($row_check_room['count'] > 0) {
                    // Insert new reservation
                    $sql = "INSERT INTO reservation_table (room_id, check_in_date, check_out_date, adults, children, total_price, reservation_status)
                            VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "isiiid", $room_id, $check_in_date, $check_out_date, $adults, $children, $total_price);
                    if (mysqli_stmt_execute($stmt)) {
                        $message = "Reservation added successfully.";
                    } else {
                        $message = "An error occurred while adding reservation: " . mysqli_error($conn);
                    }
                } else {
                    $message = "Invalid room selection.";
                }
            }
        }
    }
}

$sql = "SELECT * FROM reservation_table";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Table</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <!-- Navigation Sidebar -->
    <nav id="sidebar" class="active">
        <!-- Sidebar Content -->
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>
            <!-- Navigation Links -->
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="UserTable.php"><span class="fa fa-user mr-3"></span> User Management</a>
                </li>
                <li>
                    <a href="RoomTable.php"><span class="fa fa-briefcase mr-3"></span> Rooms Table</a>
                </li>
                <li class="active">
                    <a href="ReservationTable.php"><span class="fa fa-sticky-note mr-3"></span> Reservation Table</a>
                </li>
                <li>
                    <a href="AmenityTable.php"><span class="fa fa-paper-plane mr-3"></span> Amenity Table</a>
                </li>
                <li>
                    <a href="Logs.php"><span class="fa fa-paper-plane mr-3"></span> Logs</a>
                </li>
                <li>
                    <a href="Login.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <div class="container mt-5">
        <h2>Reservation Table</h2>
        <p>You are in Admin View</p>
        <!-- Display Success or Error Messages -->
        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        <!-- Display Reservation Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>User_ID</th>
                    <th>Room_ID</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Total Price</th>
                    <th>Reservation Status</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["reservation_id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["user_id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["room_id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["check_in_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["check_out_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["total_price"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["reservation_status"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["adults"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["children"]) . "</td>";
                        echo "<td>";
                        ?>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($row["reservation_id"]); ?>">
                            <button type="submit" name="accept" class="btn btn-success">Accept</button>
                            <button type="submit" name="declined" class="btn btn-danger">Decline</button>
                        </form>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- JavaScript Libraries -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

                   
