<!-- Pj Ellis - CSD440 - Module 8 - 09/15/2023 
Using MySQLi, write PHP programs (4 total) to create and populate a DB table to be used in Module 9. You will need PHP scripts to:
Create your table, Drop your table, Populate your table, and Query to test your table-->

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Module 8 - MySQLi Populate Table</title>
</head>
<body>
    <h1>Module 8</h1>
    <h3>Populate Table with MySQLi</h3>
    
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

    // SQL query to populate the table with sample data
    // UPDATED to add more data and another genre for use with Module 9
    $sql = "INSERT INTO BroadwayShows (Title, Genre, OpeningDate, BoxOfficeRevenue, StillRunning) VALUES
        ('The Phantom of the Opera', 'Musical', '1986-01-26', 680000000.00, 0),
        ('Chicago', 'Musical', '1996-11-14', 610000000.00, 1),
        ('Rent', 'Musical', '1996-04-29', 290000000.00, 0),
        ('Les Misérables', 'Musical', '1987-03-12', 602000000.00, 0),
        ('Wicked', 'Musical', '2003-10-30', 1115000000.00, 1),
        ('The Lion King', 'Musical', '1997-11-13', 1277000000.00, 0),
        ('To Kill a Mockingbird', 'Drama', '2018-12-13', 180000000.00, 1),
        ('The Glass Menagerie', 'Drama', '1944-03-31', 4500000.00, 0),
        ('Death of a Salesman', 'Drama', '1949-02-10', 9000000.00, 0),
        ('Avenue Q', 'Musical Comedy', '2003-07-31', 150000000.00, 0),
        ('The Book of Mormon', 'Musical Comedy', '2011-03-24', 650000000.00, 1),
        ('Cats', 'Musical Fantasy', '1982-10-07', 680000000.00, 0),
        ('The Crucible', 'Drama', '1953-01-22', 6600000.00, 0),
        ('The Curious Incident of the Dog in the Night-Time', 'Mystery/Thriller', '2014-10-05', 230000000.00, 0),
        ('Hamilton', 'Historical Musical', '2015-08-06', 880000000.00, 1),
        ('The Importance of Being Earnest', 'Comedy', '1895-02-14', 3500000.00, 0),
        ('Dear Evan Hansen', 'Drama', '2016-12-04', 240000000.00, 1),
        ('Jersey Boys', 'Biographical Musical', '2005-11-06', 360000000.00, 0),
        ('Matilda the Musical', 'Family/Fantasy', '2013-04-11', 300000000.00, 0),
        ('The Curious Case of Benjamin Button', 'Fantasy', '2013-02-14', 120000000.00, 0);";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        echo "Table 'BroadwayShows' populated successfully.";
    } else {
        echo "Error populating table: " . $connection->error;
    }

    // Close the connection
    $connection->close();
    ?>
    <br/>
    <a href="PjQueryTable.php">Query Table</a>
    <br/>
    <a href="EllisMod9index.php">Back to Home</a>

</body>
</html>
