
<?php  

require "configdb.php";
	
$email = $_POST["email"];
$password = $_POST["password"]; 


$sql = "SELECT * FROM signup where email='".$email."'  and password= ('".$password."');";

$result = mysqli_query($conn,$sql);
 
$response = array();  
if(mysqli_num_rows($result)>0)
	

	{
		
		$row = mysqli_fetch_row($result);
		 $name = $row[0];
		 $contact = $row[3];
		 $message = "OK";
	    //session_start();
		//echo' welcome';
		//echo'  &nbsp';
		//echo   $_SESSION['user_name']=$user_name;
		//echo '<script language="javascript">';
		//echo 'alert("welcome $_SESSION[''] $user_name")';
		//echo '</script>';
		array_push($response,array("message"=>$message));//"name"=>$name,"contact"=>$contact));
		echo json_encode($response);
		echo '<br>';
		echo '<a href="login.html" onClick="history.go(-1);return true;">Send Me Back A Page!</a>';
	}
	
	
	else
	{
		
		$message ="FAIL";
		
		array_push($response,array("message"=>$message));
		echo json_encode($response);
	}
	
	mysqli_close($conn);

?>