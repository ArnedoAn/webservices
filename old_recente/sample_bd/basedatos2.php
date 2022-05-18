<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "pa_usta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, data_string, timestamp FROM data3 limit 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - 
              Data: " . $row["data_string"]. " 
              " . $row["timestamp"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>