<?php
 header("Access-Control-Allow-Origin: *");

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$dbname = "dcast";

$num = 3;
if (isset($_GET['num'])) {
    $num = $_GET['num']; 
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

$sql = "SELECT * FROM PubGene limit " . $num;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
} else {
    echo "0 results";
}
$conn->close();
?>

