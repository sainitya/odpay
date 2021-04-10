<?php  

$host = "localhost";
$db_user = "barhia";
$db_password = "barhia";
$db_name = "barhia";


$con = mysqli_connect($host,$db_user,$db_password,$db_name);

if($con)
{
 echo "Database connection success...";
}	
else
{
	
	echo "Database connection failed...";
}

?>