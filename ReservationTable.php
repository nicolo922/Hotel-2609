<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservationTable</title>
</head>
<body>
    <div class="container mt-3">
        <h1>ReservationTable</h1>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee')): ?>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addAccommodationModal" class="btn btn-success mb-3">Add ReservationTable</button>
            <?php endif; ?>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            </div>

            <form action="ReservationTable.php" method="post">
            <div class="input-group mb-3 w-25">
            <input type="text" name="query" placeholder="Input text to filter table" class="form-control mr-3">
            <input type="submit" value="Search" name="search" class="btn btn-info btn-sm" id="button-addon1">
        </div>
    </form>
    
    <table class="table">
        <!-- Table Headers -->
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>User ID</th>
                <th>Room ID</th>
                <th>Check-in-Date</th>
                <th>Check-out-Date</th>
                <th>Total Price</th>
                <th>Reservation Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "dbconnect.php";
            $sql = "SELECT * FROM accomodation_table";
            $result = mysqli_query($connection, $sql);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["accomodation_id"] . "</td>";
                    echo "<td>" . $row["accomodation_name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["capacity"] . "</td>";
                    echo "<td>" . $row["price_per_night"] . "</td>";
                    echo "<td>" . $row["availability_status"] . "</td>";
                    echo "<td><a class='btn btn-primary btn-sm' href='edit-accommodation.php?id=" . $row["accomodation_id"] . "'>Edit</a></td>";
                    echo "<td><a class='btn btn-danger btn-sm' href='accomodations-table.php?action=delete&id=" . $row["accomodation_id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No results found.</td></tr>";
            }

            mysqli_close($connection);
            ?>
        </tbody>
    </table>


</body>
</html>