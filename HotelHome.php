<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LL Hotel</title>
    <link rel="stylesheet" href="Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
<main>
    <!-- Sidebar -->
    <aside class="col-lg-2 bg-tertiary-bg-rgb border-top border-3 border-dark" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-warning">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h3 class="mt-2 text-light fw-bold">Dashboard</h3>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column h5">
                        <li class="nav-item">
                            <a href="HotelHome.php" class="nav-link text-light active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="UserTable.php" class="nav-link text-light">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a href="RoomTable.php" class="nav-link text-light">Rooms Table</a>
                        </li>
                        <li class="nav-item">
                            <a href="ReservationTable.php" class="nav-link text-light">Reservation Table</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light">Amenity Table</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->

    <!--Header-->
    <div class="header-container">
        <div class="contact-info">
            <a href="#" class="contact-item">Contact Item 1</a>
            <a href="#" class="contact-item">Contact Item 2</a>
        </div>

        <!-- Social Links -->
        <div class="social-links">
            <a href="#" class="social-link">Social Link 1</a>
            <a href="#" class="social-link">Social Link 2</a>
        </div>
    </div>
        <a href="#" class="book-now">Book Now</a>
    </div>
    <div class="container">
        <!-- Carousel Section -->
        <section class="carousel">
            <div class="availability-form">
                <form>
                    <label for="check-in">Check-In Date:</label>
                    <input type="date" id="check-in" name="check-in" placeholder="Check-in Date">
                    <label for="check-out">Check-Out Date:</label>
                    <input type="date" id="check-out" name="check-out" placeholder="Check-out Date">
                    <label for="guests">Number of Guests:</label>
                    <input type="number" id="guests" name="guests" min="1" max="10">
                    <button type="submit">Search Availability</button>
                </form>
            </div> 
            <button class="arrow next" onclick="nextImage()">❯</button>
        </section>

        <!-- Featured Rooms Section -->
        <section class="message">
            <h1>Featured Rooms</h1>
            <p>The utmost in elegance, seclusion, and comfort can be found in each of our well-furnished guest rooms.</p>
        </section>

        <!-- Rooms Section -->
        <section class="rooms-container">
            <div class="room">
                <h2>Standard Room</h2>
                <img src="https://www.riversidehotel.com.au/wp-content/uploads/2016/01/RH-12.jpg" alt="Standard Room">
                <p>Our standard room is perfect for a comfortable stay. It comes with all basic amenities.</p>
                <p>Price: P5000 per night</p>
            </div>
            <div class="room">
                <h2>Deluxe Room</h2>
                <img src="https://image-tc.galaxy.tf/wijpeg-afu0zj5rhmyyirzditj3g96mk/deluxe-room-king-1-2000px.jpg" alt="Deluxe Room">
                <p>Experience luxury with our deluxe room. It offers extra space and premium amenities.</p>
                <p>Price: P10000 per night</p>
            </div>
            <div class="room">
                <h2>Suite Room</h2>
                <img src="https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg" alt="Suite">
                <p>Indulge yourself in our exquisite suite. It features a separate living area and a stunning view.</p>
                <p>Price: P15000 per night</p>
            </div>
        </section>
    </div>
</main>

<script src="Home.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-iJ0VHzofo03+JygsTw28TNGM3+XFwBvHRGrPr+WzoAhh0WJjUz8D3+Uo0qYJms5b" crossorigin="anonymous"></script>
</body>
</html>
