<?php
include('./env/config.php');
require_once('./assets/components/toast.php');
$emailID = isset($_SESSION['email']) ? $_SESSION['email'] : null;

if ($emailID) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $emailID);
    if ($stmt->execute()) {
        $p_result = $stmt->get_result();
        if ($p_result->num_rows > 0) {
            $p_row = $p_result->fetch_assoc();
            $_SESSION['uid'] = $p_row['uid'];
        } else {
            echo "Unauthorized access";
            header("Location: login.php");
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Unauthorized access";
    header("Location: login.php");
}

// Update Profile Info
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $name = explode(" ", $_POST['name']);
    $fname = isset($name[0]) ? $name[0] : '';
    $mname = isset($name[1]) ? $name[1] : '';
    $lname = isset($name[2]) ? $name[2] : '';
    $con_num = $_POST['con_num'];
    $alt_num = $_POST['alt_num'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE users SET fname=?, mname=?, lname=?, con_num=?, alt_num=?, address=? WHERE uid=?");
    $stmt->bind_param("ssssssi", $fname, $mname, $lname, $con_num, $alt_num, $address, $_SESSION['uid']);

    if ($stmt->execute()) {
        toast("success", "Profile updated successfully!");
        header("Refresh:2");
    } else {
        toast("danger", "Error updating profile: " . $stmt->error);
    }
    $stmt->close();
}

// Change Password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if ($new_password !== $confirm_new_password) {
        toast("danger", "New passwords do not match!");
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE uid=?");
        $stmt->bind_param("i", $_SESSION['uid']);
        $stmt->execute();
        $stmt->bind_result($db_password);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($current_password, $db_password)) {
            $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE users SET password=? WHERE uid=?");
            $stmt->bind_param("si", $new_hashed_password, $_SESSION['uid']);

            if ($stmt->execute()) {
                toast("success", "Password changed successfully!");
                header("Refresh:0");
            } else {
                toast("danger", "Error changing password: " . $stmt->error);
            }
            $stmt->close();
        } else {
            toast("danger", "Incorrect current password!");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHUB</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">
    <!-- custom css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="stylesheet" href="./assets/css/relog.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,600,0,0" />
</head>

<body>
    <div class="overlay" data-overlay></div>
    <?php
    require_once('./assets/components/header.php');
    ?>

    <!-- <a href="assets/components/logout.php">Logout</a> -->
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-1 mb-1"> Dashboard </h4> <br>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Booking Status</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change Password</a>
                        <a class="list-group-item list-group-item-action">
                            <button type="button" class="btn btn-danger" onclick="window.location = './assets/components/logout.php'">Logout</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <!-- <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary"> UPLOAD PHOTO <input type="file" class="account-settings-fileinput">
                                    </label>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div> -->
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="form-label">USER NAME</label>
                                        <input type="text" class="form-control mb-1" name="name" value="<?php echo $p_row['fname'] . " " . $p_row['mname'] . " " . $p_row['lname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-MAIL ID</label>
                                        <input type="email" class="form-control mb-1" name="email" value="<?php echo $p_row['email'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">CONTACT NUMBER</label>
                                        <input type="text" class="form-control" name="con_num" value="<?php echo $p_row['con_num'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">ALTERNATE CONTACT NUMBER</label>
                                        <input type="text" class="form-control" name="alt_num" value="<?php echo $p_row['alt_num'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">ADDRESS</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $p_row['address'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update_profile">Save Changes</button>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="form-label">CURRENT PASSWORD</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">NEW PASSWORD</label>
                                        <input type="password" name="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">REPEAT NEW PASSWORD</label>
                                        <input type="password" name="confirm_new_password" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="change_password">Change Password</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Request Id</th>
                                            <th>Arrival Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Happy Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['uid'])) {
                                            $uid = $_SESSION['uid'];
                                            $sql = "SELECT * FROM bookings where user_id = $uid;";
                                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                        ?>
                                                    <tr>
                                                        <td><a class="navi-link" href="#order-details" data-toggle="modal"><?php echo $row['order_id']; ?></a></td>
                                                        <td><?php echo $row['arrival_date']; ?></td>
                                                        <td><span>
                                                                <?php
                                                                // Use a different variable for the services query
                                                                $service_sql = "SELECT * FROM services WHERE sid = " . $row['service_id'] . ";";
                                                                $service_result = mysqli_query($conn, $service_sql);
                                                                if (mysqli_num_rows($service_result) == 1) {
                                                                    $price = mysqli_fetch_assoc($service_result);
                                                                    echo "₹" . $price['sprice'];
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 'pending') {
                                                                echo "<span class='badge badge-warning p-2'>PENDING</span>";
                                                            } else if ($row['status'] == 'confirmed') {
                                                                echo "<span class='badge badge-info p-2'>CONFIRMED</span>";
                                                            } else if ($row['status'] == 'completed') {
                                                                echo "<span class='badge badge-success p-2'>COMPLETED</span>";
                                                            } else if ($row['status'] == 'cancelled') {
                                                                echo "<span class='badge badge-danger p-2'>CANCELLED</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['happy_code']; ?></td>
                                                        <td>
                                                            <?php
                                                            if (!(($row['status'] == 'confirmed') || ($row['status'] == 'cancelled'))) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onclick="window.location = './assets/components/cancel_order.php?order_id=<?php echo $row['order_id']; ?>'">CANCEL</button>
                                                            <?php
                                                            } else { ?>
                                                                <button type='button' class='btn btn-danger' disabled>CANCEL</button>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <?php
    require_once('./assets/components/footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>