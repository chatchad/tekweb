<?php 
$con=mysqli_connect("localhost","root","","tekweb99");
$id=$_GET["id"];
	$query=mysqli_query($con,"DELETE from mhs where id=$id");
	header("location:sql.php");
	 ?>
