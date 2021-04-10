<?php
include'configdp.php'
// Connect to server

// Select the database


// Get the login credentials from user

$username = $_POST['username'];
$userpassword = $_POST['password'];

// Secure the credentials

$username = mysql_real_escape_string($_POST['username']);
$userpassword = mysql_real_escape_string($_POST['password']);

// Check the users input against the DB.

$query = "SELECT * FROM testing WHERE user = '$username' AND password = '$userpassword'";
$result = mysql_query($query) or die("Unable to verify user because " . mysql_error());
$row = mysql_fetch_assoc($result);

if ($row['total'] == 1) {

    // success

    $response["success"] = 1;

    // echoing JSON response

    echo json_encode($response);
}
else {

    // username and password not found
    // failed

    $response["failed"] = 1;

    // echoing JSON response

    echo json_encode($response);
}

?>
