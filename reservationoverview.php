<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
?>

<!DOCTYPE html>
<html>
    <head>
        <title>RishFlix</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="reservation.php">Reservation</a></li>
   <li><a href="reservationoverview.php">Reservation overview</a></li>
</ul><br><BR>
<div class="center">
<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, date,movie FROM reservation order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br>Name: " . $row["name"]. " <br>Movie: " . $row["movie"]."<br>datum: " . $row["date"]
        ."<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
</div>