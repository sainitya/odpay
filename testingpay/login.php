
<?php  


require "configdb.php";
	$username= $password="";
$user_name = $_POST["user_name"];
if (empty($_POST["user_name"])) {
    $nameErr = "Name is required";
  } else {
    $user_name = test_input($_POST["user_name"]);
  }     
$password = $_POST["password"]; 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT * FROM testing where user_name='".$user_name."' and password=MD5('".$password."');";

$result = mysql_query($sql,$conn);
 
$response = array(); 
if(mysql_num_rows($result)>0)
	

	{
		
		$row = mysql_fetch_row($result);
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
	
	mysql_close($conn);

?>