<?php require("./components/header.php") ?>
<main>
    <div class="container-fluid px-4">
        <!-- <h2 class="mt-4">Category</h2> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Services</li>
        </ol>
        <a href="addCategory.php" class="btn btn-primary">Add New Service</a>

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

<?php require('./components/footer.php') ?>