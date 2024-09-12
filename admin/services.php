<?php require("./components/header.php") ?>

<!-- Modal for Confirming Delete -->
<?php
if (isset($_GET['sid'])) {
    $delID = $_GET['sid'];
    if ($delID) {
        $del = "DELETE FROM services WHERE sid = $delID;";
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
    } else {
        echo "No record found";
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
            <li class="breadcrumb-item active">Services</li>
        </ol>
        <a href="modify.php" class="btn btn-primary">Add New Service</a>

    </div>
    <div class="container-fluid px-4">
        <h3 class="mb-0">All Services</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Description</th>
                    <th scope="col">Featurs</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM services;";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th><?php echo $row['sid'] ?></th>
                            <td><?php echo $row['sname'] ?></td>
                            <td><?php echo $row['sduration'] ?></td>
                            <td><?php echo $row['sdes'] ?></td>
                            <td><?php echo $row['sfeatures'] ?></td>
                            <td><?php echo "₹" . $row['sprice'] ?></td>
                            <td><?php echo $row['sdiscount'] . "%" ?></td>
                            <td><?php echo "<button class='btn btn-primary' onclick='goToDetails(" . $row['sid'] . ")'>Edit</button>"; ?></td>
                            <td>
                            <td>
                                <button
                                    type='button'
                                    class='btn btn-danger'
                                    data-bs-toggle='modal'
                                    data-bs-target='#deleteModal'
                                    onclick="setDeleteId(<?php echo $row['sid']; ?>)">
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
    <div class="container-fluid px-4">
        <div class="row mb-2">
            <div class="col-md-4">
                <h3 class="mb-0">Category</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM category;";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th><?php echo $row['cid'] ?></th>
                                    <td><?php echo $row['cname'] ?></td>
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
            <div class="col-md-8">
                <h3 class="mb-0">Sub Category</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sub Category Id</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Category Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM sub_category;";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th><?php echo $row['subcat'] ?></th>
                                    <td><?php echo $row['subcatname'] ?></td>
                                    <td><?php echo $row['category_id'] ?></td>
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
        </div>
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
            window.location.href = `services.php?sid=${serviceIdToDelete}`;
        }
    }
</script>

<?php require('./components/footer.php') ?>