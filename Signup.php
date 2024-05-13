<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Signup Form Design | CodeLab</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Signup Form
        </div>
        <form action="#" method="post">
            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="email" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="agree" required>
                    <label for="agree">I agree to the terms and conditions</label>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Signup">
            </div>
            <div class="signin-link">
                Already a member? <a href="login.php">Login</a>
            </div>
        </form>
    </div>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Perform validation (you can add more validation as needed)
        if ($password != $confirm_password) {
            echo "Passwords do not match.";
            exit();
        }

        // Hash the password for security
       // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert data into database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === true) {
            echo 'Signup successful!';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  
    ?>

</body>

</html>