<html>
<head>
<script>
		
function myfunction()
{

 alert("login first")
 

 } 

</script>

</head>

<body>
<form action = "login.php" method="post">
<table>


<tr>
<td>  User Name : </td><td><input type="text" name="user_name"/> <?php echo $nameErr;?></td>
</tr>

<tr> 
<td>Password : </td><td><input type="password" name="password"/></td>
</tr>

<tr>
<td><input type="submit" value="Login"/></td>
</tr>
<tr>
<td>
<a href="register_test.html" onClick="history.go(-1);return true;">Send Me Back A Page!</a>
</td>
</tr>
</table>
</form>
</body>
</html>



