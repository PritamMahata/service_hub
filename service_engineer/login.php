<?php require('../env/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Service Engineer</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Service Engineer Login</h3>
                                </div>
                                <div class="card-body">
                                    <form name="log-frm" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="semail" name="semail" type="email" placeholder="name@example.com" />
                                            <label for="semail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                            <input type="submit" name="ok" value="Login" class="btn btn-primary">
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['ok'])) {
                                        $semail = $_POST['semail'];
                                        $password = $_POST['password'];
                                        $src = "SELECT * FROM provider WHERE email='$semail' AND password='$password' AND is_verified=1 AND is_deleted=0 AND is_banned=0";
                                        $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                                        if (mysqli_num_rows($rs) > 0) {
                                            $rec = mysqli_fetch_assoc($rs);
                                            $_SESSION['se_info'] = $rec;
                                            header('location:index.php');
                                        } else {
                                    ?>
                                            <div class="alert alert-danger">
                                                Invalid email or password or your account is not verified
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>