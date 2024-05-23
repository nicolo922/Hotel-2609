<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "hotelreserv");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add_user') {
    // Retrieve form data
    $fullname = isset($_POST['fullname']) ? mysqli_real_escape_string($conn, $_POST['fullname']) : '';
    $role = isset($_POST['role']) ? mysqli_real_escape_string($conn, $_POST['role']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query using prepared statement to insert data into the database
    $sql = "INSERT INTO usertable (fullname, role, username, password, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $fullname, $role, $username, $hashed_password, $email);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "New record created successfully";
    } else {
        $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Redirect to prevent form resubmission on page refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch user data from the database
$sql = "SELECT * FROM usertable";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<div class='alert alert-success' role='alert'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>
    <table>
        <tr>
            <th style="padding-right: 20px"><h1>Users</h1></th>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin')): ?>
                <th><button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success">Add a User</button></th>
            <?php endif; ?>
        </tr>
    </table>

    <!-- Add User Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add a User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="action" value="add_user">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="Customer">Customer</option>
                                <option value="Employee">Employee</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn
                            btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="UserTable.php" method="post">
        <div class="input-group mb-3 w-25">
            <input type="text" name="query" placeholder="Input text to filter table" class="form-control mr-3">
            <input type="submit" value="Search" name="search" class="btn btn-info btn-sm" id="button-addon1">
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row["user_id"]; ?></td>
                        <td><?php echo $row["fullname"]; ?></td>
                        <td><?php echo $row["role"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><a href='edit_user.php?id=<?php echo $row["user_id"]; ?>' class='btn btn-primary'>Edit</a></td>
                        <td><button class='btn btn-danger' onclick='confirmDelete(<?php echo $row["user_id"]; ?>)'>Delete</button></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan='8'>No users found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Remaining HTML and JavaScript code -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-LUZveXM9Mzk7z7lA2uhU5VpqXo3Fd5npnEK1Pz8Pe0cuoHz4mSCldEB8oNbAw84J" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KuRmfmKl/Nf2dr/AXft6vFBH5TbTGXiym1XH23XJJTc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#addUserForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_SERVER['PHP_SELF']; ?>',
                    data: $(this).serialize() + '&action=add_user',
                    success: function (response) {
                        var jsonData = JSON.parse(response);
                        if (jsonData.status == 'success') {
                            // Reset form
                            $('#addUserForm')[0].reset();
                            // Close modal
                            $('#staticBackdrop').modal('hide');
                            // Display success message
                            alert(jsonData.message);
                            // Reload the page to reflect changes
                            location.reload();
                        } else {
                            alert(jsonData.message);
                        }
                    },
                    error: function () {
                        alert('Error occurred while processing your request.');
                    }
                });
            });
        });
    </script>
</div>
</body>
</html>
