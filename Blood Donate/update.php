<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "blood_donate";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connect to the database failed due to " . mysqli_connect_error());
}


if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    header("location:updateDonarForm.php");
}

?>