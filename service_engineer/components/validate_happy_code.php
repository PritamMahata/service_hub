<?php
require("../../env/config.php");

if (isset($_POST['booking_id']) && isset($_POST['happyCode'])) {
    $bookingId = $_POST['booking_id'];
    $happyCode = $_POST['happyCode'];
    $status = $_POST['status'];

    // Check if the happy code matches the one in the database
    $query = "SELECT * FROM bookings WHERE booking_id = ? AND happy_code = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $bookingId, $happyCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the happy code is correct, proceed with deletion
        $deleteQuery = "UPDATE bookings SET status = '$status',is_done = 1 WHERE booking_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $bookingId);
        if ($deleteStmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Service deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete service."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid happy code."]);
    }

    $stmt->close();
    $conn->close();
}
?>
