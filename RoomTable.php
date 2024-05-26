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
                <h1><a href="HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="UserTable.php"><span class="fa fa-user mr-3"></span> User Management</a>
                    </li>
                    <li class="active">
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

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="content-container">
                <!-- Title Description -->
                <div class="hotel-description">
                    <h1>Rooms Table</h1>
                    <p>You are in Admin View</p>
                </div>
                <br>
                <div class="single-room-review-area">
                    <form id="roomForm" action="room_add.php" method="POST" enctype="multipart/form-data">
                        <div class="reviwer-thumbnail">
                            <label for="upload_img" class="upload-label">
                                <img src="./img/bg-img/upload-icon.png" alt="Upload Image" id="preview_img">
                                <input type="file" name="upload_img" id="upload_img" accept="image/*" onchange="previewImg(event)" required>
                            </label>
                        </div>
                        <div class="reviwer-content">
                            <div class="form-group">
                                <label for="Room_Type">Room Type</label>
                                <input type="text" name="room_type" id="Room_Type" class="form-control" placeholder="RoomType" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <input type="text" name="description" id="Description" class="form-control" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                                <label for="Capacity">Capacity</label>
                                <input type="text" name="capacity" id="Capacity" class="form-control" placeholder="Capacity" required>
                            </div>
                            <div class="form-group">
                                <label for="Price">Price Per Night</label>
                                <input type="text" name="price" id="Price" class="form-control" placeholder="Price" required>
                            </div>
                            <div class="form-group">
                                <label for="Availability">Availability</label>
                                <input type="text" name="availability" id="Availability" class="form-control" placeholder="Availability" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="image-container">
                    <?php
                    include 'dbconnect.php';

                    // Execute a new query to fetch all room details
                    $sql = "SELECT * FROM room_table";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div>';
                            echo '<img src="' . $row['image_url'] . '" alt="Room Image">';
                            echo '<div class="room-description">';
                            echo '<h2>' . $row['room_type'] . '</h2>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<h2>Capacity: <span>' . $row['capacity'] . '</span></h2>';
                            echo '<h2>₱' . $row['price_per_night'] . ' <span>/ Day</span></h2>';
                            echo '</div>'; // Close room-description div
                            echo '</div>'; // Close main div for this room
                        }
                    } else {
                        echo "No rooms found.";
                    }

                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        </script>
    </body>
</html>
