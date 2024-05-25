<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_type = $_POST['room_type'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $price_per_night = $_POST['price'];
    $availability_status = $_POST['availability'];

    $target_directory = "uploads/"; 
    $target_file = $target_directory . basename($_FILES["upload_img"]["name"]); 
    $uploadOk = 1; 
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    $check = getimagesize($_FILES["upload_img"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["upload_img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["upload_img"]["name"])). " has been uploaded.";
            $image_url = $target_file; 
            $sql = "INSERT INTO room_table (room_type, description, capacity, price_per_night, availability_status, image_url) 
                    VALUES ('$room_type', '$description', $capacity, $price_per_night, '$availability_status', '$image_url')";

            if (mysqli_query($conn, $sql)) {
                header('Location: RoomTable.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
