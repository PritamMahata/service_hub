<?php
require("../env/config.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email is already registered
        echo "<strong style = 'color:red;'>This email is already registered.</strong>";
    } else {
        // Email is available
        echo "<strong style = 'color:green;'>Email is available.</strong>";
    }

    $stmt->close();
    $conn->close();
}
