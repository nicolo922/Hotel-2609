<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RoomTable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Room Table</title>
</head>
<style>
    #dashboard-menu {
        background-color: #333; 
        color: white; 
        height: 100%;
        overflow-y: auto;
        position: fixed;
    }

</style>
<body>
   
<?php include_once 'sidebar.php'; ?> <!-- Including the sidebar -->

    <table class="table">
        <thead>
            <tr>
                <th>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi bi-plus-square-dotted"></i> Add
                    </button>
                </th>
            </tr>
        </thead>
    </table>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="RoomTable.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Enter Your Room Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="RoomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomnum" name="roomnum">
                        </div>
                        <div class="mb-3">
                            <label for="roomType" class="form-label">Room Type</label>
                            <select class="form-select" id="roomType" name="roomType">
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="Capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity">
                        </div>
                        <div class="mb-3">
                            <label for="pricePerNight" class="form-label">Price Per Night</label>
                            <select class="form-control" id="pricePerNight" name="pricePerNight">
                                <option value="5000">Standard Room - ₱5000</option>
                                <option value="10000">Deluxe Room - ₱10000</option>
                                <option value="15000">Suite - ₱15000</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="availabilityStatus" class="form-label">Availability Status</label>
                            <select class="form-select" id="availabilityStatus" name="availabilityStatus">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save_changes">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="RoomTable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-iJ0VHzofo03+Jygs..." crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once "dbconnect.php";

// Inserting the data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
    $roomnum = $_POST['roomnum'];
    $roomType = $_POST['roomType'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $pricePerNight = $_POST['pricePerNight'];
    $availabilityStatus = $_POST['availabilityStatus'];

    $sql = "INSERT INTO roomtable (room_number, room_type, description, capacity, price_per_night, availability_status) 
        VALUES ('$roomnum', '$roomType', '$description', '$capacity', '$pricePerNight', '$availabilityStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_select = "SELECT * FROM roomtable";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Description</th>
                <th>Capacity</th>
                <th>Price Per Night</th>
                <th>Availability Status</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['room_number'] . "</td>";
        echo "<td>" . $row['room_type'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['capacity'] . "</td>";
        echo "<td>" . $row['price_per_night'] . "</td>";
        echo "<td>" . $row['availability_status'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
