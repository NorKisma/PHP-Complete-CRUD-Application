<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form Design | CodeLab</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>
        <form action="" method="post">
            <div class="field">
                <input type="text" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="Signup.php">Signup now</a>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get form data and sanitize
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        // SQL query to fetch user data based on email
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // Check if user exists
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Verify password
                if (password_verify($password, $row['password'])) {
                    // Redirect to dashboard or home page
                    header('Location: index.php');
                    exit(); // Stop further execution
                
                }
                echo "Invalid email or password.";
            } else {
                echo "User not found.";
            }
        } else {
            // Error handling for query execution
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
?>
</body>

</html>