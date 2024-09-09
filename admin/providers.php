<?php require("./components/header.php") ?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Providers</li>
        </ol>
    </div>
    <div class="container-fluid px-4">
        <h3 class="mb-0">All Provides</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ph No</th>
                    <th scope="col">Alt No</th>
                    <th scope="col">Address</th>
                    <th scope="col">PAN Number</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">IFSC code</th>
                    <th scope="col">Experience</th>
                    <th scope="col" colspan="2">Account Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM provider;";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th><?php echo $row['pid'] ?></th>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['mname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['con_num'] ?></th>
                            <th><?php echo $row['alt_num'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['pan_card'] ?></td>
                            <td><?php echo $row['acc_num'] ?></td>
                            <td><?php echo $row['ifsc'] ?></td>
                            <td><?php echo $row['experience'] ?></th>
                            <td><?php
                                if ($row['is_deleted'] == 0) {
                                    echo "Active";
                                } else {
                                    echo "Inactive";
                                } ?></th>
                                </th>
                            <td><?php
                                if ($row['is_verified'] == 0) {
                                    echo "Not Verified";
                                } else {
                                    echo "Verified";
                                } ?></th>
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
<?php require('./components/footer.php') ?>