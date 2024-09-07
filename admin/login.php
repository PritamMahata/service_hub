<?php require('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administration</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Administration Login</h3></div>
                                    <div class="card-body">
                                        <form name="log-frm" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="aemail" name="aemail" type="email" placeholder="name@example.com" />
                                                <label for="aemail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="apwd" name="apwd" type="password" placeholder="Password" />
                                                <label for="apwd">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                 <input type="submit" name="ok" value="Login" class="btn btn-primary">
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ok'])){
                                            $aemail=$_POST['aemail'];
                                            $apwd=$_POST['apwd'];
                                            $src="SELECT * FROM admin WHERE aemail='$aemail' AND apwd='$apwd'";
                                            $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                                            if(mysqli_num_rows($rs)>0){
                                                $rec=mysqli_fetch_assoc($rs);
                                                $_SESSION['a_info']=$rec;
                                                header('location:index.php');
                                            }else{
                                                ?>
                                                <div class="alert alert-danger">
                                                    Invalid email or password
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
        <script src="js/scripts.js"></script>
    </body>
</html>
