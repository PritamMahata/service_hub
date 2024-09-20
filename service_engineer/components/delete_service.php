<?php
if (isset($_GET['booking_id'])) {
    $delID = $_GET['booking_id'];
    if ($delID) {
        $del = "DELETE FROM bookings WHERE booking_id = $delID;";
        try {
            $res = mysqli_query($conn, $del) or die(mysqli_error($conn));
            if ($res) {
                // Redirect to the same page after successful deletion
                header('location:services.php');
            } else {
                // Handle failure case
                echo "Failed to delete the booking.";
            }
        } catch (Exception $e) {
            echo "Error: Service is booked by someone";
        }
    }
}
