<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LL Hotel</title>
    <link rel="icon" href="images/ball.png" type="image/x-icon">
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
        <h1><a href="Costumer_HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>

        <div class="showusertype">
        <h6>Welcome Dear Costumer!</h6>
        <p id="datetime"></p>
    </div>

          <ul class="list-unstyled components mb-5">
            <li>
              <a href="Costumer_HotelHome.php"><span class="fa fa-home mr-3"></span>Home</a>
            </li>
            <li>
              <a href="Rooms.php"><span class="fa fa-user mr-3"></span>Rooms</a>
            </li>
            <li>
              <a href="Amenities.php"><span class="fa fa-briefcase mr-3"></span>Amenities</a>
            </li>
            <li class="active">
              <a href="Booking.php"><span class="fa fa-sticky-note mr-3"></span>Book Now</a>
            </li>
            <li>
              <a href="About_Us.php"><span class="fa fa-paper-plane mr-3"></span>About Us</a>
            </li>
            <li>
                <a href="Contact_Us.php"><span class="fa fa-paper-plane mr-3"></span>Conact Us</a>
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
                <div class="about-us">
                    <h1>Room Booking</h1>
                    <p>Book your stay at LL Hotel effortlessly. Choose from our stylish range of rooms and suites, each equipped with modern amenities for a comfortable stay. Whether for business or leisure, enjoy convenience and personalized service throughout your reservation process. Reserve your room today for a memorable experience.</p>
<br>

<!-- RESERVATION INTERFACE -->      

<form action="Booking.php" method="POST" class="bookpage-form">
    <div class="bookpage-form-group">
        <label for="checkin">Check In</label>
        <input type="date" id="checkin" name="checkin_date" required>
    </div>
    <div class="bookpage-form-group">
        <label for="checkout">Check Out</label>
        <input type="date" id="checkout" name="checkout_date" required>
    </div>
    <div class="bookpage-form-group">
        <label for="room">Room</label>
        <select id="room" name="roomSelect" required>
            <option value="" disabled selected>Choose</option>
            <option value="15">Presidential Suite</option>
            <option value="14">Executive Room</option>
            <option value="13">Deluxe Suite</option>
        </select>
    </div>
    <div class="bookpage-form-group">
        <label for="adult">Adult</label>
        <input type="number" id="adult" name="adults" min="1" max="10" value="1" required>
    </div>
    <div class="bookpage-form-group">
        <label for="children">Children</label>
        <input type="number" id="children" name="children" min="0" max="10" value="0" required>
    </div>
    <div class="bookpage-form-group">
        <button type="submit" name="submit">Book Now</button>
    </div>
    <?php
        include 'dbconnect.php';

        $message = '';
        
        // Check for connection error
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Check if form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve data from session and POST request
            $user_id = $_SESSION['id'];
            $room_id = $_POST['roomSelect'];
            $check_in_date = $_POST['checkin_date'];
            $check_out_date = $_POST['checkout_date'];
            $adults = $_POST['adults'];
            $children = $_POST['children'];
        
            // Check if the selected room exists
            // $stmt = $conn->prepare("SELECT COUNT(*) FROM room_table WHERE room_id = ?");
            // if ($stmt) {
            //     $stmt->bind_param("i", $room_id);
            //     $stmt->execute();
            //     $stmt->bind_result($room_count);
            //     $stmt->fetch();
            //     $stmt->close();
            // } else {
            //     $message = "Error preparing statement: " . $conn->error;
            //     exit; // Exit script on error
            // }
        
            // Validate room selection

            if ($room_id == 0) {
                $message = "Invalid room selection.";
            } else {
                // Calculate total price
                $total_price = calculateTotalPrice($room_id, $check_in_date, $check_out_date, $adults, $children);
                $reservation_status = 'Pending';
                $room_type = $_POST['roomSelect']; // Assuming you have a way to determine room type, add logic here if needed
        
                // Insert reservation into the database
                $insertsql = "INSERT INTO reservation_table (user_id, room_id, check_in_date, check_out_date, total_price, reservation_status, adults, children, room_type) 
                VALUES ('$user_id', '$room_id', '$check_in_date', '$check_out_date', '$total_price', '$reservation_status', '$adults', '$children', '$room_type')";
                
                $result = $conn->query($insertsql);
                
                header("location: Booking.php");


            // if ($room_count == 0) {
            //     $message = "Invalid room selection.";
            // } else {
            //     // Calculate total price
            //     $total_price = calculateTotalPrice($room_id, $check_in_date, $check_out_date, $adults, $children);
            //     $reservation_status = 'Pending';
            //     $room_type = ''; // Assuming you have a way to determine room type, add logic here if needed
        
            //     // Insert reservation into the database
            //     $stmt = $conn->prepare("INSERT INTO reservation_table ( ) 
            //                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //     if ($stmt) {
            //         // Corrected the parameter types and values to be bound
            //         $stmt->bind_param("iissdsiis", $user_id, $room_id, $check_in_date, $check_out_date, $total_price, $reservation_status, $adults, $children, $room_type);
            //         if ($stmt->execute()) {
            //             $message = "Reservation successful!";
            //             // Redirect to ReservationTable.php
            //             header("Location: ReservationTable.php");
            //             exit;
            //         } else {
            //             $message = "Error executing statement: " . $stmt->error;
            //         }
            //         $stmt->close();
            //     } else {
            //         $message = "Error preparing statement: " . $conn->error;
            //     }
            // }
            }
        
            $conn->close();
        }
        
        // Function to calculate total price
        function calculateTotalPrice($room_id, $check_in_date, $check_out_date, $adults, $children) {
            $roomPrices = [
                15 => 20000,  // Assuming room_id 10 is Presidential Suite
                14 => 7000,    // Assuming room_id 8 is Executive Room
                13 => 15000,   // Assuming room_id 2 is Deluxe Suite
            ];
        
            if (!isset($roomPrices[$room_id])) {
                return 0;
            }
        
            $room_price = $roomPrices[$room_id];
            $num_nights = (strtotime($check_out_date) - strtotime($check_in_date)) / (60 * 60 * 24);
            return $room_price * $num_nights * ($adults + ($children * 0.5));
        }
        ?>
</form>
<br>
<br>
<br>
<br>

            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h3>Contact Us</h3>
                            <p>Email: llhotel.com</p>
                            <p>Phone: +1234567890</p>
                            <p>Address: 123 Main Street, Big Red Spot, Jupiter</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3>Follow Us</h3>
                            <ul class="social-links">
                                <li><a href="Contact_Us.php" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="Contact_Us.php" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="Contact_Us.php" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="Contact_Us.php" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3>Legal</h3>
                            <p>&copy; 2024 LL Hotel. All rights reserved.</p>
                            <p><a href="#">Privacy Policy</a></p>
                            <p><a href="#">Terms of Service</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script>
    function displayDateTime() {
        const now = new Date();
        const datetimeElement = document.getElementById('datetime');
        const options = {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: false // Use 24-hour format
        };
        const formattedDateTime = now.toLocaleDateString('en-US', options);
        datetimeElement.textContent = formattedDateTime;
    }

    // Call displayDateTime once when the page loads
    displayDateTime();

    // Update time every second
    setInterval(displayDateTime, 1000);
</script>

    <!-- JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
