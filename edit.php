<?php 
$con=mysqli_connect("localhost","root","","tekweb99");
$id=$_GET["id"];

$result=mysqli_query($con,"select * from mhs where id='$id'");
$row=mysqli_fetch_array($result);
	$id=$row['id'];
	$nama=$row['nama'];
	$alamat=$row['alamat'];
	$umur=$row['umur'];	
	$jk=$row['jenis_kelamin'];	
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</script>
<body>

<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Edit Menu</a>
</nav>

	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
   
  
	<form action="sql.php" method="post">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="id" value=<?php echo '"'.$id.'"'; ?>></td>
			<br>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="name" value=<?php echo '"'.$nama.'"'; ?>></td>
			<br>
		</tr>
		<tr>
		<td>
			alamat
		</td>
		<td>:</td>
		<td>
			<input type="text" name="address" value=<?php echo '"'.$alamat.'"'; ?>>
		</td>
	</tr>
	<tr>
		<td>
			umur
		</td>
		<td>:</td>
		<td>
			<input type="text" name="age" value=<?php echo '"'.$umur.'"'; ?>>
		</td>
		
	</tr>
	<tr>
		<td>Jenis Kelamin </td>
		<td>:</td>
		<td>
			<?php
			if ($jk=="W") {
				echo '<input type="radio" name="g" value="W" checked="checked">wanita<br>';
				echo '<input type="radio" name="g" value="L">pria<br>';
			}
			else{
				echo '<input type="radio" name="g" value="W">wanita<br>';
				echo '<input type="radio" name="g" value="L" checked="checked">pria<br>';
			}
			
			?>
		</td>
	</tr>		
	
		
	</table>
	<button href="login.php" class="btn btn-success">view</button>
	<button name="update" class="btn btn-success">Update</button>			
</form>	
</div>
</div>
</body>
</html>