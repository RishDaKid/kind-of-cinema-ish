<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$select = "SELECT * FROM films";
$selectres = mysqli_query($conn, $select);

if(isset($_POST['submit'])){
	 $name = $_POST['name'];
    $date = $_POST['date'];
    $movie = $_POST['movie'];

  
    $insert = "INSERT INTO `reservation`(`name`, `date`, `movie`)
     VALUES ('$name','$date','$movie')";
     mysqli_query($conn,$insert); 
 }
    
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
   <form role="form"  enctype="multipart/form-data"  method="post" action="<?php  $_SERVER['PHP_SELF'];  ?>">
 <label for="Name">Name</label>
   <input type="text" class="form-control" id="name" name="name" required>
<br><bR>
<label for="Movie">Movie</label>
                <select class="form-control" id="movie" name="movie" required>
                  <option value="">None</option>
                <?php while($row = mysqli_fetch_array($selectres)){ ?>
              
                  <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option> 

                <?php } ?>
                </select>
<br><br>
 				<label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" required>
<br><br>

                  <button type="submit" class="btn btn-primary" name="submit">Book</button>
              </form>