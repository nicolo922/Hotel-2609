<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #dfe9f5;
        }

        .reservation-container {
            width: 320px;
            padding: 2rem 1rem;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .reservation-container h2 {
            font-size: 2rem;
            color: #07001f;
            margin-bottom: 1.2rem;
        }

        .reservation-container form input,
        .reservation-container form select {
            width: 92%;
            outline: none;
            border: 1px solid #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: #e4e4e4;
        }

        .reservation-container button {
            font-size: 1rem;
            margin-top: 1.8rem;
            padding: 10px 0;
            border-radius: 20px;
            outline: none;
            border: none;
            width: 90%;
            color: #fff;
            cursor: pointer;
            background: rgb(17, 107, 143);
        }

        .reservation-container button:hover {
            background: rgba(17, 107, 143, 0.877);
        }

        .reservation-container input:focus {
            border: 1px solid rgb(192, 192, 192);
        }

        .reservation-container .form-group {
            margin-bottom: 20px;
        }

        .reservation-container .form-group label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .reservation-container .form-group div {
            display: inline-block;
            width: 48%;
        }

        .reservation-container .form-group .guests {
            width: 100%;
        }

        .reservation-container .form-group select {
            width: 100%;
        }

        .reservation-container .terms {
            margin-top: 0.2rem;
        }

        .reservation-container .terms input {
            height: 1em;
            width: 1em;
            vertical-align: middle;
            cursor: pointer;
        }

        .reservation-container .terms label {
            font-size: 0.7rem;
        }

        .reservation-container .terms a,
        .reservation-container .member a,
        .reservation-container .recover a {
            color: rgb(17, 107, 143);
            text-decoration: none;
        }

        .reservation-container .member {
            margin-top: 1.4rem;
        }

        .reservation-container .recover {
            text-align: right;
            font-size: 0.7rem;
            margin: 0.3rem 1.4rem 0 0;
        }
    </style>
</head>
<body>
    <div class="reservation-container">
        <h2>Booking Form</h2>
        <form action="ReservationTable.php" method="POST">
            <label for="checkin_date">Check-in Date:</label>
            <input type="date" id="checkin_date" name="checkin_date" required><br><br>
            
            <label for="checkout_date">Check-out Date:</label>
            <input type="date" id="checkout_date" name="checkout_date" required><br><br>
            
            <label for="roomSelect">Room Type:</label>
            <select id="roomSelect" name="roomSelect" required>
                <option value="10">Presidential Suite</option>
                <option value="8">Executive Suite</option>
                <option value="2">Deluxe Room</option>
            </select><br><br>
            
            <label for="adults">Adults:</label>
            <input type="number" id="adults" name="adults" min="1"><br><br>
            
            <label for="children">Children:</label>
            <input type="number" id="children" name="children" min="0"><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
