<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 8/23/2023 - CSD440 - Module 4
    Write a program that checks to see if a string is a palindrome. 
    Include six examples in your code that displays the string in both orders, 
    three being a palindrome and three not. 
    Indicate in your display the resulting test in a function you have written 
    to test each of the six strings.
    -->

    <head>
        <title>Module 4 - Palindrome</title>

        <?php
        require('PjPalindromeFunction.php');
        ?>
</head>
<body>
    <h1>Module 4</h1>
    <h2>Palidrome Tester</h2>
    <p>List of Words to Test</p>
<ul>
    <li>NOON</li>
    <li>RACECAR</li>
    <li>TACOCAT</li>
    <li>HELLO</li>
    <li>WORLD</li>
    <li>PATRICK ELLIS</li>
</ul>
<hr>
<h3>Display of Test Results</h3>
<hr></br>
<?php
//Create an Array
$words = array("NOON", "RACECAR", "TACOCAT", "HELLO", "WORLD", "PATRICK ELLIS");

shuffle($words);

//Loop to run array thru function
foreach($words as $word) {
    isPalindrome($word);
    echo "</br>";
}
?>
<hr>
</body>
</html>
