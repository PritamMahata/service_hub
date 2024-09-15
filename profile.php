<?php
include('./env/config.php');

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
    <link rel="stylesheet" href="./assets/css/index.css">
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
        <h4 class="font-weight-bold py-1 mb-1"> Account settings </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">status</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action">
                            <button type="button" class="btn btn-danger" onclick="window.location = './assets/components/logout.php'">logout</button>
                        </a>
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications
                        </a> -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary"> Upload new photo <input type="file" class="account-settings-fileinput">
                                    </label>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $p_row['fname'] . " " . $p_row['mname'] . " " . $p_row['lname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $p_row['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" value="<?php echo $p_row['con_num'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" autocomplete="on" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" autocomplete="on" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" autocomplete="on" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control"
                                        rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="custom-select">
                                        <option>USA</option>
                                        <option selected>Canada</option>
                                        <option>UK</option>
                                        <option>Germany</option>
                                        <option>France</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" value>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Arricval Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
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
                                                                    echo $price['sprice'];
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 'pending') {
                                                                echo "<span class='badge badge-warning p-2'>pending</span>";
                                                            } else if ($row['status'] == 'confirmed') {
                                                                echo "<span class='badge badge-info p-2'>confirmed</span>";
                                                            } else if ($row['status'] == 'completed') {
                                                                echo "<span class='badge badge-success p-2'>completed</span>";
                                                            } else if ($row['status'] == 'cancelled') {
                                                                echo "<span class='badge badge-danger p-2'>cancelled</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (($row['status'] == 'pending' || $row['status'] == 'completed' || $row['status'] == 'cancelled') && $row['arrival_date'] > $row['booking_date']) {
                                                            ?>
                                                                <button type="button" class="btn btn-danger" onclick="window.location = './assets/components/cancel_order.php?order_id=<?php echo $row['order_id']; ?>'">Cancel</button>
                                                            <?php
                                                            } else { ?>
                                                                <button type='button' class='btn btn-danger' disabled>Cancel</button>
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
        <div class="text-right m-3">
            <button type="button" class="btn btn-primary">Save changes</button>
            &nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
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