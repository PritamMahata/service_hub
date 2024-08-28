<?php
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'env/config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create SQL query to check for user in the database
    $sql = "SELECT * FROM accounts WHERE username = '$username'";

    // Execute the query
    $result = mysqli_query($conn, $sql);


    // echo var_dump($result);
    // Check if the user exists
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password (assuming it’s hashed in the database)
        if ($password == $user['password']) {
            // Password is correct, set session variables and redirect
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            // header("Location: index.html");
            // exit();
            $showAlert = true;
        } else {
            // Incorrect password
            echo "Invalid password.";
            $showAlert = false;
        }
    } else {
        $showAlert = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHUB</title>
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/relog.css">
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
</head>

<body>
<div class="overlay" data-overlay></div>
<?php
require_once('./assets/components/header.php');
require_once('./assets/components/sub_components/slidebar.php');
?>
<div class="login_box">
    <div class="newsletter-img">
        <img src="./assets/images/newsletter.png"  width="400" height="400">
    </div>
    <div class="login_form">
        <?php
        if ($showAlert == true) {
            echo "<h1>You are login sucessfully</h1>";
        } else {
            echo "<h1>Failed to login</h1>";
        }
        ?>
        <form method="post">
            <div class="row_field">
                <label class="newsletter-title">E-mail ID </label>
                <input type="email" name="username" class="email-field" placeholder="Email" required>
            </div>
            <label class="newsletter-title">Password</label>
            <input type="password" name="password" class="email-field" placeholder="Password" required>

            <div class="container flex_div">
                <button type="submit" class="btn-newsletter">Sign Up</button>
                <button type="submit" class="btn-newsletter">Log in</button>
            </div>
        </form>
    </div>
</div>
<?php require_once('./assets/components/footer.php') ?>
<script src="./assets/js/relog.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>