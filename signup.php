<?php
require("./env/config.php");
require_once('./assets/components/toast.php');
include('./PHPMailer/mail.php');
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
    header("Location: profile.php");
    exit();
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
                    <div class="sidebyside">
                        <p class="nav-title">Already have an account?</p> <a href="./login.php">Login</a>
                    </div>
                </div>

                <!-- PHP Signup Logic -->
                <?php
                if (isset($_POST['ok'])) {
                    // Server-side validation
                    $errors = [];
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format";
                    }
                    if ($_POST['password'] !== $_POST['scpassword']) {
                        $errors[] = "Passwords do not match";
                    }
                    if (!empty($_POST['con_num']) && !preg_match('/^[0-9]{10}$/', $_POST['con_num'])) {
                        $errors[] = "Invalid contact number format";
                    }

                    if (empty($errors)) {
                        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                        $mname = mysqli_real_escape_string($conn, $_POST['mname']);
                        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $v_code = bin2hex(random_bytes(16));
                        $con_num = mysqli_real_escape_string($conn, $_POST['con_num']);
                        $alt_num = mysqli_real_escape_string($conn, $_POST['alt_num']);
                        $address = mysqli_real_escape_string($conn, $_POST['address']);

                        // Use prepared statement for secure query execution
                        $sql = "INSERT INTO users (fname, mname, lname, email, con_num, alt_num, address, password, v_code) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssssssss", $fname, $mname, $lname, $email, $con_num, $alt_num, $address, $hashed_password, $v_code);
                        try {
                            if ($stmt->execute()) {
                                if (send_mail($email, $v_code, $fname, $lname)) {
                                    toast("success", "verify your email");
                                } else {
                                    toast("danger", "Something went wrong");
                                }
                            }
                        } catch (Exception $e) {
                            toast("danger", "Account Creation Failed");
                        }

                        $stmt->close();
                    } else {
                        foreach ($errors as $error) {
                            toast("danger", $error);
                        }
                    }
                }
                ?>

                <form method="POST" onsubmit="return validateForm();">
                    <div class="col_field">
                        <div class="row_field">
                            <label class="newsletter-title">First Name</label>
                            <input type="text" name="fname" class="email-field" placeholder="First Name" required onblur="checkName()">
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Middle Name</label>
                            <input type="text" name="mname" class="email-field" placeholder="Middle Name">
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Last Name</label>
                            <input type="text" name="lname" class="email-field" placeholder="Last Name" required onblur="checkName()">
                        </div>
                    </div>
                    <div id="nameMsg" style="color: red;"></div>
                    <div class="row_field">
                        <label class="newsletter-title">E-mail ID </label>
                        <input type="email" name="email" id="email" class="email-field" placeholder="E-mail ID" required onblur="checkName()">
                        <div id="msg"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Password</label>
                        <input type="password" name="password" id="spassword" class="email-field" placeholder="Password" autocomplete="on" required>
                        <small>Password must be at least 8 characters long</small>
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
                            <input type="number" name="con_num" id="contact" class="email-field" placeholder="Contact Number" required>
                            <div id="contactError" style="color: red;"></div>
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
                            <button type="button" onclick="window.history.back();" class="btn-newsletter disable">Back</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Client-Side Validation -->
    <script>
        function checkName() {
            let fname = document.querySelector('input[name="fname"]').value;
            let lname = document.querySelector('input[name="lname"]').value;
            var namePattern = /^[a-zA-Z\s-]+$/;
            let message = '';
            if (!namePattern.test(fname) || !namePattern.test(lname)) {
                message = 'Invalid name format. Only letters are allowed';
            } else if (!fname || !lname) {
                message = 'First Name and Last Name cannot be empty';
            }
            document.getElementById('nameMsg').innerText = message;
        }


        function validateForm() {
            let email = document.getElementById('email').value;
            let password = document.getElementById('spassword').value;
            let confirmPassword = document.getElementById('scpassword').value;
            let contact = document.getElementById('contact').value;

            let valid = true;

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').innerText = 'Invalid email address';
                valid = false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Password length check
            if (password.length < 8) {
                alert('Password must be at least 8 characters long');
                valid = false;
            }

            // Confirm password check
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                valid = false;
            }

            // Contact number check
            if (contact.length !== 10 || isNaN(contact)) {
                document.getElementById('contactError').innerText = 'Contact number must be 10 digits';
                valid = false;
            } else {
                document.getElementById('contactError').innerText = '';
            }

            return valid;
        }

        // Show/Hide Password
        function sshowHide() {
            let passwordField = document.getElementById('spassword');
            let confirmPasswordField = document.getElementById('scpassword');
            let eyeIcon = document.getElementById('seye_btn');
            if (passwordField.type === "password" || confirmPasswordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
                eyeIcon.innerHTML = "visibility";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
                eyeIcon.innerHTML = "visibility_off";
            }
        }

        // Email validation via AJAX
        document.getElementById('email').addEventListener('blur', function() {
            let email = this.value;
            $.ajax({
                method: "POST",
                url: "db/checkEmail.php",
                data: {
                    email: email
                },
                success: function(result) {
                    $("#msg").html(result);
                }
            });
        });
    </script>
</body>

</html>