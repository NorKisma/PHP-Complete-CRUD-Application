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
        <form action="" method="POST">

            <div class="field">
                <input type="text" name="Email" required>
                <label>email Address</label>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['Email'];
    $password = $_POST['password'];

    // Hash the password for comparison (assuming passwords are stored hashed)
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);



$sql = "SELECT ID, username, email, password FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize a flag variable to track if the password matches
    $password_matched = false;

    // Iterate over each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Check if the provided password matches the password stored in the database
        if ($_POST['password'] === $row['password']) {
            // If the passwords match, set the flag variable to true and break out of the loop
            $password_matched = true;
            break;
        }
    }

    // Check if the password matched for any user
    if ($password_matched) {
        header('Location: index.php'); 
    } else {
        echo "Invalid password.";
    }
} else {
    echo "0 results";
}
}
$conn->close();
    ?>

</body>

</html>