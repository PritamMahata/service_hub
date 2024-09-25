<?php
require("./env/config.php");
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
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,600,0,0">
</head>

<body>
    <div class="overlay" data-overlay></div>

    <?php
    require_once('./assets/components/header.php');
    require_once('./assets/components/sub_components/slidebar.php');

    // Fetch categories safely using prepared statements
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->get_result();
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
                        <p class="nav-title">Already have an account?</p>
                        <a href="./login.php">Login</a>
                    </div>
                </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ok'])) {
                    $errors = [];

                    // Server-side validation
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format";
                    }
                    if (strlen($_POST['password']) < 8 || $_POST['password'] !== $_POST['scpassword']) {
                        $errors[] = "Passwords must be at least 8 characters long and match";
                    }
                    if (!preg_match('/^[0-9]{12}$/', $_POST['aadhaar'])) {
                        $errors[] = "Aadhaar number must be 12 digits";
                    }
                    if (!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $_POST['pan_card'])) {
                        $errors[] = "Invalid PAN card format";
                    }
                    if (!preg_match('/^[A-Z]{4}0[A-Z0-9]{6}$/', $_POST['ifsc'])) {
                        $errors[] = "Invalid IFSC code format";
                    }

                    if (empty($errors)) {
                        // Sanitize user inputs
                        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                        $mname = mysqli_real_escape_string($conn, $_POST['mname']);
                        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                        $age = mysqli_real_escape_string($conn, $_POST['age']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $con_num = mysqli_real_escape_string($conn, $_POST['con_num']);
                        $alt_num = mysqli_real_escape_string($conn, $_POST['alt_num']);
                        $address = mysqli_real_escape_string($conn, $_POST['address']);
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $pan_card = mysqli_real_escape_string($conn, $_POST['pan_card']);
                        $aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
                        $acc_num = mysqli_real_escape_string($conn, $_POST['acc_num']);
                        $ifsc = mysqli_real_escape_string($conn, $_POST['ifsc']);
                        $provider_category_id = mysqli_real_escape_string($conn, $_POST['category']);

                        // Prepared statement to insert data
                        $stmt = $conn->prepare("INSERT INTO provider (provider_category_id, fname, mname, lname, gender, age, email, con_num, alt_num, address, password, pan_card, acc_num, ifsc, aadhaar, created_at, updated_at, is_deleted, is_verified, is_banned) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp(), '0', '0', '0')");
                        $stmt->bind_param("isssisssssssss", $provider_category_id, $fname, $mname, $lname, $gender, $age, $email, $con_num, $alt_num, $address, $password, $pan_card, $acc_num, $ifsc, $aadhaar);
                        $res = $stmt->execute();

                        if ($res) {
                            toast("success", "Account Created Successfully, we will contact you soon");
                        } else {
                            toast("danger", "Account Creation Failed");
                        }
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

                    <div class="col_field">
                        <div class="row_field">
                            <label class="newsletter-title">Gender</label>
                            <select name="gender" class="email-field" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Others</option>
                            </select>
                        </div>
                        <div class="row_field">
                            <label class="newsletter-title">Age</label>
                            <input type="number" name="age" class="email-field" placeholder="Age" required>
                        </div>
                    </div>

                    <div class="row_field">
                        <label class="newsletter-title">E-mail ID</label>
                        <input type="email" name="email" id="email" class="email-field" placeholder="E-mail ID" required>
                        <div id="msg"></div>
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

                    <div class="row_field">
                        <label class="newsletter-title">Address</label>
                        <textarea id="w3review" name="address" rows="4" cols="50" required></textarea>
                    </div>

                    <div class="row_field">
                        <label class="newsletter-title">PAN Card</label>
                        <input type="text" name="pan_card" class="email-field" placeholder="PAN Card Number" required>
                    </div>

                    <div class="row_field">
                        <label class="newsletter-title">Aadhaar Number</label>
                        <input type="number" name="aadhaar" class="email-field" placeholder="Aadhaar Number" required>
                    </div>

                    <br>
                    <label class="newsletter-title">Bank Account Details</label>
                    <div class="row_field">
                        <label class="newsletter-title">Account Number</label>
                        <input type="text" name="acc_num" class="email-field" placeholder="Account Number" required>
                    </div>
                    <div class="row_field">
                        <label class="newsletter-title">IFSC Code</label>
                        <input type="text" name="ifsc" class="email-field" placeholder="IFSC Code" required>
                    </div>

                    <!-- Category Selection -->
                    <div class="row_field">
                        <label class="newsletter-title">Select Category</label>
                        <select name="category" class="email-field" required>
                            <option value="" disabled selected>Select Category</option>
                            <?php
                            // Populate the categories in the select field
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col_field">
                        <div class="container flex_div">
                            <button type="button" class="btn-newsletter disable" onclick="window.history.back();">Back</button>
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

    <script>
        // Client-side Validation
        function validateForm() {
            let password = document.getElementById('spassword').value;
            let confirmPassword = document.getElementById('scpassword').value;

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }

        // Email validation via AJAX
        document.getElementById('email').addEventListener('blur', function() {
            let email = this.value;
            $.ajax({
                method: "POST",
                url: "db/provider_checkEmail.php",
                data: {
                    email: email
                },
                success: function(result) {
                    $("#msg").html(result);
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>