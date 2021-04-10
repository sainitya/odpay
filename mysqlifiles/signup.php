<?php  
//if(isset($_POST['submit'])
require "configdb.php";
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$contact=$_POST["contact"];
$odpin=$_POST["odpin"];

 
$sql = "select * from signup where email like '".$email."';";
$result = mysqli_query($conn,$sql);
$response = array();


if(mysqli_num_rows($result)>0)
{
	
	$message = "FAIL";
	array_push($response, array("message"=>$message));
	 print_r(json_encode($response));

}
else
{
	$sql = "insert into signup values ('".$name."','".$email."',('".$password."'), '".$contact."', ('".$odpin."'));";
	$result = mysqli_query($conn,$sql);
	$message = "OK";
	array_push($response, array("message"=>$message));
	 print_r(json_encode($response));
}
 
mysqli_close($conn);

?>