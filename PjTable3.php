<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 8/23/2023 - CSD440 - Module 3
    Starting with the PHP table created in Module 2, 
    write a function that will be used to generate the value to be displayed in each cell. 
    The function will take two random numbers as the parameters and will then return the sum. 
    The function is to be placed in an external file
    -->

    <head>
        <title>Module 3 - PJs Table</title>

        <?php
        require('PjTable3Function.php');
        ?>
</head>
<body>
    <h1>Module 3</h1>
    <h3>Function to create data to fill an HTML Table</h3>
    <table border='1' width='500'>
        <caption>
        HTML Table of the Sum of Two Random Numbers from 1 to 99
        </caption>
        <?php 
        #for loop to enter data for each row
        for($row = 0; $row < 10; ++$row) { 
            ?>
            <tr>
            <?php 
            #nested for loop to enter data into each column
            for($col = 0; $col < 10; ++$col) { 
                ?>
                <td>
                <?php 
                $rand1 = (rand(1,99));
                $rand2 = (rand(1,99));
                #calling function to generate the sum of two random numbers to have entered into the table 
                echo(addRand($rand1, $rand2));                 
                ?>
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