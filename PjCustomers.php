<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 8/30/2023 - CSD440 - Module 5
    Write a program that creates and displays an array of customers (minimum of 10 customers) 
    that includes their first name, last name, age, and phone number.
    Then, using array methods, find several records and display the customer information 
    based on different data fields.
    -->
<head>
    <title>Module 5 - Array</title>
</head>
<body>
    <h1>Module 5</h1>
    <h2>Create and Display an array of customers</h2>

    <?php
    $customers = array(
        array("first_name"=>"Pj", "last_name"=>"Ellis", "age"=>44, "phone_number"=>"4074327996"),
        array("first_name"=>"Mark", "last_name"=>"Wagner", "age"=>34, "phone_number"=>"5551234567"),
        array("first_name"=>"Courtney", "last_name"=>"Porter", "age"=>32, "phone_number"=>"5557894561"),
        array("first_name"=>"Josh", "last_name"=>"Frasier", "age"=>37, "phone_number"=>"5551597532"),
        array("first_name"=>"Liz", "last_name"=>"Duran", "age"=>48, "phone_number"=>"5551593716"),
        array("first_name"=>"David", "last_name"=>"Landry", "age"=>42, "phone_number"=>"5551472365"),
        array("first_name"=>"Travis", "last_name"=>"Thompson", "age"=>40, "phone_number"=>"5559631478"),
        array("first_name"=>"Nydia", "last_name"=>"Potter", "age"=>38, "phone_number"=>"5557894025"),
        array("first_name"=>"Daquin", "last_name"=>"Llyod", "age"=>32, "phone_number"=>"5553214856"),
        array("first_name"=>"Cece", "last_name"=>"Moore", "age"=>24, "phone_number"=>"5554569173")
    );
    ?>
    <hr>
    <?php
    // Display all customer records
    echo "<h3><b>All Customers:</b></h3>";
    foreach ($customers as $customer) {
        echo "<b>First Name: </b>".$customer["first_name"]." <b>Last Name: </b>".$customer["last_name"].
        " <b>Age: </b>".$customer["age"]." <b>Phone Number: </b>".$customer["phone_number"]."<br>";
    }
    ?>
    <hr>
    <?php
    //array_keys() demo
    echo "<p><b>Use array_keys() to find the keys of array \$customer:</b></p>";
    print_r(array_keys($customer));
    echo "<br><br>";
    ?>
    <hr>
    <?php
    // Sort the customers array by age in ascending order
    echo "<p><b>Customers sorted by Age (ascending):</b></p>";

    // Create an array to store the ages of customers for sorting
    $ages = array_column($customers, "age");

    // Sort the $customers array in descending order of age while maintaining the association
    asort($ages);

    // Create a new array to store sorted customers
    $sortedCustomers = [];

    foreach ($ages as $key => $age) {
        $sortedCustomers[] = $customers[$key];
    }

    foreach ($sortedCustomers as $customer) {
        echo " <b>Age: " . $customer["age"] . "</b> -- " . $customer["first_name"] . " " . $customer["last_name"] ."<br>";        
    }
    ?>
    <hr>
    <?php
    // Sort the customers array by age in descending order
    echo "<p><b>Customers sorted by Age (descending):</b></p>";

    // Create an array to store the ages of customers for sorting
    $ages = array_column($customers, "age");

    // Sort the $customers array in descending order of age while maintaining the association
    arsort($ages);

    // Create a new array to store sorted customers
    $sortedCustomers = [];

    foreach ($ages as $key => $age) {
        $sortedCustomers[] = $customers[$key];
    }

    foreach ($sortedCustomers as $customer) {
        echo " <b>Age: " . $customer["age"] . "</b> -- " . $customer["first_name"] . " " . $customer["last_name"] ."<br>";
    }
    ?>
    <hr>
    <?php
    //use array_filter() to filter customers based on age
    //and then displays the filtered results using foreach loops.
    echo "<p><b>Customers with Age less than 40 and sorted (ascending):</b></p>";
    $filteredByAge = array_filter($customers, function ($customer) {
        return $customer["age"] < 40;
    });
    asort($filteredByAge);

    foreach ($filteredByAge as $customer) {
        echo "<b>Age: " . $customer["age"] . "</b> -- " . $customer["first_name"] . " " . $customer["last_name"] . "<br>";
    }
    ?>
    <hr>
    <?php
    // Sort the customers array by last name in ascending order
    echo "<p><b>Customers sorted by Last Name (ascending):</b></p>";

    usort($customers, function ($a, $b) {
        return strcmp($a["last_name"], $b["last_name"]);
    });

    foreach ($customers as $customer) {
        echo $customer["first_name"] . " <b>" . $customer["last_name"] . "</b><br>";
    }
    ?>
    <hr>
    <?php
    // Sort the customers array by last name in descending order
    echo "<p><b>Customers sorted by Last Name (descending):</b></p>";

    usort($customers, function ($a, $b) {
        return strcmp($b["last_name"], $a["last_name"]);
    });

    foreach ($customers as $customer) {
        echo $customer["first_name"] . " <b>" . $customer["last_name"] . "</b><br>";
    }
    ?>
    <hr>
    <?php
    //Display customers whose first name starts with D
    echo "<p><b>Customers with First Name starting with 'D':</b></p>";

    foreach ($customers as $customer) {
        if (strtoupper(substr($customer["first_name"], 0, 1)) === "D") {
            echo "<b>" . $customer["first_name"] . "</b> " . $customer["last_name"] . "<br>";
        }
    }
    ?>
    <hr>
    <?php
    //Display customers whose last name starts with P
    echo "<p><b>Customers with Last Name starting with 'P':</b></p>";

    foreach ($customers as $customer) {
        if (strtoupper(substr($customer["last_name"], 0, 1)) === "P") {
            echo $customer["first_name"] . " <b>" . $customer["last_name"] . "</b><br>";
        }
    }
    ?>
</body>
</html>