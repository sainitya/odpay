<?php  
//if(isset($_POST['submit'])
require "configdb.php";
$amount = $_POST["amount"];
$email=$_POST["email"];

//$odpin=$_POST["odpin"];

//$sql = "select * from testing where email like '".$email."'";
//$result = mysql_query($sql,$conn);
$response = array();

if(@mysql_num_rows($result)>0)
{
	
	$message = "FAIL";
	array_push($response, array("message"=>$message));
	 print_r(json_encode($response));

	}
else
{
	//DECLARE @temp1 INT,@temp2 INT
	//$sql="update testing SET amount=amount-'".$amount."' where email='".$email."'";
	
    
	   //  temp1-$amount;
	//$sql1="select amount from testing where email='".$memail."'";		//temp2+$amount;
	//$result = mysql_query($sql,$conn);
	
	$sql2= "update  testing SET amount=amount+'".$amount."'where email='".$email."' ";

	 $result= mysql_query($sql2,$conn);


		$sql1="select amount from testing where email='".$email."'";
	
	$result = mysql_query($sql1,$conn);
		
	   while($row=mysql_fetch_array($result,MYSQL_ASSOC))

		{
			ob_start(); //Start output buffer
			echo "{$row['amount']}";
			$output = ob_get_contents(); //Grab output
			ob_end_clean();
  			//echo"available balance:{$row['amount']}<br> ";
  
     	  	 //echo"</p>";
 
 	  }
	//$result=mysql_query($sql2,$conn);


	$message = "OK";
	$balance ="$output";
	array_push($response, array("message"=>$message, "balance"=>$balance));
	 print_r(json_encode($response));
}
 
mysql_close($conn);

?>
