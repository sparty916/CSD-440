<!-- pj ellis - CSD440 - Module 9 Form page - 9/20/2023 -->
<!-- Form page for adding a record -->

<!DOCTYPE html>
<html>
<head>
    <title>Add a Broadway Show</title>
</head>
<body>
    <h1>Add a Broadway Show</h1>
    <form action="PjForms_Add_Show.php" method="POST">
        <?php
        // Check if there is an error message in the URL query parameters
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            echo "<p style='color: red;'>Error: $errorMessage</p>";
        }
        ?>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"><br><br>
        
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre"><br><br>
        
        <label for="openingDate">Opening Date:</label>
        <input type="text" id="openingDate" name="openingDate" placeholder="YYYY-MM-DD"><br><br>
        
        <label for="boxOfficeRevenue">Box Office Revenue:</label>
        <input type="text" id="boxOfficeRevenue" name="boxOfficeRevenue" placeholder="$0.00"><br><br>
        
        <label for="stillRunning">Still Running:</label>
        <input type="checkbox" id="stillRunning" name="stillRunning" value="1"><br><br>
        
        <input type="submit" value="Add Show">
    </form>
    <br/>
    <a href="EllisMod9index.php">Back to Home</a>
</body>
</html>