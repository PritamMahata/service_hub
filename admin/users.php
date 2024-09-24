<?php require("./components/header.php") ?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </div>
    <div class="container-fluid px-4">
        <h3 class="mb-0">All Users</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ph No</th>
                    <th scope="col">Alt No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Verified/Not</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th><?php echo $row['uid'] ?></th>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['mname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['con_num'] ?></td>
                            <td><?php echo $row['alt_num'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php
                                if ((int) $row['isverified'] == 1) {
                                    echo "Verified";
                                } else {
                                    echo "Not Verified";
                                }
                                ?>
                            </td>
                            <td><?php echo $row['ucreate'] ?></td>
                            <td><?php
                                if ((int) $row['is_deleted'] == 1) {
                                    echo "Deactive";
                                } else {
                                    echo "active";
                                }
                                ?></td>
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