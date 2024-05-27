<?php
include 'dbconnect.php'; // Assuming this file contains your database connection details

// Initialize variables
$tableData = '';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM view_process";
$result = mysqli_query($conn, $sql);

// Check for errors in the query
if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}

// Process fetched data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $checkIn = new DateTime($row["check_in_date"]);
        $formattedCheckIn = $checkIn->format("F j, Y, g:i A");
        $checkOut = new DateTime($row["check_out_date"]);
        $formattedCheckOut = $checkOut->format("F j, Y, g:i A");
        $tableData .= "<tr>";
        $tableData .= "<td>" . $row["reservation_id"] . "</td>";
        $tableData .= "<td>" . $row["full_name"] . "</td>";
        $tableData .= "<td>" . $row["room_type"] . "</td>";
        $tableData .= "<td>" . $formattedCheckIn . "</td>";
        $tableData .= "<td>" . $formattedCheckOut . "</td>";
        $tableData .= "<td>" . $row["total_price"] . "</td>";
        $tableData .= "<td>" . $row["reservation_status"] . "</td>";
        $tableData .= "<td>";
        $tableData .= "<form action='booking_process.php' method='post'>";
        $tableData .= "<input type='hidden' name='reservation_id' value='" . $row["reservation_id"] . "'>";
        $tableData .= "<button type='submit' name='accept' class='btn btn-success'> Accept </button>";
        $tableData .= "&nbsp;&nbsp;&nbsp;";
        $tableData .= "<button type='submit' name='decline' class='btn btn-danger'> Decline </button>";
        $tableData .= "</form>";
        $tableData .= "</td>";
        $tableData .= "</tr>";
    }
} else {
    $tableData .= "<tr><td colspan='8'>No records found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LL Hotel</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
            <h1><a href="HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>
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

    <!-- Page Content  -->
    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Reservation ID</th>
                <th>User ID</th>
                <th>Room ID</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Total Price</th>
                <th>Reservation Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php echo $tableData; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
