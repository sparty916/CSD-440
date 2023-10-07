<?php
/*
pj ellis - CSD440 - Module 4 - 8/23/2023
Function Library -function to test if a word is a palindrome by comparing the string forward
and backword for equality and display the results
-File is used with PjPalindrom.php- 
*/

#function
function isPalindrome($word) {
    $wordRev=strrev($word);
    echo "Forward: {$word} </br>Backward: {$wordRev}</br>";
    if ($word == $wordRev){
        echo "{$word}: <b>IS</b> a Palindrome</br>";
    }
    else{
        echo "{$word}: Is <b>NOT</b> a Palindrome</br>";
    }
}
?>