<?php
require_once('./env/config.php');
if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $sql = "SELECT * FROM users WHERE email = '$_GET[email]' AND v_code = '$_GET[v_code]'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['v_code'] == $_GET['v_code']) {
                // $sql = "UPDATE users SET v_code = NULL WHERE email = '$_GET[email]'";
                // $result = mysqli_query($conn, $sql);
                echo "Email verified successfully";
            } else {
                echo "Email verification failed";
            }
        }
    }
}
