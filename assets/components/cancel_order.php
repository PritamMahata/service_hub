<?php
require_once '../../env/config.php';
require_once('./toast.php');
$showAlert = false;

$orderID = $_GET['order_id'];
$sql = "DELETE FROM bookings WHERE order_id = '$orderID'";
if ($conn->query($sql) === TRUE) {
    // echo '<script>alert("Order Cancelled Successfully")</script>';
    echo '<script> window.location = "../../profile.php"</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
