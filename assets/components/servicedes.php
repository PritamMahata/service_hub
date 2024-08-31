<?php
include './env/config.php';
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $services = array();
    while($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

?>