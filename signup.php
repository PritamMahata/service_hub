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
    <style>
        .error-border {
            border: 3px solid red;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
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
                        $alt_num = isset($_POST['alt_num']) ? mysqli_real_escape_string($conn, $_POST['alt_num']) : null; // Check if alt_num is set
                        $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : null; // Check if address is set

                        // Use prepared statement for secure query execution
                        $sql = "INSERT INTO users (fname, mname, lname, email, con_num, alt_num, address, password, v_code) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssssssss", $fname, $mname, $lname, $email, $con_num, $alt_num, $address, $hashed_password, $v_code);
                        try {
                            if ($stmt->execute()) {
                                if (send_mail($email, $v_code, $fname, $lname)) {
                                    toast("success", "Verify your email");
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
                    <div class="row_field">
                        <div class="col_field">
                            <div class="row_field">
                                <label class="newsletter-title">First Name</label>
                                <input type="text" name="fname" id="fname" class="email-field" placeholder="First Name" required oninput="validateInput('fname')">
                                <div id="fnameError" class="error-message"></div>
                            </div>
                            <div class="row_field">
                                <label class="newsletter-title">Middle Name</label>
                                <input type="text" name="mname" id="mname" class="email-field" placeholder="Middle Name" oninput="validateInput('mname')">
                                <div id="mnameError" class="error-message"></div>
                            </div>
                            <div class="row_field">
                                <label class="newsletter-title">Last Name</label>
                                <input type="text" name="lname" id="lname" class="email-field" placeholder="Last Name" required oninput="validateInput('lname')">
                                <div id="lnameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">E-mail ID </label>
                        <input type="email" name="email" id="email" class="email-field" placeholder="E-mail ID" required oninput="validateInput('email')">
                        <div id="emailError" class="error-message"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Password</label>
                        <div class="sidebyside">
                            <input type="password" name="password" id="password" class="email-field" placeholder="Password" required oninput="validateInput('password')">
                            <span class="material-symbols-rounded" id="seye_btn" onclick="sshowHide();" style="margin-right: 10px;">visibility_off</span>
                        </div>
                        <div id="passwordError" class="error-message"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Confirm Password</label>
                        <div class="sidebyside">
                            <input type="password" name="scpassword" id="scpassword" class="email-field" placeholder="Confirm Password" required oninput="validateInput('scpassword')">
                            <span class="material-symbols-rounded" id="sceye_btn" onclick="scshowHide();" style="margin-right: 10px;">visibility_off</span>
                        </div>
                        <div id="scpasswordError" class="error-message"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Contact Number</label>
                        <input type="number" name="con_num" id="contact" class="email-field" placeholder="Contact Number" required oninput="validateInput('contact')">
                        <div id="contactError" class="error-message"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Alternate Number</label>
                        <input type="number" name="alt_num" id="alt_num" class="email-field" placeholder="Alternate Number" oninput="validateInput('alt_num')">
                        <div id="alt_numError" class="error-message"></div>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">Address</label>
                        <textarea id="address" name="address" rows="4" cols="50" class="email-field" oninput="validateInput('address')" required></textarea>
                        <div id="addressError" class="error-message"></div>
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
    <script>
        // Validate input fields and show errors dynamically
        function validateInput(fieldId) {
            const input = document.getElementById(fieldId);
            const errorDiv = document.getElementById(`${fieldId}Error`);

            if (fieldId === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    errorDiv.textContent = "Please enter a valid email address.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (["fname", "lname"].includes(fieldId)) {
                const nameRegex = /^[a-zA-Z]+$/;
                if (!nameRegex.test(input.value)) {
                    errorDiv.textContent = "Only letters are allowed.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (["mname"].includes(fieldId)) {
                const nameRegex = /^[a-zA-Z]+$/;
                if (!nameRegex.test(input.value) && input.value.trim() !== "") {
                    errorDiv.textContent = "Only letters are allowed.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (fieldId === "password") {
                if (input.value.length < 8) {
                    errorDiv.textContent = "Password must be at least 8 characters long.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (fieldId === "scpassword") {
                if (input.value !== document.getElementById('password').value) {
                    errorDiv.textContent = "Passwords do not match";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (fieldId === "contact") {
                if (input.value.length !== 10) {
                    errorDiv.textContent = "Contact number must be 10 digits.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else if (fieldId === "alt_num") {
                if (input.value.length !== 10) {
                    errorDiv.textContent = "Contact number must be 10 digits.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            } else {
                // Generic validation for non-empty input
                if (input.value.trim() === "") {
                    errorDiv.textContent = "This field is required.";
                    input.classList.add("error-border");
                } else {
                    errorDiv.textContent = "";
                    input.classList.remove("error-border");
                }
            }
        }

        // Prevent form submission if there are errors
        function validateForm() {
            const inputs = document.querySelectorAll(".email-field");
            let isValid = true;

            inputs.forEach((input) => {
                validateInput(input.id);
                if (input.classList.contains("error-border")) {
                    isValid = false;
                }
            });

            return isValid; // Submit only if all inputs are valid
        }


        //Show/Hide Password
        function sshowHide() {
            let spassword = document.getElementById("password");
            let seye_btn = document.getElementById("seye_btn");

            if (spassword.type === "password") {
                spassword.type = "text";
                seye_btn.innerHTML = "visibility";
            } else {
                spassword.type = "password";
                seye_btn.innerHTML = "visibility_off";
            }
        }

        function scshowHide() {
            let scpassword = document.getElementById('scpassword');
            let eyeIconc = document.getElementById('sceye_btn');
            if (scpassword.type === "password") {
                scpassword.type = "text";
                eyeIconc.innerHTML = "visibility";
            } else {
                scpassword.type = "password";
                eyeIconc.innerHTML = "visibility_off";
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
                    $("#emailError").html(result);
                }
            });
        });
    </script>
    <script src="./assets/js/relog.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Client-Side Validation -->

</body>

</html>