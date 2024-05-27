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
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Room Type</th>
                    <th>Adults</th>
                    <th>Children</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include 'dbconnect.php';

                // Initialize variables
                $checkin = $checkout = $room = $adult = $children = "";
                $checkinErr = $checkoutErr = "";

                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book_now"])) {
                    // Validate and sanitize input
                    $checkin = test_input($_POST['checkin']);
                    $checkout = test_input($_POST['checkout']);
                    $room = test_input($_POST['room']);
                    $adult = test_input($_POST['adult']);
                    $children = test_input($_POST['children']);

                    // Perform SQL query to insert data into reservation table
                    $sql = "INSERT INTO reservation_table (check_in_date, check_out_date, room_type, adults, children) 
                            VALUES ('$checkin', '$checkout', '$room', '$adult', '$children')";

                    // Execute SQL query
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Reservation successful!</p>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                // Function to sanitize input data
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                // Display reservations table
                $sql = "SELECT * FROM reservation_table";
                $result = $conn->query($sql);

                if ($result !== false && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["reservation_id"]."</td>";
                        echo "<td>".$row["check_in_date"]."</td>";
                        echo "<td>".$row["check_out_date"]."</td>";
                        echo "<td>".$row["room_type"]."</td>";
                        echo "<td>".$row["adults"]."</td>";
                        echo "<td>".$row["children"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No reservations found</td></tr>";
                }
                ?>
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