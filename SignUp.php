<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body{
        background: #dfe9f5;
    }

    .wrapper{
        width: 320px;
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
        border-radius: 20px;
        background: #e4e4e4;
    }

    button{
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

    button:hover{
        background: rgba(17, 107, 143, 0.877);
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
    }

    .member a{
        color: rgb(17, 107, 143);
        text-decoration: none;
    }

    </style>

<body>

    <div class="wrapper">
        <h1>Sign Up</h1>
        <form action="#">
            <input type="text" placeholder="Firstname">
            <input type="text" placeholder="Lastname">
            <imput type="email" placeholder="Email">
            <input type="text" placeholder="Username">
            <input type="password" placeholder="Password">

        <select name="role">
            <option value="" disabled selected>Choose</option>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
            <option value="employee">Employee</option>
        </select>

        </form>
    <div class="terms">
        <input type="checkbox" id="checkbox">
        <label for="checkbox">I agree to these <a href="#">Terms & Conditions</a></label>
    </div>
    <button>Sign Up</button>
    <div class="member">Have and account? <a href="Login.php">Login Here</a></div>
    </div>
</body>
</html>