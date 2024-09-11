<?php require("index.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
        <h1>User details</h1>
        <?php
        if (isset($_GET['msg'])) {
        ?>
            <div class="alert alert-success">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php
        } elseif (isset($_GET['err'])) {
        ?>
            <div class="alert alert-danger">
                <?php echo $_GET['err'] ?>
            </div>
        <?php
        }
        ?>
        <?php
        $src = "SELECT * FROM user";
        $rs = mysqli_query($con, $src) or die(mysqli_error($con));
        //echo mysqli_num_rows($rs);
        if (mysqli_num_rows($rs) > 0) {
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact Number</th>
                        <th>Alternative Number</th>
                        <th>Address</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rec = mysqli_fetch_assoc($rs)) {
                    ?>
                        <tr>
                            <td><?php echo $rec['fname'] ?></td>
                            <td><?php echo $rec['mname'] ?></td>
                            <td><?php echo $rec['lname'] ?></td>
                            <td><?php echo $rec['cemail'] ?></td>
                            <td><?php echo $rec['cpwd'] ?></td>
                            <td><?php echo $rec['ccontact'] ?></td>
                            <td><?php echo $rec['alt_num'] ?></td>
                            <td><?php echo $rec['caddress'] ?></td>
                            <td><a href="update.php?cid=<?php echo $rec['cid'] ?>"><i class="fa-solid fa-pen-to-square text-primary"></i></a></td>
                            <td><a href="delete.php?cid=<?php echo $rec['cid'] ?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo "No user details found";
        }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>