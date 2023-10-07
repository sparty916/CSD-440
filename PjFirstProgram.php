<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 8/9/2023 - CSD440 - Module 1
    My first program just experimenting with an example from the textbook
    -->
    
    <head>
        <title>Module 1 - PJs First Program</title>
</head>

<body>
    <h1>Module 1</h1>
    <h3>Introduction to PHP</h3>

    <?php if(!empty($_POST['name'])) {
        echo "Welcome <b>{$_POST['name']}</b>! </br>";
        echo "This is my <i>First Program</i>! </br>";
        echo "</br>";
    } ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Please Enter Your Name: <input type="text" name="name" />
    <input type="submit" />
</form>
</body>
</html>