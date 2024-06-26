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
            <li>
              <a href="Booking.php"><span class="fa fa-sticky-note mr-3"></span>Book Now</a>
            </li>
            <li>
              <a href="About_Us.php"><span class="fa fa-paper-plane mr-3"></span>About Us</a>
            </li>
            <li class="active">
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
                    <h1>Contact Us</h1>
                    <p>Welcome to our Contact Us page at LL Hotel. Whether you have questions, feedback, or need assistance, we're here to help. Reach out to our friendly staff via phone, email, or visit us at our conveniently located address. We look forward to hearing from you and assisting with your inquiries promptly and professionally.</p>
<br>
                    <!-- Room Options in Image Container -->
 






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
