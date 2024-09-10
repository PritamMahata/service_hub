<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "service_hub";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['execute_sql'])) {
    $sql = "DROP DATABASE service_hub;";
    $result = $conn->query($sql);
    if ($result) {
        echo "Database dropped successfully!<br>";
    } else {
        echo "Error dropping database: " . $conn->error;
    }
    $sql = "CREATE DATABASE service_hub;";
    $result = $conn->query($sql);
    if ($result) {
        echo "Database CREATEd successfully!<br>";
    } else {
        echo "Error CREATEd database: " . $conn->error;
    }
}
if (isset($_POST['add_data'])) {
    $sql = file_get_contents('service_hub.sql');
    if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
        echo "Data added successfully!<br>";
    } else {
        echo "Error executing SQL: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run SQL</title>
</head>

<body>
    <form method="post">
        <button type="submit" name="execute_sql">Delete database</button>
        <button type="submit" name="add_data">Add Data</button>
    </form>
</body>

</html>