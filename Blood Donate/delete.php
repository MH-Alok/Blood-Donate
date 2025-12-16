<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "blood_donate";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connect to the database failed due to " . mysqli_connect_error());
}

// delete for donar list
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `donar list` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        // echo "Deleted Successfully";
        header('location:admin_dashboard.php');
    } else {
        die(mysqli_error($con));
    }
}

// delete for patient list
if (isset($_GET['deletename'])) {
    $name = $_GET['deletename'];

    $sql = "DELETE FROM `patient list` WHERE name = '$name'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Deleted Successfully";
        header('location:admin_dashboard.php');
    } else {
        die(mysqli_error($con));
    }
}

$con->close();

?>