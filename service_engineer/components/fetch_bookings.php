<?php
require_once '../../env/config.php'; // Assuming this is where you connect to the database

$sql = "SELECT * 
        FROM bookings 
        INNER JOIN services ON bookings.service_id = services.sid
        INNER JOIN users ON users.uid = bookings.user_id 
        WHERE bookings.provider_id = " . $_SESSION['se_info']['pid'] . " AND bookings.status = 'pending' OR bookings.is_done = 0;";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <th>' . $row['order_id'] . '</th>
                <th>' . $row['fname'] . ' ' . $row['lname'] . '</th>
                <th>' . $row['bphone'] . '</th>
                <th>' . $row['baddress'] . '</th>
                <th>' . $row['issue'] . '</th>
                <th>' . $row['arrival_date'] . '</th>
                <th>
                    <select class="form-select" id="' . $row['booking_id'] . '" onchange="changeStatus(' . $row['booking_id'] . ', this.value)">
                        <option selected disabled value="pending" ' . ($row['status'] == 'pending' ? 'selected' : '') . '>Pending</option>
                        <option value="confirmed" ' . ($row['status'] == 'confirmed' ? 'selected' : '') . '>Confirmed</option>
                        <option value="cancelled" ' . ($row['status'] == 'cancelled' ? 'selected' : '') . '>Cancelled</option>
                    </select>
                </th>';

        echo '<th>';
        if ($row['status'] == 'cancelled') {
            echo '<button class="btn btn-danger" id="action-btn" onclick="modal(' . $row['booking_id'] . ')">cancel</button>';
        } else {
            echo '<button class="btn btn-success" id="action-btn" onclick="modal(' . $row['booking_id'] . ')">Completed</button>
                    </th>
                  </tr>';
        }
    }
} else {
    echo '<tr><td colspan="8">No records found</td></tr>';
}
