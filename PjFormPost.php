<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 9/6/2023 - CSD440 - Module 7
    Return display of the data entered in a well formatted page, 
    otherwise a return of errors display to report the problem.
    -->
<head>
    <title>Module 7 - Form Submission</title>
</head>
<body>
    <h1>Form Submission Results</h1>

    <?php
    // Initialize an array to store validation errors
    $errors = [];

    // Function to sanitize and validate input data
    function validateInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and store each form field
        $name = validateInput($_POST["name"]);
        $phone = validateInput($_POST["phone"]);
        $email = validateInput($_POST["email"]);
        $password = validateInput($_POST["pword"]);
        $ageRange = validateInput($_POST["ageRange"]);
        $pronoun = validateInput($_POST["pronoun"]);
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
        $comments = validateInput($_POST["comments"]);

        // Validate Name
        if (empty($name)) {
            $errors[] = "Name is required.";
        }

        // Validate Phone
        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        }

        // Validate Email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is required and must be a valid email address.";
        }

        // Validate Password
        if (empty($password)) {
            $errors[] = "Password is required.";
        }        

        // Check if there are any validation errors
        if (empty($errors)) {
            // If no errors, display the submitted data
            echo "<h2>Form Data:</h2>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Password:</strong> $password</p>";
            echo "<p><strong>Age Range:</strong> $ageRange</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Gender:</strong> $pronoun</p>";
            if (!empty($hobbies)) {
                echo "<p><strong>Hobbies:</strong> " . implode(", ", $hobbies) . "</p>";
            } else {
                echo "<p><strong>Hobbies:</strong> None selected</p>";
            }
            echo "<p><strong>Comments:</strong><br>$comments</p>";
            echo "<a href='PjForm.html'>Return to Empty Form</a>";
        }else {
            ?>
            <h2>You have a Few Errors</h2>
            <h3>Enter Your Information:</h3>
            <?php
            // Display errors if they exist
                if (!empty($errors)) {
                    echo "<div style='color: red;'><strong>Error(s):</strong><ul>";
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul></div>";
                }
                ?>
                <form action='PjFormPost.php' method='post'>
                    <label>
                        Name:            
                    </label><br>
                    <input type="text" name="name" value="<?php echo $name; ?>"><br>
                    <label>
                        Phone:
                    </label><br>
                    <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
                    <label>
                        Email:
                    </label><br>
                    <input type="text" name="email" value="<?php echo $email; ?>"><br>                    
                    <label>
                        Password:
                    </label><br>
                    <input type="password" name="pword" value="<?php echo $password; ?>"><br>
                    <label>
                        Age Range:
                    </lable><br>
                    <select name="ageRange">
                        <option value="Prefer Not To Answer" <?php if ($ageRange === "Prefer Not To Answer") echo "selected"; ?>>Prefer Not To Answer</option>
                        <option value="0-18" <?php if ($ageRange === "0-18") echo "selected"; ?>>0-18</option>
                        <option value="19-29" <?php if ($ageRange === "19-29") echo "selected"; ?>>19-29</option>
                        <option value="30-50" <?php if ($ageRange === "30-50") echo "selected"; ?>>30-50</option>
                        <option value="51 and over" <?php if ($ageRange === "51 and over") echo "selected"; ?>>51 and over</option>
                    </select><br>                    
                    <lable>
                        Pronouns:
                    </label><br>
                    <input type="radio" name="pronoun" value="He/Him" <?php if ($pronoun === "He/Him") echo "checked"; ?>> He/Him
                    <input type="radio" name="pronoun" value="She/Her" <?php if ($pronoun === "She/Her") echo "checked"; ?>> She/Her
                    <input type="radio" name="pronoun" value="They/Them"> <?php if ($pronoun === "They/Them") echo "checked"; ?>> They/Them
                    <input type="radio" name="pronoun" value="Prefer Not To Answer"> <?php if ($pronoun === "Prefer Not To Answer") echo "checked"; ?>> Prefer Not To Answer<br>
                    <label>
                        Hobbies:
                    </label><br>
                    <input type="checkbox" name="hobbies[]" id="1" value="Eating" <?php if (in_array("Eating", $hobbies)) echo "checked"; ?>><label for="1">Eating</label><br>
                    <input type="checkbox" name="hobbies[]" id="2" value="Drinking" <?php if (in_array("Drinking", $hobbies)) echo "checked"; ?>><label for="2">Drinking</label><br>
                    <input type="checkbox" name="hobbies[]" id="3" value="Coding" <?php if (in_array("Coding", $hobbies)) echo "checked"; ?>><label for="3">Coding</label><br>
                    <input type="checkbox" name="hobbies[]" id="4" value="Sleeping" <?php if (in_array("Sleeping", $hobbies)) echo "checked"; ?>><label for="4">Sleeping</label><br>
                    <label>
                        Comments:
                    </label><br>
                    <textarea name="comments" rows="7" cols="25"><?php echo $comments; ?></textarea><br>
                    <input type="submit" value="Submit">
                </form>
        <?php
        }
    }
?>
</body>
</html>
