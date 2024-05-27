<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
  header("Location: Login.php");
  exit();
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
        <h1><a href="Costumer_HotelHome.php" class="logo"><img src="images/logohotel.png"></a></h1>

        <div class="showusertype">
        <h6>Welcome Dear Costumer!</h6>
        <p id="datetime"></p>
    </div>

          <ul class="list-unstyled components mb-5">
            <li class="active">
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
        <!-- Hotel Description and Image Container -->
        <div class="content-container">
          <!-- Hotel Description -->
          <div class="hotel-description">
            <h1>Welcome to LL Hotel</h1>
            <p>Experience unparalleled luxury at LL Hotel. With world-class amenities and breathtaking views, we guarantee an unforgettable stay.</p>
          </div>

          <br>


<!-- RESERVATION INTERFACE -->      

<form action="ReservationTable.php" method="POST" class="booking-form">
    <div>
        <label for="checkin">Check In</label>
        <input type="date" id="checkin" name="checkin_date" required>
    </div>
    <div>
        <label for="checkout">Check Out</label>
        <input type="date" id="checkout" name="checkout_date" required>
    </div>
    <div>
        <label for="room">Room</label>
        <select id="room" name="roomSelect" required>
            <option value="" disabled selected>Choose</option>
            <option value="10">Presidential Suite</option> <!-- Ensure these values match your room IDs -->
            <option value="2">Deluxe Suite</option>
            <option value="8">Executive Room</option>
        </select>
    </div>
    <div>
        <label for="adult">Adult</label>
        <input type="number" id="adult" name="adults" min="1" max="10" value="1" required>
    </div>
    <div>
        <label for="children">Children</label>
        <input type="number" id="children" name="children" min="0" max="10" value="0" required>
    </div>
    <div>
      
        <button type="submit">Book Now</button>
    </div>
</form>

<br>


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
            echo '<h2> ₱' . $row['price_per_night'] . ' <span>/ Day</span><h2>';
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

<!-- Amenities Options in Image Container -->
<h3>Explore our Amenities</h3>


<div class="image-container">
    <?php
    include 'dbconnect.php';

    // Execute a new query to fetch all room details
    $sql = "SELECT * FROM amenity_table";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>';
            echo '<img src="' . $row['image_url'] . '" alt="Room Image">';
            echo '<div class="room-description">';
            echo '<h2>' . $row['amenity_name'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<h2>' . $row['price_per_use'] . '</h2>';
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
      <div class="resto-box">
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
      <div class="resto-box">
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
      <div class="resto-box">
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
      <div class="resto-box">
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
      <div class="resto-box">
        <div>
          <img src="images/resto5.jpg" alt="Cassey's Pool Cafe">
          <div class="room-description">
            <h2>Cassey's Pool Cafe</h2>
            <p>Relax and unwind at Cassey's Pool Cafe, a serene oasis offering refreshing drinks, light bites, and a tranquil atmosphere by the poolside, perfect for a leisurely escape.</p>
          </div>
        </div>
      </div>
    </div>
    

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
