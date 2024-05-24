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

    <?php include 'sidebar.php'; ?>

    <main class="content">
        <!-- Featured Rooms Section -->
        <div class="message">
            <h1>Featured Rooms</h1>
            <p>The utmost in elegance, seclusion, and comfort can be found in each of our well-furnished guest rooms.</p>
        </div>

        <!-- Rooms Section -->
        <div class="rooms-container">
            <article class="room">
                <h2>Standard Room</h2>
                <img src="https://www.cityofdreamsmanila.com/en/stay/nuwa/resort-studio" alt="Standard Room">
                <p>Our standard room is perfect for a comfortable stay. It comes with all basic amenities.</p>
                <p>Price: P5000 per night</p>
            </article>
            <article class="room">
                <h2>Deluxe Room</h2>
                <img src="https://www.cityofdreamsmanila.com/en/stay/nuwa/deluxe-double-queen" alt="Deluxe Room">
                <p>Experience luxury with our deluxe room. It offers extra space and premium amenities.</p>
                <p>Price: P10000 per night</p>
            </article>
            <article class="room">
                <h2>Suite Room</h2>
                <img src="https://www.cityofdreamsmanila.com/en/stay/nuwa/crystal-villa" alt="Suite">
                <p>Indulge yourself in our exquisite suite. It features a separate living area and a stunning view.</p>
                <p>Price: P15000 per night</p>
            </article>
    </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-iJ0VHzofo03+JygsTw28TNGM3+XFwBvHRGrPr+WzoAhh0WJjUz8D3+Uo0qYJms5b" crossorigin="anonymous"></script>
</body>
</html>