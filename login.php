
<?php  

require "configdb.php";
	
$email = $_POST["email"];
$password = $_POST["password"]; 


$sql = "SELECT * FROM testing where email='".$email."' and password=MD5 ('".$password."');";

$result = mysql_query($sql,$conn);
 
$response = array();  
if(mysql_num_rows($result)>0)
	

	{
		
		$row = mysql_fetch_row($result);
		 $name = $row[0];
		 $contact = $row[3];
		 $code = "login success";
	    //session_start();
		//echo' welcome';
		//echo'  &nbsp';
		//echo   $_SESSION['user_name']=$user_name;
		//echo '<script language="javascript">';
		//echo 'alert("welcome $_SESSION[''] $user_name")';
		//echo '</script>';
		array_push($response,array("code"=>$code,"name"=>$name,"email"=>$contact));
		echo json_encode($response);
		echo '<br>';
		echo '<a href="login.html" onClick="history.go(-1);return true;">Send Me Back A Page!</a>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<button><a href="wallet.html"> pay </a></button>';
		echo '&nbsp';
		echo '<button><a href="wallet.html"> receive </a></button>';
	}
	
	
	else
	{
		
		$code ="login_failed";
		$message = "user not found";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	
	mysql_close($conn);

?>