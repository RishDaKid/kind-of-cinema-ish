<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RishFlix</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
                <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="reservation.php">Reservation</a></li>
    <li><a href="reservationoverview.php">Reservation overview</a></li>
</ul><br><BR>
    <?php  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM films where id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Name: ". $row["name"]. " <br><br> Genre: ". $row["genre"]. "<br><br>Year: " . $row["year"] . "<br><br><br> " . $row["link"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>﻿
<br>
<a href="reservation.php" class="button">Reservation</a>
</html>