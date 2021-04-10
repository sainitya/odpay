<?php  
//if(isset($_POST['submit'])
require "configdb.php";
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$contact=$_POST["contact"];
$odpin=$_POST["odpin"];

 
$sql = "select * from testing where email like '".$email."';";
$result = mysql_query($sql,$conn);
$response = array();


if(mysql_num_rows($result)>0)
{
	
	$message = "FAIL";
	array_push($response, array("message"=>$message));
	 print_r(json_encode($response));

}
else
{
	$sql = "insert into testing values ('".$name."','".$email."',MD5('".$password."'), '".$contact."', MD5('".$odpin."'));";
	$result = mysql_query($sql,$conn);
	$message = "OK";
	array_push($response, array("message"=>$message));
	 print_r(json_encode($response));
}
 
mysql_close($conn);

?>