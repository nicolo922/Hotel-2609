<!doctype html>
<html lang="en">
<head>
    <title>LL Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                <h1><a href="HotelHome.php" class="logo"><img src="images/logohotel.png" alt="Logo"></a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="UserTable.php"><span class="fa fa-user mr-3"></span> User Management</a>
                    </li>
                    <li>
                        <a href="RoomTable.php"><span class="fa fa-briefcase mr-3"></span> Rooms Table</a>
                    </li>
                    <li>
                        <a href="ReservationTable.php"><span class="fa fa-sticky-note mr-3"></span> Reservation Table</a>
                    </li>
                    <li>
                        <a href="AmenityTable.php"><span class="fa fa-paper-plane mr-3"></span> Amenity Table</a>
                    </li>
                    <li>
                        <a href="Login.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="content-container">
                <!-- Title Description -->
                <div class="hotel-description">
                    <h1>User Management</h1>
                    <p>You are in Admin View</p>
                </div>

                <!-- Search Form -->
                <div class="search-form mt-3">
                    <form method="post" action="">
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <br>

                <?php
                require_once "dbconnect.php";

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $search = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                    $search = $_POST['search'];
                }

                $sql = "SELECT * FROM user_table";

                if (!empty($search)) {
                    $keywords = explode(" ", $search);
                    $conditions = [];

                    foreach ($keywords as $keyword) {
                        $conditions[] = "user_id LIKE '%" . $keyword . "%' OR 
                                        full_name LIKE '%" . $keyword . "%' OR 
                                        role LIKE '%" . $keyword . "%' OR 
                                        username LIKE '%" . $keyword . "%'";
                    }

                    $sql .= " WHERE " . implode(" OR ", $conditions);
                }

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error fetching data: " . mysqli_error($conn));
                }
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>OTP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["user_id"] . "</td>";
                                echo "<td>" . $row["full_name"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["otp"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
