<?php  
//if(isset($_POST['submit'])
require "configdb.php";
$name = $_POST["name"];
$email = $_POST["email"];
$user_name = $_POST["user_name"];
$password = $_POST["password"]; 

 
$sql = "select * from testing where email like '".$email."';";
$result = mysqli_query($conn,$sql);
$response = array();


if(mysqli_num_rows($result)>0)
{
	$code = "reg_failed";
	$message = "user already exist......";
	array_push($response, array("code"=>$code,"message"=>$message));
	 print_r(json_encode($response));

}
else
{
	$sql = "insert into testing values ('".$name."','".$email."','".$user_name."',MD5('".$password."'));";
	$result = mysqli_query($conn,$sql);
	$code = "reg_success";
	$message = "Thanx for register....";
	array_push($response, array("code"=>$code,"message"=>$message));
	 print_r(json_encode($response));
}
 
mysqli_close($conn);

?>