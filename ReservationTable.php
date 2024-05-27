<?php
include 'dbconnect.php';

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

                   
