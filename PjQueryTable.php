<!-- Pj Ellis - CSD440 - Module 8 - 09/15/2023 
Using MySQLi, write PHP programs (4 total) to create and populate a DB table to be used in Module 9. You will need PHP scripts to:
Create your table, Drop your table, Populate your table, and Query to test your table-->

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Module 8 - MySQLi Query Table</title>
</head>

<body>
    <h1>Module 8</h1>
    <h3>Query Table with MySQLi</h3>
    <h1>Broadway Shows</h1>
    <table border="1">
        <tr>
            <th>ShowID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>OpeningDate</th>
            <th>BoxOfficeRevenue</th>
            <th>StillRunning</th>
        </tr>
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

    // SQL query to retrieve data from the table
    $sql = "SELECT * FROM BroadwayShows";

    // Execute the query
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ShowID"] . "</td>";
            echo "<td>" . $row["Title"] . "</td>";
            echo "<td>" . $row["Genre"] . "</td>";
            echo "<td>" . $row["OpeningDate"] . "</td>";
            // Format BoxOfficeRevenue with dollar sign and commas
            echo "<td>$" . number_format($row["BoxOfficeRevenue"], 2) . "</td>";
            echo "<td>" . ($row["StillRunning"] ? "Yes" : "No") . "</td>";
            echo "</tr>";
        }    
    } else {
        echo "No records found.";
    }

    // Close the connection
    $connection->close();
    ?>    
    </table>
    <br/>
    <a href="EllisMod9index.php">Back to Home</a>
</body>
</html>
