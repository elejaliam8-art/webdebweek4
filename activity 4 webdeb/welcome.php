<?php
// Start (or resume) the session so we can access the stored data
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <h1>Welcome Back</h1>

    <?php
    // Check if the session value exists before using it
    if (isset($_SESSION['name'])) {
        echo "<p>Hello, " . htmlspecialchars($_SESSION['name']) . "! Your data was remembered across pages using a session.</p>";
        echo "<h2>Your Stored Info:</h2>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . htmlspecialchars($_SESSION['name']) . "</li>";
        echo "<li><strong>Email:</strong> " . htmlspecialchars($_SESSION['email']) . "</li>";
        echo "<li><strong>Year Level:</strong> " . htmlspecialchars($_SESSION['year_level']) . "</li>";
        echo "</ul>";
    } else {
        echo "<p>No session data found. Please <a href='form.html'>fill out the form</a> first.</p>";
    }
    ?>

</body>

</html>