<?php
// Start the session so we can store data across pages
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Processing Results</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php

    // Step 1: Retrieve each submitted value using $_POST
    $name       = $_POST['name'] ?? '';
    $email      = $_POST['email'] ?? '';
    $year_level = $_POST['year_level'] ?? '';

    // Step 2: Check that required fields are not empty
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($year_level)) {
        $errors[] = "Year level is required.";
    }

    // If there are validation errors, display them and stop
    if (!empty($errors)) {
        echo "<h1>There were some problems with your submission:</h1>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo '<p><a href="form.html">Go back and try again</a></p>';
        echo '</body></html>';
        exit; // stop the script here so we don't process incomplete data
    }

    // Step 3: Store the submitted values into a PHP array (associative)
    $submittedData = [
        "name"       => $name,
        "email"      => $email,
        "year_level" => $year_level
    ];

    // Step 4: Use a foreach loop to display the contents of that array
    echo "<h1>Thank you, " . htmlspecialchars($name) . "!</h1>";
    echo "<h2>Here is what you submitted:</h2>";
    echo "<ul>";
    foreach ($submittedData as $field => $value) {
        echo "<li><strong>" . htmlspecialchars($field) . ":</strong> " . htmlspecialchars($value) . "</li>";
    }
    echo "</ul>";

    // Step 5: Store the submitted values in $_SESSION
    $_SESSION['name']       = $name;
    $_SESSION['email']      = $email;
    $_SESSION['year_level'] = $year_level;

    echo '<p><a href="welcome.php">Continue to the next page</a></p>';
    ?>
</body>

</html>