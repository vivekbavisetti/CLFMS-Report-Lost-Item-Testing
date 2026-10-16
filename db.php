

<?php
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$username = "root";
$password = "";
$database = "clfms";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_errno) {
    error_log("CLFMS database connection failed: " . $conn->connect_error);
    die("Unable to connect to the database. Please check the configuration.");
}

$conn->set_charset("utf8mb4");
?>

