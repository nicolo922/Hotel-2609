<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">

    <title>Amenities</title>
</head>
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

#toggleFormButton, #backButton, input[type="submit"] {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#toggleFormButton:hover, #backButton:hover, input[type="submit"]:hover {
    background-color: #0056b3;
}

#amenityForm, #resultSection {
    display: none;
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: none;
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 10px;
    margin: 20px 0;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: #fff;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

    </style>
<body>

<?php include 'sidebar.php'?>

<h1>What Amenity Do You Prefer?</h1>

<button id="toggleFormButton">Choose the amenity you prefer</button>

<form id="amenityForm">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Amenity ID</th>
                <th>Amenity Name</th>
                <th>Description</th>
                <th>Price Per Use</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="radio" name="amenity" value="001" data-name="Swimming Pool" data-description="Olympic size swimming pool with lifeguards on duty." data-price="$10"></td>
                <td>001</td>
                <td>Swimming Pool</td>
                <td>Olympic size swimming pool with lifeguards on duty.</td>
                <td>$10</td>
            </tr>
            <tr>
                <td><input type="radio" name="amenity" value="002" data-name="Gym" data-description="Fully equipped gym with personal trainers available." data-price="$20"></td>
                <td>002</td>
                <td>Gym</td>
                <td>Fully equipped gym with personal trainers available.</td>
                <td>$20</td>
            </tr>
            <tr>
                <td><input type="radio" name="amenity" value="003" data-name="Spa" data-description="Relaxing spa offering a range of massages and treatments." data-price="$50"></td>
                <td>003</td>
                <td>Spa</td>
                <td>Relaxing spa offering a range of massages and treatments.</td>
                <td>$50</td>
            </tr>
            <tr>
                <td><input type="radio" name="amenity" value="004" data-name="Conference Room" data-description="Spacious conference room with modern facilities." data-price="$100"></td>
                <td>004</td>
                <td>Conference Room</td>
                <td>Spacious conference room with modern facilities.</td>
                <td>$100</td>
            </tr>
        </tbody>
    </table>
    <br>
    <input type="submit" value="Submit">
</form>

<div id="resultSection">
    <h2>Selected Amenity</h2>
    <table id="resultTable">
        <thead>
            <tr>
                <th>Amenity ID</th>
                <th>Amenity Name</th>
                <th>Description</th>
                <th>Price Per Use</th>
            </tr>
        </thead>
        <tbody id="resultBody">
            <!-- Selected amenity will be displayed here -->
        </tbody>
    </table>
    <br>
    <button id="backButton">Choose another amenity</button>
</div>

<script>
    document.getElementById('toggleFormButton').addEventListener('click', function() {
        document.getElementById('amenityForm').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('amenityForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const selectedAmenity = document.querySelector('input[name="amenity"]:checked');
        if (selectedAmenity) {
            const amenityId = selectedAmenity.value;
            const amenityName = selectedAmenity.getAttribute('data-name');
            const description = selectedAmenity.getAttribute('data-description');
            const price = selectedAmenity.getAttribute('data-price');
            
            const resultBody = document.getElementById('resultBody');
            resultBody.innerHTML = `
                <tr>
                    <td>${amenityId}</td>
                    <td>${amenityName}</td>
                    <td>${description}</td>
                    <td>${price}</td>
                </tr>
            `;
            
            document.getElementById('amenityForm').style.display = 'none';
            document.getElementById('resultSection').style.display = 'block';
        } else {
            alert('Please select an amenity.');
        }
    });

    document.getElementById('backButton').addEventListener('click', function() {
        document.getElementById('resultSection').style.display = 'none';
        document.getElementById('toggleFormButton').style.display = 'block';
    });
</script>

</body>
</html>
