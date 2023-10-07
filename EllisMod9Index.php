<!-- pj ellis - CSD440 - Module 9 Index page - 9/20/2023
For this assignment the database you will use is the one created in Module 8. 
Using MySQLi, write PHP programs (3 files) that provide:
Index page with links to all following PHPs
Query page to search based on user form input
Form page for adding a record
Include all files from Module 8. -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pj Ellis's Module 9 Index Page</title>
        <!-- link to CSS -->
        <link href="site.css" type="text/css" rel="stylesheet" >

        <!-- link to google font kit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="container">
        <h1>Ellis Module 9 Index</h1>
        <h3>Module Assignments</h3>
        <!-- Unordered list -->
        <ul>
            <li>Module 8 - SQL</a></li>
                <ul>
                    <li><a href="PjDropTable.php">Drop Table</a></li>
                    <li><a href="PjCreateTable.php">Create Table</a></li>
                    <li><a href="PjPopulateTable.php">Populate Table</a></li>
                    <li><a href="PjQueryTable.php">Query Table</a></li>
                </ul>
            <li>Module 9 - More SQL</li>
                <ul>
                    <li><a href="PjQuery.php">Search Shows</a></li>
                    <li><a href="PjForms.php">Add Shows</a></li>
                </ul>
        </ul>        
        <br/>
        <a href="index.html">Back to Main Index</a>
        </div>
</body>
</html>