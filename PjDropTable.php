<!-- Pj Ellis - CSD440 - Module 8 - 09/15/2023 
Using MySQLi, write PHP programs (4 total) to create and populate a DB table to be used in Module 9. You will need PHP scripts to:
Create your table, Drop your table, Populate your table, and Query to test your table-->

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Module 8 - MySQLi Drop Table</title>
</head>
<body>
    <h1>Module 8</h1>
    <h3>Drop Table with MySQLi</h3>
        
    <?php
    $host = 'localhost';
    $user = 'student1';
    $password = 'pass';
    $database = 'baseball_01';

    // Create a connection to the database
    $connection = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // SQL query to drop the table
    $sql = "DROP TABLE BroadwayShows";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        echo "Table 'BroadwayShows' dropped successfully.";
    } else {
        echo "Error dropping table: " . $connection->error;
    }

    // Close the connection
    $connection->close();
    ?>
    <br/>
    <a href="PjCreateTable.php">Create Table</a>
    <br/>
    <a href="EllisMod9index.php">Back to Home</a>

</body>
</html>
