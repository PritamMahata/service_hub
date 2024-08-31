<?php
$showAlert = false;
$msg = '<h3 style = "color:coral;">Invalid Credentials<h3>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'env/config.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password == $user['password']) {
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $showAlert = true;
        }
    } else {
        $showAlert = true;
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
            <img src="./assets/images/servicebanner.png" width="400" height="400">
        </div>
        <div class="login_form">
            <?php
            if ($showAlert) {
                require_once('./assets/components/toast.php');
            }
            ?>
            <h1 class="form_heading">Login</h1>
            <div class="row_field">
                <div class="sidebyside ">
                    <p class="nav-title"> Doesn’t have any account yet?</p> <a href="./signup.php">Sign Up</a>
                </div>
            </div>

            <form method="post">
                <div class="row_field">
                    <label class="newsletter-title">E-mail ID </label>
                    <input type="email" name="email" class="email-field" placeholder="Email" required>
                </div>


                <div class="row_field">
                    <label class="newsletter-title">Password</label>
                    <div class="sidebyside">
                        <input type="password" name="password" class="email-field" id="password" placeholder="Password" required>
                        <ion-icon class="eye" id="leye-btn" name="eye-off" id="eye"></ion-icon>
                    </div>
                </div>
                <div class="container flex_div">
                    <button type="submit" class="btn-newsletter">Log in</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once('./assets/components/footer.php') ?>
    <script src="./assets/js/relog.js"></script>
    <script src="./assets/js/toast.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>