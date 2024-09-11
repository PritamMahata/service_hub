<?php require("./env/config.php");
require_once('./assets/components/toast.php');
include('./PHPMailer/mail.php');
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
    <link rel="stylesheet" href="./assets/css/option.css">
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,600,0,0" />
</head>

<body>
    <div class="overlay" data-overlay></div>
    <?php
    require_once('./assets/components/header.php');
    require_once('./assets/components/sub_components/slidebar.php');
    ?>
    <div class="container">
        <div class="login_box">
            <div class="newsletter-img">
                <img src="./assets/images/servicebanner.png" width="400" height="400">
            </div>
            <div style="min-width:350px" class="form_style">

                <h1 class="form_heading">Create Account</h1>
                <div class="row_field">
                    <div class="sidebyside ">
                        <p class="nav-title"> Already have any account !</p> <a href="./login.php">Login</a>
                    </div>
                </div>
                <?php
                if (isset($_POST['ok'])) {
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $v_code = bin2hex(random_bytes(16));
                    $con_num = $_POST['con_num'];
                    $alt_num = $_POST['alt_num'];
                    $address = $_POST['address'];
                    $res = 0;
                    $sql = "INSERT INTO users (fname, mname, lname, email, con_num, alt_num, address, password,v_code) VALUES ('$fname', '$mname', '$lname','$email', $con_num, $alt_num, '$address', '$hashed_password', '$v_code')";
                    try {
                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    } catch (Exception $e) {
                        $res = 0;
                    }
                    if ($res == 1) {
                        toast("success", send_mail($email, $v_code, $fname, $lname));
                ?>
                        <!-- <script>
                            setTimeout(() => {
                                window.location.href = "./login.php";
                            }, 5000);
                        </script> -->
                <?php
                    } else {
                        toast("danger", "Account Creation Failed");
                    }
                }
                ?>
                <form method="POST">
                    <div class="col_field">
                        <div class="row_field">
                            <label class="newsletter-title">First Name</label>
                            <input type="text" name="fname" class="email-field" placeholder="First Name" required>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Middle Name</label>
                            <input type="text" name="mname" class="email-field" placeholder="Middle Name">
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Last Name</label>
                            <input type="text" name="lname" class="email-field" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">E-mail ID </label>
                        <input type="email" name="email" class="email-field" placeholder="E-mail ID" required>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Password</label>
                        <input type="password" name="password" id="spassword" class="email-field" placeholder="Password" autocomplete="on" required>
                    </div>

                    <div class="row_field">
                        <label class="newsletter-title">Confirm Password</label>
                        <div class="sidebyside">
                            <input type="password" name="scpassword" id="scpassword" class="email-field" placeholder="Confirm Password" autocomplete="on" required>
                            <span class="material-symbols-rounded" id="seye_btn" onclick="sshowHide();" style="margin-right: 10px;">visibility_off</span>
                        </div>
                    </div>

                    <div class="col_field">
                        <div class="row_field">
                            <label class="newsletter-title">Contact Number</label>
                            <input type="number" name="con_num" class="email-field" placeholder="Contact Number" required>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Alternate Number</label>
                            <input type="number" name="alt_num" class="email-field" placeholder="Alternate Number">
                        </div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Address</label>
                        <textarea id="w3review" name="address" rows="4" cols="50"></textarea>
                    </div>
                    <br>
                    <div class="col_field">
                        <div class="container flex_div">
                            <button name="ok" class="btn-newsletter disable" onclick="window.history.back();"> Back</button>
                        </div>
                        <div class="container flex_div">
                            <button type="submit" name="ok" class="btn-newsletter">Sign Up</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <?php require_once('./assets/components/footer.php') ?>
    <script src="./assets/js/relog.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>