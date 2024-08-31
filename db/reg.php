<?php require("index.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Title</title>
</head>
<body>
    <div class="container">
        <div class="col-6">
            <h1>User Registration</h1>
            <form name="frm" method="post">
                <div class="form-group">
                    <label for="cname">Enter Your Name</label>
                    <input type="text" name="cname" id="cname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cemail">Enter Your Email</label>
                    <input type="email" name="cemail" id="cemail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpwd">Enter Your Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ccontact">Enter Your Contact Number</label>
                    <input type="number" name="ccontact" id="ccontact" class="form-control">
                </div>
                <input type="submit" name="ok" value="sign up" class="btn btn-primary">
            </form>
            <?php
            if(isset($_POST['ok'])){
                $cname=$_POST['cname'];
                $cemail=$_POST['cemail'];
                $cpwd=$_POST['cpwd'];
                $ccontact=$_POST['ccontact'];
                $sql="INSERT INTO user (cname,cemail,cpwd,ccontact) VALUES('$cname','$cemail','$cpwd','$ccontact')";
                $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                if($res==1){
                    ?>
                    <div class="alert alert-success">
                        Your account has been created successfully
                    </div>
                    <?php
                }else{
                    ?>
                     <div class="alert alert-success">
                        Your account has not been created
                    </div>
                    <?php
                }
            }
            ?>    
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>