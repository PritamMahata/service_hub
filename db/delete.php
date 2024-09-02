<?php
require('index.php');
$cid=$_GET['cid'];
echo $cid;
$del="DELETE FROM USER WHERE cid=$cid";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:view.php?msg=User details deleted successfully');
}else{
    header('location:view.php?msg=User details not deleted');
}
?>