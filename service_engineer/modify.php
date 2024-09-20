<?php require("./components/header.php");
$seID = isset($_SESSION['se_info']['pid']) ? $_SESSION['se_info']['pid'] : 0;
$seCategoryID = isset($_SESSION['se_info']['provider_category_id']) ? $_SESSION['se_info']['provider_category_id'] : 0;
if ($seID) {
    $src = "SELECT * FROM services WHERE created_by=$seID";
    $rs = mysqli_query($conn, $src);
    $rec = mysqli_fetch_assoc($rs);
} else {
    $rec = ['sname' => '', 'scategory' => '', 'sduration' => '', 'sprice' => '', 'sdiscount' => '', 'sdes' => '', 'sfeatures' => ''];
}

// image upload

$simage = "";
function upload_image()
{
    // The file path that includes the directory and the original file name
    $targetDir = "../assets/images/services/";
    $dataDir = "assets/images/services/" . basename($_FILES["simage"]["name"]);
    $targetFile = $targetDir . basename($_FILES["simage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $uploadOk = 1;
    $check = getimagesize($_FILES["simage"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["simage"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    //     // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES["simage"]["tmp_name"], $targetFile)) {
            global $simage;
            $simage = $dataDir;
        }
    }
}

if (isset($_POST['add'])) {
    $sname = $_POST['sname'];
    $scategory = $_POST['scategory'];
    $sduration = $_POST['sduration'];
    $sprice = $_POST['sprice'];
    $sdiscount = $_POST['sdiscount'];
    $sdes = $_POST['sdes'];
    $sfeatures = $_POST['sfeatures'];
    upload_image();
    $sql = "INSERT INTO services (sname, sprice, sduration, sdes, sfeatures, scategory, simage, sdiscount,created_by) 
            VALUES ('$sname', '$sprice', '$sduration', '$sdes', '$sfeatures', '$scategory', '$simage', '$sdiscount','1')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Service Added Successfully')</script>";
    } else {
        echo "<script>alert('Error Adding Service')</script>";
    }
}
if (isset($_POST['update'])) {
    $sname = $_POST['sname'];
    $scategory = $_POST['scategory'];
    $sduration = $_POST['sduration'];
    $sprice = $_POST['sprice'];
    $sdiscount = $_POST['sdiscount'];
    $sdes = $_POST['sdes'];
    $sfeatures = $_POST['sfeatures'];
    upload_image();
    $sql = "UPDATE services SET sname='$sname', scategory = '$scategory', sduration='$sduration', sprice='$sprice', sdiscount='$sdiscount', sdes='$sdes', sfeatures='$sfeatures', simage = '$simage' WHERE created_by=$seID";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Service Updated Successfully')</script>";
    } else {
        echo "<script>alert('Error Updating Service')</script>";
    }
}



?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <h2 class="mt-4">My Service</h2>
        <div class="order-md-1 container">
            <form class="needs-validation" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Service Name </label>
                        <input type="text" class="form-control" id="firstName" placeholder="" name="sname" value="<?php echo $rec['sname'] ?>" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                        <select class="form-select" id="scategory" name="scategory">
                            <?php
                            if (isset($rec['scategory'])) {
                                $cid = $rec['scategory'];
                                $sql2 = "SELECT * FROM category where cid = $cid";
                                $result2 = $conn->query($sql2);
                                $row2 = $result2->fetch_assoc();
                                echo "<option selected value='" . $row2['cid'] . "'>" . $row2['cname'] . "</option>";
                            }
                            $sql = "SELECT * FROM category";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($rec['scategory'] == $row['cid']) {
                                        continue;
                                    }
                                    echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
                                }
                            } else {
                                echo "<option>No sub-categories found</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Duration</label>
                        <input type="text" class="form-control" id="lastName" placeholder="hrs" name="sduration" value="<?php echo $rec['sduration'] ?>" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address">Price</label>
                        <input type="number" class="form-control" id="address" placeholder="price" required="" name="sprice" value="<?php echo $rec['sprice'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address2">Discount<span class="text-muted">(Optional)</span></label>
                        <input type="number" class="form-control" id="address2" placeholder="" name="sdiscount" value="<?php echo $rec['sdiscount'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="description" placeholder="Write a short description" required="" name="sdes" value="<?php echo $rec['sdes'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="features">Featurs</label>
                    <input type="text" class="form-control" id="features" placeholder="write featurs separeted with ," name="sfeatures" value="<?php echo $rec['sfeatures']; ?>">
                    <!-- $rec['sfeatures'] -->
                </div>
                <div class="mb-3">
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <!-- <input type="file" class="custom-file-input form-control" id="customFile"> -->
                        <input type="file" class="form-control" id="simage" name="simage" accept="image/*" required>
                    </div>
                </div>
                <?php
                if ($seCategoryID != 0) { ?>
                    <button class="btn btn-primary btn-lg btn-block" name="update">Update Service</button>
                <?php
                } else { ?>
                    <button class="btn btn-primary btn-lg btn-block" name="add">Add Service</button>
                <?php }
                ?>
            </form>
        </div>
    </div>
</main>
<?php require('./components/footer.php') ?>