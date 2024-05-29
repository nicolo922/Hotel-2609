<?php
session_start();
include 'dbconnect.php'; // Ensure this file contains the correct database connection setup

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];

// Fetch reservations for the logged-in user
$sql = "SELECT * FROM reservation_table WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Table</title>
    <link rel="icon" href="images/hotel_icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="ReservationTable.php" class="logo"><img src="images/logohotel.png"></a></h1>
            <div class="showusertype">
                <h6>Welcome Admin!</h6>
            </div>
            <ul class="list-unstyled components mb-5">
                <li><a href="UserTable.php"><span class="fa fa-user mr-3"></span> User Management</a></li>
                <li><a href="RoomTable.php"><span class="fa fa-briefcase mr-3"></span> Rooms Table</a></li>
                <li class="active"><a href="ReservationTable.php"><span class="fa fa-sticky-note mr-3"></span> Reservation Table</a></li>
                <li><a href="AmenityTable.php"><span class="fa fa-paper-plane mr-3"></span> Amenity Table</a></li>
                <li><a href="Logs.php"><span class="fa fa-paper-plane mr-3"></span> Logs</a></li>
                <li><a href="Login.php"><span class="fa fa-sign-out mr-3"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container mt-5">
            <h2>Reservation Table</h2>
            <p>You are in Admin View</p>
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
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['reservation_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['room_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['check_in_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['check_out_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($row['reservation_status']); ?></td>
                            <td><?php echo htmlspecialchars($row['adults']); ?></td>
                            <td><?php echo htmlspecialchars($row['children']); ?></td>
                            <td><?php echo htmlspecialchars($row['room_type']); ?></td>
                            <td>
                            <button type="button" class="container btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editModal<?php echo htmlspecialchars($row['reservation_id']); ?>">Edit</a>
                            <button type="button" class="container btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo htmlspecialchars($row['reservation_id']); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>