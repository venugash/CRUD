<?php
if(isset($_POST["txt_user"]))
{
	
	$un = $_POST["txt_user"];
	$pw = $_POST["txt_pass"];
	
	
	$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
	$sql = "SELECT * FROM tbl_user WHERE u_name='$un' AND u_pass='$pw'";
	$result = mysqli_query($con,$sql);
	if($row = mysqli_fetch_array($result))
	{
	
	
		header("Location:dash.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"Wrong User Name Or Password\");location.href = 'index.html';</script>";
		
	}
	mysqli_close($con);
}
?>

