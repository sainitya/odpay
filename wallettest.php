<?php
// connect to database
$dbh = mysql_connect("localhost", "root", "", "odpay") or die("Cannot connect");
// turn off auto-commit

// look for a transfer
if ($_POST['submit'] && is_numeric($_POST['amt'])) {
    // add $$ to target account
    $result = mysql_query($dbh, "UPDATE accounts SET balance = balance + " . $_POST['amt'] . " WHERE id = " . $_POST['to']);
    if ($result !== TRUE) {
        mysql_rollback($dbh);  // if error, roll back transaction
    }
    
    // subtract $$ from source account
    $result = mysql_query($dbh, "UPDATE accounts SET balance = balance - " . $_POST['amt'] . " WHERE id = " . $_POST['from']);
    if ($result !== TRUE) {
        mysql_rollback($dbh);  // if error, roll back transaction
    }

    // assuming no errors, commit transaction
    mysql_commit($dbh);
}

// get account balances
// save in array, use to generate form
$result = mysql_query("SELECT * FROM accounts",$dbh);   
while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
    $accounts[] = $row;
}

// close connection
mysql_close($dbh);
?>

<html>
<head></head>
<body>

<h3>TRANSFER</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Transfer $ <input type="text" name="amt" size="5"> from

<select name="from">
<?php
foreach ($accounts as $a) {
    echo "<option value=\"" . $a['id'] . "\">" . $a['label'] . "</option>";    
}
?>
</select>

to

<select name="to">
<?php
foreach ($accounts as $a) {
    echo "<option value=\"" . $a['id'] . "\">" . $a['label'] . "</option>";    
}
?>
</select>

<input type="submit" name="submit" value="Transfer">

</form>

<h3>ACCOUNT BALANCES</h3>
<table border=1>
<?php
//foreach (@$accounts as $a) {
  //  echo "<tr><td>" . $a['label'] . "</td><td>" . $a['balance'] . "</td></tr>";    

?>
</table>
</body>
</html>