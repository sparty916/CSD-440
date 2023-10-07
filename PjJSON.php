<!-- pj ellis - CSD440 - Module 10 - 9/20/2023
    Write a form program that prompts a user to enter a minimum of 8 different 
    fields of data.
    When the form is submitted to your PHP CGI, use the function json_encode to 
    encode your data into a JSON format.
    Then, in your return, display the data in the JSON format inside a well-formatted 
    output display, otherwise you will return an error display to report the problem -->

<!DOCTYPE html>
<html>
<head>
    <title>JSON Form/Display</title>
</head>
<?php
// Initialize variables
$formData = [];
$json_data = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all 8 fields are provided
    if (
        isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["gender"]) &&
        isset($_POST["older_than_18"]) && isset($_POST["email"]) && isset($_POST["favorite_color"]) &&
        isset($_POST["favorite_number"]) && isset($_POST["favorite_movie"])
    ) {
        // Create an array to store the data
        $formData = array(
            "First Name" => $_POST["first_name"],
            "Last Name" => $_POST["last_name"],
            "Gender" => $_POST["gender"],
            "Older than 18" => ($_POST["older_than_18"] === "true") ? true : false,
            "Email" => $_POST["email"],
            "Favorite Color" => $_POST["favorite_color"],
            "Favorite Number" => $_POST["favorite_number"],
            "Favorite Movie" => $_POST["favorite_movie"],
        );

        // Encode the data into JSON format
        $json_data = json_encode($formData, JSON_PRETTY_PRINT);

    } else {
        // Error message if fields are missing
        echo "Error: All 8 fields are required.";
    }
}
?>
    <?php if (empty($json_data)): ?>
    <!-- Provide Form to be filled out for user input -->
    <h1>Enter Data</h1>
    <form action="PjJSON.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label>Older than 18:</label><br>
        <input type="radio" name="older_than_18" value="true" required> Yes
        <input type="radio" name="older_than_18" value="false" required> No<br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="favorite_color">Favorite Color:</label>
        <input type="text" name="favorite_color" required><br><br>

        <label for="favorite_number">Favorite Number:</label>
        <input type="number" name="favorite_number" required><br><br>

        <label for="favorite_movie">Favorite Movie:</label>
        <input type="text" name="favorite_movie" required><br><br>

        <input type="submit" value="Submit">
    </form>
    <?php else: ?>
    <h1>JSON Data:</h1>
    <br/>
    <h2>Display data after encoding into JSON format</h2>
    <pre><?php echo $json_data; ?></pre>
    <hr>

    <h2>JSON var_dump</h2>
    <?php
    var_dump(json_decode($json_data));
    ?>
    <hr>

    <h2>JSON Object</h2>
    <?php   
    // Decode the JSON data into a PHP object
    $jsonObject = json_decode($json_data);

    echo $jsonObject->{"First Name"}. "<br/>";
    echo $jsonObject->{"Last Name"}. "<br/>";
    echo $jsonObject->Gender. "<br/>";
    echo $jsonObject->{"Older than 18"}. "<br/>";       
    ?>
    <hr>

    <h2>JSON Array</h2>
    <?php
    // Decode the JSON data into a PHP array
    $jsonArray = json_decode($json_data, true);

    echo $jsonArray["Email"] . "<br/>";
    echo $jsonArray["Favorite Color"] . "<br/>";
    echo $jsonArray["Favorite Number"] . "<br/>";
    echo $jsonArray["Favorite Movie"] . "<br/>";
    ?>
    <hr>

    <h2>JSON Loops</h2>
    <?php    
    echo "<h3>JSON Object Loop</h3>";
    // Decode the JSON data into a PHP object
    $jsonObject2 = json_decode($json_data);

    foreach($jsonObject2 as $key => $value) {
        echo "KEY: " . $key . " => " . "VALUE: " . $value . "<br/>";
    }

    echo "<h3>JSON Array Loop</h3>";
    // Decode the JSON data into a PHP array
    $jsonArray2 = json_decode($json_data, true);

    foreach($jsonArray2 as $key => $value) {

        echo "KEY: " . $key . " => " . "VALUE: " . $value . "<br/>";
    }
    ?>
    <hr>

    <h3>JSON Object values used in a sentence</h3>
    <?php
    // Decode the JSON data into a PHP object
    $jsonObject3 = json_decode($json_data);

    // Define pronouns based on gender
    $pronouns = ($jsonObject3->Gender === "male") ? "his" : (($jsonObject3->Gender === "female") ? "her" : "their");

    // Create the output sentence
    $output_sentence = "{$jsonObject3->{"First Name"}} {$jsonObject3->{"Last Name"}} identifies as {$jsonObject3->Gender}, and can be reached at {$jsonObject3->Email},";

    if ($jsonObject3->{"Older than 18"}) {
        $output_sentence .= " {$pronouns} age is older than 18,";
    } else {
        $output_sentence .= " {$pronouns} age is not older than 18,";
    }

    $output_sentence .= " {$pronouns} favorite color is {$jsonObject3->{"Favorite Color"}}, {$jsonObject3->{"Favorite Number"}} 
    is {$pronouns} favorite number, and {$jsonObject3->{"Favorite Movie"}} is {$pronouns} favorite movie.";

    // Output the sentence
    echo $output_sentence;
    ?>
    <hr>

    <h3>JSON Array values used in a sentence</h3>
    <?php
    // Decode the JSON data into a PHP array
    $jsonArray3 = json_decode($json_data, true);

    // Define pronouns based on gender
    $pronouns = ($jsonArray3["Gender"] === "male") ? "his" : (($jsonArray3["Gender"] === "female") ? "her" : "their");

    // Create the output sentence
    $output_sentence = "{$jsonArray3["First Name"]} {$jsonArray3["Last Name"]} identifies as {$jsonArray3["Gender"]}, and can be reached at {$jsonArray3["Email"]},";

    if ($jsonArray3["Older than 18"]) {
        $output_sentence .= " {$pronouns} age is older than 18,";
    } else {
        $output_sentence .= " {$pronouns} age is not older than 18,";
    }

    $output_sentence .= " {$pronouns} favorite color is {$jsonArray3["Favorite Color"]}, {$jsonArray3["Favorite Number"]} 
    is {$pronouns} favorite number, and {$jsonArray3["Favorite Movie"]} is {$pronouns} favorite movie.";

    // Output the sentence
    echo $output_sentence;
    ?>
    <hr>
    <a href='PjJSON.php'>Go back to a blank form</a>
    <?php    
    endif; 
    ?>
</body>
</html>