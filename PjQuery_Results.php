<!-- pj ellis - CSD440 - Module 9 Query Result page - 9/20/2023 -->

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

// Retrieve user input from the form
$select = $_GET["select"];

// SQL query to search for Broadway shows based on user input
$sql = "SELECT * FROM BroadwayShows WHERE Genre LIKE '%$select%'";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ShowID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Genre"] . "</td>";
                echo "<td>" . $row["OpeningDate"] . "</td>";
                echo "<td>$" . number_format($row["BoxOfficeRevenue"], 2) . "</td>";
                echo "<td>" . ($row["StillRunning"] ? "Yes" : "No") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found.</td></tr>";
        }
        // Close the connection
        $connection->close();
        ?>

    </table>

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
    <br/>
    <a href="PjForms.php">Add Shows</a>
    <br><br>
    <a href="EllisMod9index.php">Back to Home</a>
</body>
</html>