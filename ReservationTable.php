<?php
session_start();
include 'dbconnect.php';

$message = '';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $room_id = $_POST['roomSelect'];
    $check_in_date = $_POST['checkin_date'];
    $check_out_date = $_POST['checkout_date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM room_table WHERE room_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $room_id);
        $stmt->execute();
        $stmt->bind_result($room_count);
        $stmt->fetch();
        $stmt->close();
    } else {
        $message = "Error preparing statement: " . $conn->error;
    }

    if ($room_count == 0) {
        $message = "Invalid room selection.";
    } else {
        $total_price = calculateTotalPrice($room_id, $check_in_date, $check_out_date, $adults, $children);
        $reservation_status = 'Pending';

        $stmt = $conn->prepare("INSERT INTO reservation_table (user_id, room_id, check_in_date, check_out_date, total_price, reservation_status, adults, children, room_type) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iissiiis", $user_id, $room_id, $check_in_date, $check_out_date, $total_price, $reservation_status, $adults, $children, $room_type);
            if ($stmt->execute()) {
                $message = "Reservation successful!";
            } else {
                $message = "Error executing statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message = "Error preparing statement: " . $conn->error;
        }
    }

    $conn->close();
}

function calculateTotalPrice($room_id, $check_in_date, $check_out_date, $adults, $children) {
    $roomPrices = [
        3 => 20000,
        2 => 15000,
        1 => 7000,
    ];

    if (!isset($roomPrices[$room_id])) {
        return 0;
    }

    $room_price = $roomPrices[$room_id];
    $num_nights = (strtotime($check_out_date) - strtotime($check_in_date)) / (60 * 60 * 24);
    return $room_price * $num_nights * ($adults + ($children * 0.5));
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
                        <th>Reservation_ID</th>
                        <th>User_ID</th>
                        <th>Room_ID</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Total Price</th>
                        <th>Reservation Status</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Room_Type</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'dbconnect.php'; // Ensure this file contains the correct database connection setup

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM reservation_table WHERE user_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $_SESSION['user_id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['reservation_id'] . "</td>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['room_id'] . "</td>";
                        echo "<td>" . $row['check_in_date'] . "</td>";
                        echo "<td>" . $row['check_out_date'] . "</td>";
                        echo "<td>" . $row['total_price'] . "</td>";
                        echo "<td>" . $row['reservation_status'] . "</td>";
                        echo "<td>" . $row['adults'] . "</td>";
                        echo "<td>" . $row['children'] . "</td>";
                        echo "<td>" . $row['room_type'] . "</td>";
                        echo "</tr>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>