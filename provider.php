<?php require("./env/config.php"); ?>

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
                    $gender = NULL;
                    $age = NULL;
                    $email = $_POST['email'];
                    $con_num = $_POST['con_num'];
                    $alt_num = $_POST['alt_num'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                    $acc_type = $_POST['acc_type'];
                    $pan_card = $_POST['pan_card'];
                    $acc_num = $_POST['acc_num'];
                    $ifsc = $_POST['ifsc'];
                    $experience = NULL;
                    $photo = NULL;
                    $certificate = NULL;
                    $aadhaar = NULL;
                    $sql = "INSERT INTO PROVIDER (fname, mname, lname, gender, age, email, con_num, alt_num, address, password, acc_type, pan_card, acc_num, ifsc, experience, photo, certificate, aadhaar) VALUES ('$fname', '$mname', '$lname', '$gender', '$age', '$email', $con_num, $alt_num, '$address', '$password', '$acc_type', '$pan_card', $acc_num, '$ifsc', '$experience', '$photo', '$certificate', '$aadhaar')";
                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if ($res == 1) {
                        echo "<script>alert('Registration is Successfull')</script>";
                ?>
                        <br>
                        <div class="alert alert-success">
                            Registration is Successfull
                        </div>
                    <?php
                    } else {
                    ?>
                        <br>
                        <div class="alert alert-danger">
                            Registration is Unsuccessfull
                        </div>
                <?php
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
                            <input type="text" name="mname" class="email-field" placeholder="Middle Name" required>
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
                        <input type="password" autocomplete="on" name="password" id="spassword" class="email-field" placeholder="Password" required>
                    </div>

                    <div class="row_field">
                        <label class="newsletter-title">Confirm Password</label>
                        <div class="sidebyside">
                            <input type="password" autocomplete="on" name="scpassword" id="scpassword" class="email-field" placeholder="Confirm Password" required>
                            <ion-icon class="eye" id="seye-btn" name="eye" id="eye" onclick="sshowHide();"></ion-icon>
                        </div>
                    </div>

                    <div class="col_field">
                        <div class="row_field">
                            <label class="newsletter-title">Contact Number</label>
                            <input type="number" name="con_num" class="email-field" placeholder="Contact Number" required>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Alternate Number</label>
                            <input type="number" name="alt_num" class="email-field" placeholder="Alternate Number" required>
                        </div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Address</label>
                        <textarea id="w3review" name="address" rows="4" cols="50"></textarea>
                    </div>
                    <br>
                    <label class="newsletter-title">Account Type</label>
                    <select class="email-field" name="acc_type" id="acc_type" onchange="test()">
                        <option value="1">Consumer</option>
                        <option value="2">Provider</option>
                    </select>
                    <br>
                    <div id="check" style="display: none;">
                        <div class="row_field">
                            <label class="newsletter-title">PAN Card</label>
                            <input type="text" name="pan_card" class="email-field" placeholder="PAN Card Number" required>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Bank Account Details</label>
                            <br>
                            <label class="newsletter-title">Account Number</label>
                            <input type="text" name="acc_num" class="email-field" placeholder="Account Number" required>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">IFSC Code</label>
                            <input type="text" name="ifsc" class="email-field" placeholder="IFSC Code" required>
                        </div>
                    </div><br>
                    <div class="container flex_div">
                        <button type="submit" name="ok" class="btn-newsletter">Sign Up</button>
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