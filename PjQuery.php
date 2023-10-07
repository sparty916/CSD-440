<!-- pj ellis - CSD440 - Module 9 Query page - 9/20/2023 -->
<!-- Query page to search based on user form input -->

<!DOCTYPE html>
<html>
<head>
    <title>Search Broadway Shows</title>
</head>
<body>
<?php
  
  $conn = new mysqli("localhost", "student1", "pass", "baseball_01");

  if ($conn->connect_error) {

    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 

  $sql = "SELECT DISTINCT Genre FROM BroadwayShows";

  $rs = mysqli_query($conn, $sql);

  if (!$rs){

    exit("Error in SQL");
  }

?>
    <h1>Search Broadway Shows</h1>
    <form action="PjQuery_Results.php" method="GET">
        <label>Pick a Genre<br/></label>

        <select name='select'>
        <?php
        if (mysqli_num_rows($rs) > 0) {

            while($row = mysqli_fetch_assoc($rs)){

                echo('<option value = "' . $row['Genre'] . '">' . $row['Genre'] . '</option>');

            }
        }   

        $conn->close();
        ?>
        </select>        
        <input type="submit" value="Search">
    </form>
    <br><br>
    <a href="EllisMod9index.php">Back to Home</a>
</body>
</html>