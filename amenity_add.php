<?php
include 'dbconnect.php'; // Ensure this file sets up your DB connection properly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file is uploaded
    if (isset($_FILES['upload_img']) && $_FILES['upload_img']['error'] == UPLOAD_ERR_OK) {
        // Handle the file upload
        $upload_dir = 'uploads/';
        
        // Ensure the upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $uploaded_file = $upload_dir . basename($_FILES['upload_img']['name']);

        if (move_uploaded_file($_FILES['upload_img']['tmp_name'], $uploaded_file)) {
            // File upload was successful
            $image_url = $uploaded_file;
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        echo "No image uploaded or upload error.";
        exit;
    }

    // Sanitize and capture the form data
    $amenity_name = mysqli_real_escape_string($conn, $_POST['amenity_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price_per_use = mysqli_real_escape_string($conn, $_POST['price_per_use']);

    // Insert data into the database
    $sql = "INSERT INTO amenity_table (amenity_name, description, price_per_use, image_url) VALUES ('$amenity_name', '$description', '$price_per_use', '$image_url')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to RoomTable.php after successful insertion
        header('Location: AmenityTable.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
