<!doctype html>
<html lang="en">
  <head>
    <title>LL Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/ball.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

  </head>

  <style>
    /* Styles for the slideshow */
    .slideshow-container {
      position: relative;
      max-width: 800px;
      margin: auto;
    }
    .slide {
      display: none;
      text-align: center;
    }
    .slide img {
      max-width: 100%;
      height: auto;
    }
    .slide .room-description {
      margin-top: 20px;
    }
    /* Style for controls */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }
    .prev:hover, .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>

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
              <a href="Login.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <!-- Hotel Description and Image Container -->
        <div class="content-container">
          <!-- Hotel Description -->
          <div class="hotel-description">
            <h1>Welcome to Our Hotel</h1>
            <p>Experience luxury at its finest in our hotel. With world-class amenities and breathtaking views, we guarantee a memorable stay.</p>
          </div>


<!-- Room Options in Image Container -->
<h3>Explore Rooms & Suites</h3>


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
            echo '<h2>₱' . $row['price_per_night'] . ' <span>/ Day</span><h2>';
            echo '</div>'; // Close room-description div
            echo '</div>'; // Close main div for this room
        }
    } else {
        echo "No rooms found.";
    }

    mysqli_close($conn);
    ?>
</div>



        <br>
        <br>
        <br>

        <h3>Discover Our Restaurants</h3>

  <div class="slideshow-container">
    <div class="slide">
      <div class="image-container">
        <div>
          <img src="images/resto1.jpg" alt="Ravin's Steakhouse">
          <div class="room-description">
            <h2>Ravin's Steakhouse</h2>
            <p>Indulge in savory cuts of prime steak grilled to perfection, complemented by a cozy ambiance and impeccable service at Ravin's Steakhouse.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="slide">
      <div class="image-container">
        <div>
          <img src="images/resto2.jpg" alt="Marko's Sushi Bar">
          <div class="room-description">
            <h2>Marko's Sushi Bar</h2>
            <p>Experience the artistry of sushi at Marko's Sushi Bar, where fresh, handcrafted rolls and sashimi meet innovative flavors and a welcoming atmosphere.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="slide">
      <div class="image-container">
        <div>
          <img src="images/resto3.jpg" alt="Jason's Buffet">
          <div class="room-description">
            <h2>Jason's Buffet</h2>
            <p>Enjoy a diverse culinary journey at Jason's Buffet, featuring a spread of international cuisines from around the world, ensuring something delightful for every palate.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="slide">
      <div class="image-container">
        <div>
          <img src="images/resto4.jpg" alt="Kirby's Filipino Resto">
          <div class="room-description">
            <h2>Kirby's Filipino Resto</h2>
            <p>Delight in authentic Filipino flavors at Kirby's Filipino Resto, where traditional dishes are prepared with care and served in a warm and inviting setting, capturing the essence of Filipino hospitality.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="slide">
      <div class="image-container">
        <div>
          <img src="images/resto5.jpg" alt="Cassey's Pool Cafe">
          <div class="room-description">
            <h2>Cassey's Pool Cafe</h2>
            <p>Relax and unwind at Cassey's Pool Cafe, a serene oasis offering refreshing drinks, light bites, and a tranquil atmosphere by the poolside, perfect for a leisurely escape.</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Navigation controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("slide");
      if (n > slides.length) { slideIndex = 1; }
      if (n < 1) { slideIndex = slides.length; }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
    }
  </script>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
