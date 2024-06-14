<?php
session_start();
require 'conn.php';

// Check if user is already logged in, redirect to index.php
if (isset($_SESSION['user_id'])) {
    header("Location: http://127.0.0.1:5000");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
      ?>
<script>
alert("Registration Successful!");

function navigateToPage() {
    window.location.href = "index.php";
}
window.onload = function() {
    navigateToPage();
}
</script>
<?php
    } else{
        echo "<script>alert('Registration Failed. Try Again');</script>";
      }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <style type="text/css">
    #container {
        border: 1px solid black;
        width: 450px;
        padding: 20px;
        margin-left: 400px;
        margin-top: 50px;
    }

    form {
        margin-left: 50px;
    }

    input[type="text"],
    input[type="password"] {
        width: 300px;
        height: 20px;
        padding: 10px;
    }

    label {
        font-size: 20px;
        font-weight: bold;
    }

    a {
        text-decoration: none;
        font-weight: bold;
        font-size: 21px;
        color: blue;
    }

    a:hover {
        cursor: pointer;
        color: purple;
    }

    input[type="submit"] {
        width: 70px;
        background-color: blue;
        border: 1px solid blue;
        color: white;
        font-weight: bold;
        padding: 7px;
        margin-left: 130px;
    }

    input[type="submit"]:hover {
        background-color: purple;
        cursor: pointer;
        border: 1px solid purple;
    }
    </style>
</head>

<body>
    <div id="container">
        <form action="register.php" method="POST">
            <label for="username">Username: </label>
            <input type="text" name="username" placeholder="Enter Username" required><br><br>

            <label for="email">Email: </label>
            <input type="text" name="email" placeholder="Enter Email" required><br><br>

            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>
            <input type="submit" name="register" value="Register"><br><br>
            <label>Already have an account? </label><a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>