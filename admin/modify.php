<?php require("./components/header.php");
$sid = isset($_GET['sid']) ? $_GET['sid'] : false;
if ($sid) {
    $src = "SELECT * FROM services WHERE sid=$sid";
    $rs = mysqli_query($conn, $src);
    $rec = mysqli_fetch_assoc($rs);
} else {
    $rec = ['sname' => '', 'sduration' => '', 'sprice' => '', 'sdiscount' => '', 'sdes' => '', 'sfeatures' => ''];
}
?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Add New Category</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="order-md-1 container">
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Service Name </label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $rec['sname'] ?>" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <!-- <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Duration</label>
                        <input type="text" class="form-control" id="lastName" placeholder="hrs" value="<?php echo $rec['sduration'] ?>" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address">Price</label>
                        <input type="number" class="form-control" id="address" placeholder="price" required="" value="<?php echo $rec['sprice'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address2">Discount<span class="text-muted">(Optional)</span></label>
                        <input type="number" class="form-control" id="address2" placeholder="" value="<?php echo $rec['sdiscount'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="description" placeholder="Write a short description" required="" value="<?php echo $rec['sdes'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="features">Featurs</label>
                    <input type="text" class="form-control" id="features" placeholder="write featurs separeted with ," value="
                    <?php $text = trim($rec['sfeatures'], " ");
                    echo $text; ?>
                    ">
                </div>
                <?php
                if ($sid) { ?>
                    <button class="btn btn-primary btn-lg btn-block" name="update">Update Service</button>
                <?php
                } else { ?>
                    <button class="btn btn-primary btn-lg btn-block" name="add">Add Service</button>
                <?php } ?>
            </form>
        </div>
    </div>
</main>
<?php require('./components/footer.php') ?>