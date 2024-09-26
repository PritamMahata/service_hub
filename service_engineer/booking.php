<?php require("./components/header.php"); ?>

<!-- Modal for Confirming Delete -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete this service?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Happy Code</span>
                    </div>
                    <input type="text" id="inp_happyCode" name="inp_happyCode" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="deleteService()">Apply</button>
            </div>
        </div>
    </div>
</div>

<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Bookings</li>
        </ol>
    </div>
    <div class="container-fluid px-4">
        <h3 class="mb-4">All Service Requests</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Request Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Ph. No.</th>
                    <th scope="col">Booking Address</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * 
                FROM bookings 
                INNER JOIN services ON bookings.service_id = services.sid
                INNER JOIN users ON users.uid = bookings.user_id 
                WHERE bookings.provider_id = " . $_SESSION['se_info']['pid'] . ";";

                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th><?php echo $row['order_id']; ?></th>
                            <th><?php echo $row['fname'] . " " . $row['lname']; ?></th>
                            <th><?php echo $row['bphone']; ?></th>
                            <th><?php echo $row['baddress']; ?></th>
                            <th><?php echo $row['issue']; ?></th>
                            <th><?php echo $row['arrival_date']; ?></th>
                            <th>
                                <select class="form-select" onchange="changeStatus(<?php echo $row['booking_id']; ?>, this.value)">
                                    <option selected disabled value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                    <option value="confirmed" <?php if ($row['status'] == 'confirmed') echo 'selected'; ?>>Confirmed</option>
                                    <option value="cancelled" <?php if ($row['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                                    <option value="cancelled" <?php if ($row['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                                </select>
                            </th>
                            <th>
                                <button class="btn btn-success" onclick="modal(<?php echo $row['booking_id'] ?>)">Completed</button>
                            </th>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    let bookingIdToDelete = null;
    let intervalId = null;

    // Function to set the booking ID for deletion
    function setDeleteId(bookingId) {
        bookingIdToDelete = bookingId;
        document.getElementById('deleteServiceText').innerText = "Service ID: " + bookingId; // Update modal text
    }

    // Function to delete the service after confirmation
    function deleteService() {
        if (bookingIdToDelete) {
            window.location.href = `services.php?booking_id=${bookingIdToDelete}`;
        }
    }

    // AJAX function to change the status of the booking
    function changeStatus(bookingId, newStatus) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'components/update_status.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Status updated successfully');
            } else {
                console.error('Error occurred while updating status.');
            }
        };
        if (newStatus === 'completed') {
            modal();
        }
        xhr.send('booking_id=' + bookingId + '&status=' + newStatus);
    }

    function modal(bookingId) {
        bookingIdToDelete = bookingId;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    function deleteService() {
        let happyCode = document.getElementById('inp_happyCode').value;
        if (bookingIdToDelete && happyCode) {
            // Make AJAX request to validate happy code and delete service if valid
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'components/validate_happy_code.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        alert(response.message);
                        // Redirect or refresh the page to update the services list
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                } else {
                    alert('An error occurred while processing your request.');
                }
            };

            // Send the booking ID and happy code to the server
            xhr.send('booking_id=' + bookingIdToDelete + '&happyCode=' + happyCode);
        } else {
            alert('Please enter the happy code.');
        }
    }

    intervalId = setInterval(reloadBookingTable, 1000);
    // Function to reload the booking table every 5 seconds
    function reloadBookingTable() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './components/fetch_bookings.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.querySelector('table tbody').innerHTML = xhr.responseText;
                document.querySelectorAll('.form-select').forEach(selectElement => {
                    selectElement.addEventListener('focus', () => {
                        clearInterval(intervalId);
                    });

                    selectElement.addEventListener('blur', () => {
                        intervalId = setInterval(reloadBookingTable, 1000);
                    });
                });
            } else {
                console.error('Error occurred while fetching booking data.');
            }
        };
        xhr.send();
    }
</script>

<?php require('./components/footer.php'); ?>