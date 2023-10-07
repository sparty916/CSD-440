<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 8/13/2023 - CSD440 - Module 2
    A program that creates an HTML table using a PHP nested loop structure
    -->

    <head>
        <title>Module 2 - PJs Table</title>
</head>
<body>
    <h1>Module 2</h1>
    <h3>HTML Table of Random Numbers created using a PHP nested loop</h3>
    <table border='1' width='400'>
        <caption>
        HTML Table of Random Numbers from 1 to 99
        </caption>
        <?php 
        for($row = 0; $row < 10; ++$row) { #for loop to enter data for each row
            ?>
            <tr>
            <?php 
            for($col = 0; $col < 10; ++$col) { #nested for loop to enter data into each column
                ?>
                <td>
                <?php echo(rand(1, 99)); #generating a random number to have entered into the table ?>
                </td>
            <?php 
            } #close nested for loop
            ?>
            </tr>
        <?php 
        } #close for loop
        ?>
    </table>
</body>
</html>