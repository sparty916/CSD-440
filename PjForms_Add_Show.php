<!-- pj ellis - CSD440 - Module 9 Form Add Show page - 9/20/2023 -->
<!-- PHP for adding a record to database based on user input-->

<!DOCTYPE html>
<html>
<head>
    <title>Show Added</title>
</head>
<body>
    <h1>Added Show</h1>
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
$title = $_POST['title'];
$genre = $_POST['genre'];
$openingDate = $_POST['openingDate'];
$boxOfficeRevenue = $_POST['boxOfficeRevenue'];
$stillRunning = isset($_POST['stillRunning']) ? 1 : 0;

// SQL query to insert a new record into the BroadwayShows table
$sql = "INSERT INTO BroadwayShows (Title, Genre, OpeningDate, BoxOfficeRevenue, StillRunning)
        VALUES ('$title', '$genre', '$openingDate', '$boxOfficeRevenue', $stillRunning)";

if ($connection->query($sql) === TRUE) {
    $last_id = $connection->insert_id;
    echo "New record created successfully. ShowID is: " . $last_id;
} else {
    $errorMessage = $connection->error;
    // Redirect back to PjForms.php with the error message
    header("Location: PjForms.php?error=" . urlencode($errorMessage));
    exit; // Ensure script execution stops after redirection
}

// Close the connection
$connection->close();
?>
<br/>
<a href="PjQuery.php">Search Shows</a>
<br><br>
<a href="EllisMod9index.php">Back to Home</a>
</body>
</html>