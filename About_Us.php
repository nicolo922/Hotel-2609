<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){

}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>LL Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/hotel_icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="C:\xampp\htdocs\Hotel_New\Hotel-2609\images\logohotel.png" type="image/x-icon">
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
            <li class="active">
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
        <!-- About Us Section -->
        <div class="content-container">
          <div class="about-us">
            <h1>About Us</h1>
            <p>Welcome to LL Hotel, where luxury and comfort meet to create an unforgettable experience. Founded by two passionate hoteliers, our mission is to provide exceptional hospitality and a unique stay for every guest. We believe in attention to detail, personalized service, and creating a warm and inviting atmosphere.</p>
            <p>At LL Hotel, we offer a range of world-class amenities designed to cater to the needs of our diverse clientele. From our state-of-the-art spa and wellness center to our exquisite dining options, we ensure that every aspect of your stay is memorable and enjoyable.</p>
            <p>We invite you to learn more about the founders of LL Hotel, whose dedication and vision have made this establishment a premier destination for travelers from around the world.</p>

            <div class="owner-photos">
            
              <div class="owner">
              <a href="https://www.facebook.com/renzy.briones.9" target="_blank">
                <img src="uploads/renzy.jpg" alt="Laurenz Briones">
                </a>

                <h3>Laurenz Nicolo T. Briones</h3>
                <p>Laurenz Nicolo T. Briones is a visionary leader with over 20 years of experience in the hospitality industry. His journey began with a passion for creating exceptional guest experiences and has since evolved into a commitment to setting new standards of luxury and comfort. Laurenz's expertise in hotel operations, coupled with his innovative approach, has been instrumental in shaping LL Hotel's unique character. He believes in the power of personalized service and attention to detail, ensuring that every guest's stay is nothing short of extraordinary.</p>
            
            </div>

              <div class="owner">
              <a href="https://www.facebook.com/HiAkoSiLorenz" target="_blank">
                <img src="uploads/ralph.jpg" alt="Lorenz Bonifacio">
                </a>
                <h3>Ralph Lorenz M. Bonifacio</h3>
                <p>Ralph Lorenz M. Bonifacio brings a wealth of knowledge and expertise in luxury hotel management to LL Hotel. His career is marked by a relentless pursuit of excellence and a dedication to creating memorable guest experiences. With a keen eye for detail and a deep understanding of guest needs, Ralph has played a pivotal role in establishing LL Hotel as a premier destination for discerning travelers. His commitment to quality and personalized service ensures that every guest feels valued and enjoys a truly unique and memorable stay.</p>
            </a>  
            </div>
            </div>
          </div>
        </div>


      </div>
    </div>

    <!-- FOOTER -->
    <br>
<br>

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



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
