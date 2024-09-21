<?php
require('../../env/config.php'); // Include your database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];
    $is_verified = $_POST['is_verified'];

    // Update the verification status in the database
    $sql = "UPDATE provider SET is_verified = ? WHERE pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $is_verified, $pid);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
