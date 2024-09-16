<?php
require_once('./env/config.php');
?>

<div class="container">
    <div class="cart-container">
        <h3>Cart</h3>
        <div class="col-md-9 container">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="account-connections">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Arricval Date</th>
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
                                        while ($row = $result->fetch_assoc()) { ?>
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
                                                <td><?php echo $row['happy_code']; ?></td>
                                                <td>
                                                    <?php
                                                    if (!(($row['status'] == 'confirmed') || ($row['status'] == 'cancelled'))) {
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
                                    }else {
                                        echo "<tr rowspan = '6'><td>No orders found.</td></tr>";
                                        
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