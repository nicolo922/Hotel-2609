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
    <link rel="icon" href="images/ball.png" type="image/x-icon">
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
          <h1><a href="HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="HotelHome.php"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
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
              <a href="Logs.php"><span class="fa fa-paper-plane mr-3"></span> Logs</a>
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
              <a href="https://www.facebook.com/HiAkoSiLorenz" target="_blank">
                <img src="images/renzy.jpg" alt="Owner 1">
                </a>

                <h3>Laurenz Nicolo T. Briones</h3>
                <p>Laurenz Nicolo T. Briones is a visionary leader with over 20 years of experience in the hospitality industry. His journey began with a passion for creating exceptional guest experiences and has since evolved into a commitment to setting new standards of luxury and comfort. Laurenz's expertise in hotel operations, coupled with his innovative approach, has been instrumental in shaping LL Hotel's unique character. He believes in the power of personalized service and attention to detail, ensuring that every guest's stay is nothing short of extraordinary.</p>
            
            </div>

              <div class="owner">
              <a href="https://www.pornhub.com/" target="_blank">
                <img src="images/renzy.jpg" alt="Owner 2">
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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
