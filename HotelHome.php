<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Center content vertically and horizontally */
        body, html {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        /* Container for hotel description and image container */
        .content-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            padding: 20px;
        }

        /* Styles for the hotel description */
        .hotel-description {
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* Styles for the image container */
        .image-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            overflow: hidden;
            width: 100%;
        }
        .image-container img {
            width: 30%;
            height: auto;
        }
        /* Styles for the room description container */
        .room-description {
            flex: 1;
            padding: 20px;
            border-left: 1px solid #ccc;
        }
        .room-description h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<?php include_once 'sidebar.php'; ?> <!-- Including the sidebar -->

<!-- Hotel Description and Image Container -->
<div class="content-container">
    <!-- Hotel Description -->
    <div class="hotel-description">
        <h1>Welcome to Our Hotel</h1>
        <p>Experience luxury at its finest in our hotel. With world-class amenities and breathtaking views, we guarantee a memorable stay.</p>
    </div>

    <!-- Room Options in Image Container -->
    <div class="image-container">
        <div>
            <img src="room1.jpg" alt="Room 1">
            <div class="room-description">
                <h2>Deluxe Room</h2>
                <p>Spacious and elegantly furnished, our Deluxe Rooms offer the perfect blend of comfort and luxury.</p>
                <ul>
                    <li>King-sized bed</li>
                    <li>En-suite bathroom</li>
                    <li>Mini-bar</li>
                </ul>
            </div>
        </div>
        <div>
            <img src="room2.jpg" alt="Room 2">
            <div class="room-description">
                <h2>Executive Suite</h2>
                <p>Indulge in the ultimate luxury with our Executive Suites, featuring stunning views and top-notch amenities.</p>
                <ul>
                    <li>Separate living area</li>
                    <li>Jacuzzi tub</li>
                    <li>Private balcony</li>
                </ul>
            </div>
        </div>
        <div>
            <img src="room3.jpg" alt="Room 3">
            <div class="room-description">
                <h2>Premium Suite</h2>
                <p>Experience unparalleled luxury in our Premium Suites, designed for the most discerning guests.</p>
                <ul>
                    <li>Two bedrooms</li>
                    <li>Private pool</li>
                    <li>24-hour butler service</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
