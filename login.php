<?php 
$con=mysqli_connect("localhost","root","","tekweb99");
session_start();
if (isset($_POST['login'])) {

$usrname=$_POST['user'];
$pass=$_POST['pass'];	
$query=mysqli_query($con,"SELECT * FROM `login` WHERE username='$usrname' AND password='$pass'");
$_SESSION["username"] = $usrname;
$_SESSION["pass"] = $pass;
    $count  = mysqli_num_rows($query);
	if ($count == 1) 
	{
		header("location:sql.php");
	}
	else
	{
        echo "Wrong Username or password combination";
    }
}
elseif (isset($_POST['register'])) {
	$username=$_POST['user'];
	$pass=$_POST['pass'];
	
	$query=mysqli_query($con,"INSERT into login VALUES ('$username','$pass')");
	header("location:loginmenu.html");
}

 ?>