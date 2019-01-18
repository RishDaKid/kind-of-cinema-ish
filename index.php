<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `films` WHERE CONCAT( `name`, `genre`, `year`) LIKE '%".$valueToSearch. "%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `films` order by id DESC";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "movie");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
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
        <form action="index.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <table align="center" width="60%">

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><img style="width:120px;height:150px" src="<?php echo $row['picture'];?>"</td>
                    <td><h1><?php  echo "<a href='details.php?id={$row['id']}'>".$row['name']."</a>";?></td></h1>
                    <td><?php echo $row['genre'];?></td>
                    <td><?php echo $row['year'];?></td>           
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
