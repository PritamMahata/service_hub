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

            </tbody>
        </table>
    </div>
</main>

<script>
    let bookingIdToDelete = null;
    let intervalId = null;
    let state = '';


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
            state = document.getElementById(bookingIdToDelete).value;
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
            xhr.send('booking_id=' + bookingIdToDelete + '&happyCode=' + happyCode + '&status=' + state);
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