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
        <div class="col-8">
            <h1>User Registration</h1>
            <form name="frm" method="post">
                <div class="form-group">
                    <label for="fname">Enter Your First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mname">Enter Your Middle Name</label>
                    <input type="text" name="mname" id="mname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lname">Enter Your Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cemail">Enter Your Email</label>
                    <input type="email" name="cemail" id="cemail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpwd">Enter Your Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="form-control" autocomplete="on">
                </div>
                <div class="form-group">
                    <label for="ccontact">Enter Your Contact Number</label>
                    <input type="number" name="ccontact" id="ccontact" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alt_num">Enter Your Alternative Number</label>
                    <input type="number" name="alt_num" id="alt_num" class="form-control">
                </div>
                <div class="form-group">
                    <label for="caddress">Enter Your Address</label>
                    <input type="text" name="caddress" id="caddress" class="form-control">
                </div>
                <input type="submit" name="ok" value="sign up" class="btn btn-primary">
            </form>
            <?php
            if(isset($_POST['ok'])){
                $fname=$_POST['fname'];
                $mname=$_POST['mname'];
                $lname=$_POST['lname'];
                $cemail=$_POST['cemail'];
                $cpwd=$_POST['cpwd'];
                $ccontact=$_POST['ccontact'];
                $alt_num=$_POST['alt_num'];
                $caddress=$_POST['caddress'];
                $sql="INSERT INTO user (fname,mname,lname,cemail,cpwd,ccontact,alt_num,caddress) VALUES('$fname','$mname','$lname','$cemail','$cpwd','$ccontact','$alt_num','$caddress')";
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