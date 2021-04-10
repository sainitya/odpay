
<?php  

require "configdb.php";
	
$user_name = $_POST["user_name"];
$password = $_POST["password"]; 


$sql = "SELECT name,email FROM testing where user_name='".$user_name."' and password=MD5 ('".$password."');";

$result = mysqli_query($conn,$sql);
 
$response = array();  
if(mysqli_num_rows($result)>0)
	

	{
		
		$row = mysqli_fetch_row($result);
		 $name = $row[0];
		 $email = $row[1];
		 $code = "login success";
	    //session_start();
		//echo' welcome';
		//echo'  &nbsp';
		//echo   $_SESSION['user_name']=$user_name;
		//echo '<script language="javascript">';
		//echo 'alert("welcome $_SESSION[''] $user_name")';
		//echo '</script>';
		array_push($response,array("code"=>$code,"name"=>$name,"email"=>$email));
		echo json_encode($response);
		echo '<br>';
		echo '<a href="login.html" onClick="history.go(-1);return true;">Send Me Back A Page!</a>';
	}
	
	
	else
	{
		
		$code ="login_failed";
		$message = "user not found";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	
	mysqli_close($conn);

?>