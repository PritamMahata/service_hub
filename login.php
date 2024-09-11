<?php
require_once 'env/config.php';
require_once('./assets/components/toast.php');
$showAlert = false;
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
    header("Location: profile.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $user['password'];
        if ($user['isverified'] == 0) {
            toast('danger', 'Email not verified');
            // exit();
        } else {
            if (password_verify($password, $hashed_password_from_db)) {
                $_SESSION['email'] = $email;
                $_SESSION['isLogin'] = true;
                header("Location: index.php");
                exit();
            } else {
                toast('danger', 'Invalid Credentials');
            }
        }
    } else {
        toast('danger', 'Invalid Credentials');
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,600,0,0" />
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
            <h1 class="form_heading">Login</h1>
            <div class="row_field">
                <div class="sidebyside ">
                    <p class="nav-title"> Doesn’t have any account yet?</p> <a href="./signup.php">Sign Up</a>
                </div>
            </div>
            <form method="post">
                <div class="row_field">
                    <label class="newsletter-title">E-mail ID </label>
                    <input type="email" name="email" id="email" class="email-field" placeholder="Email" required>
                </div>
                <div class="row_field">
                    <label class="newsletter-title">Password</label>
                    <div class="sidebyside">
                        <input type="password" name="password" class="email-field" id="password" placeholder="Password"
                            autocomplete="on" required>
                        <span class="material-symbols-rounded" id="leye_btn" onclick="lshowHide();" style="margin-right: 10px;">visibility_off</span>
                    </div>
                </div>
                <div class="col_field">
                    <div class="container flex_div">
                        <button class="btn-newsletter disable" onclick="window.location.href = './index.php'">Back</button>
                    </div>
                    <div class="container flex_div">
                        <button type="submit" class="btn-newsletter">Log in</button>
                    </div>
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