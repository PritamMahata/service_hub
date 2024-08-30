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
    <div class="container">
        <div class="login_box">
            <div class="newsletter-img">
                <img src="./assets/images/servicebanner.png" width="400" height="400">
            </div>
            <div style="min-width:350px" class="form_style">
                <form action="#">
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
                    <label class="newsletter-title">Password</label>
                    <input type="password" name="password" class="email-field" placeholder="Password" required>
                    <label class="newsletter-title">Confirm Password</label>
                    <input type="password" name="cpassword" class="email-field" placeholder="Confirm Password" required>
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
                    <select class="email-field" id="acc_type" onchange="test()">
                        <option value="1">Consumer</option>
                        <option value="2">Provider</option>
                    </select>
                    <br>
                    <div id="check" style="display: none;">
                        <label class="newsletter-title">PAN Card</label>
                        <input type="text" name="pan_card" class="email-field" placeholder="PAN Card Number" required>
                        <label class="newsletter-title">Bank Account Details</label>
                        <br>
                        <label class="newsletter-title">Account Number</label>
                        <input type="text" name="acc_num" class="email-field" placeholder="Account Number" required>
                        <label class="newsletter-title">IFSC Code</label>
                        <input type="text" name="ifsc" class="email-field" placeholder="IFSC Code" required>
                    </div><br>
                    <div class="container flex_div">
                        <button type="submit" class="btn-newsletter">Sign Up</button>
                        <!-- <button type="submit" class="btn-newsletter">Log in</button> -->
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