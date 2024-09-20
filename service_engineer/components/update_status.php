<?Php
require_once('../../env/config.php');
if (isset($_POST['booking_id']) && isset($_POST['status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];

    // Update the status in the database
    $sql = "UPDATE bookings SET status = '$new_status' WHERE booking_id = $booking_id";

    if (mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
