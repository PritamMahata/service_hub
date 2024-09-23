<?php require("./components/header.php") ?>

<!-- Modal for Confirming Delete -->
<?php
if (isset($_GET['booking_id'])) {
    $delID = $_GET['booking_id'];
    if ($delID) {
        $del = "DELETE FROM bookings WHERE booking_id = $delID;";
        try {
            $res = mysqli_query($conn, $del) or die(mysqli_error($conn));
            if ($res) {
                // header('location:services.php');
            } else {
                // header('location:services.php');
            }
        } catch (Exception $e) {
            echo "Error: Service is booked by someone";
        }
    }
}
?>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete this service?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteServiceText">Service ID: </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteService()">Delete</button>
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
        <h3 class="mb-4">All Services Requests</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Booking Id</th>
                    <th scope="col">Assigned Service Engineer</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Service Category</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
            bookings.booking_id, 
            CONCAT(provider.fname, ' ', provider.mname, ' ', provider.lname) AS full_name,
            services.sid, 
            services.sname, 
            service_category.cname AS category_name, 
            provider.fname AS provider_name,
            provider_category.cname AS provider_category_name,
            bookings.booking_date, 
            bookings.status
        FROM bookings 
        INNER JOIN users ON bookings.user_id = users.uid
        INNER JOIN services ON bookings.service_id = services.sid
        INNER JOIN category AS service_category ON services.scategory = service_category.cid
        INNER JOIN provider ON bookings.provider_id = provider.pid
        INNER JOIN category AS provider_category ON provider.provider_category_id = provider_category.cid";

                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th><?php echo $row['booking_id'] ?></th>
                            <th><?php echo $row['full_name'] ?></th>
                            <th><?php echo $row['sname'] ?></th>
                            <th><?php echo $row['category_name'] ?></th>
                            <th><?php echo $row['booking_date'] ?></th>
                            <th><?php echo $row['status'] ?></th>
                            <td><?php echo "<button class='btn btn-primary' onclick='goToDetails(" . $row['booking_id'] . ")'>Edit</button>"; ?></td>
                            <td>
                                <button
                                    type='button'
                                    class='btn btn-danger'
                                    data-bs-toggle='modal'
                                    data-bs-target='#deleteModal'
                                    onclick="setDeleteId(<?php echo $row['booking_id']; ?>)">
                                    Delete
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No record found";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<script>
    function goToDetails(serviceId) {
        window.location.href = "modify.php?sid=" + serviceId;
    }
</script>
<script>
    let serviceIdToDelete = null;

    // Function to set the service ID for deletion
    function setDeleteId(serviceId) {
        serviceIdToDelete = serviceId;
        document.getElementById('deleteServiceText').innerText = "Service ID: " + serviceId; // Update modal text
    }

    // Function to delete the service
    function deleteService() {
        if (serviceIdToDelete) {
            // Redirect to the same page with delete parameter
            window.location.href = `booking.php?booking_id=${serviceIdToDelete}`;
        }
    }
</script>

<?php require('./components/footer.php') ?>