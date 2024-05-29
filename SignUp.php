<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/hotel_icon.ico" type="image/x-icon">

    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body{
        background: #fbf6ee;
    }

    .wrapper{
        width: 450px;
        padding: 2rem 1rem;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    h1{
        font-size: 2rem;
        color: #07001f;
        margin-bottom: 1.2rem;
    }

    form input{
        width: 92%;
        outline: none;
        border: 1px solid #fff;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
        background: #e4e4e4;
    }

    button{
        font-size: 1rem;
        margin-top: 1.8rem;
        padding: 10px 0;
        border-radius: 10px;
        outline: none;
        border: none;
        width: 90%;
        color: #fff;
        cursor: pointer;
        background: #3c6930;
    }

    button:hover{
        background: #628759;;
    }

    input:focus{
        border: 1px solid rgb(192, 192, 192);
    }

    .terms{
        margin-top: 0.2rem;
    }

    .terms input{
        height: 1em;
        width: 1em;
        vertical-align: middle;
        cursor: pointer;
    }

    .terms label{
        font-size:0.7rem;
    }

    .terms a{
        color: rgb(17, 107, 143);
        text-decoration: none;
    }

    .member a{
        font-size: 0.8rem;
        margin-top: 1.4rem;
        color: #636363;
        text-align: center;
    }

    .member a{
        color: rgb(17, 107, 143);
        text-decoration: none;
    }

    .recover{
        text-align: right;
        font-size: 0.7rem;
        margin: 0.3rem 1.4rem 0 0;
    }

    .recover a{
        text-decoration: none;
        color: #464647;
    }

    .logo {
    text-align: center; /* Center aligns its child elements */
}

.logo img {
    max-width: 300px; 
    height: auto;
    padding-top: 20px; /* Add padding to the top */
    padding-bottom: 0; /* No padding at the bottom */
}
</style>

</head>
<body>

<p class="logo"><img src="images/logohotel.png"></p>

    <div class="wrapper">
        <h1>Sign Up</h1>
        <form method="POST" action="signup_process.php">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="" disabled selected>Choose</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
                <option value="employee">Employee</option>
            </select>

            <button type="submit" name="submit">Sign Up</button>
        </form>
        <div class="member">Have an account? <a href="login.php">Login Here</a></div>
    </div>
</body>
</html>
