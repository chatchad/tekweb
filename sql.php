<?php 
$con=mysqli_connect("localhost","root","","tekweb99");
session_start();

#insert
if (isset($_POST['insert'])) {

$nama=$_POST['name'];
$umur=$_POST['age'];
$alamat=$_POST['address'];
$Gender=$_POST['g'];
$query=mysqli_query($con,"INSERT into mhs VALUES (null,'$nama','$alamat',$umur,'$Gender')");
header("location:sql.php");
}
elseif (isset($_POST['update'])) {
	$ide=$_POST['id'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$add=$_POST['address'];
	$Gender=$_POST['g'];
	$query=mysqli_query($con,"UPDATE mhs SET nama='$name',alamat='$add',umur=$age,jenis_kelamin='$Gender' WHERE id=$ide");
	header("location:sql.php");
}
elseif (isset($_POST['delete'])) {
	$ide=$_POST['id'];
	$query=mysqli_query($con,"DELETE from mhs where id=$ide");
	header("location:sql.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      			<li class="nav-item active">
  					<a class="navbar-brand">Welcome,</a>
  <?php 
  $echoname=$_SESSION["username"];
  echo "<a class='navbar-brand'>".$echoname."</a>";
   ?>
				</li>
			</ul>
		</div>
  <form class="form-inline my-2 my-lg-0">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="" class="mr-sm-2">List</a></li>
      	<li><a href="menu.html" class="mr-sm-2">New</a></li>
      	<li><a href="" class="mr-sm-2">Edit</a></li>
      	<li><a href="loginmenu.html" class="mr-sm-2">Logout</a></li>
      </ul>
    </form>
</nav>

	<table class="table">
  		<thead class="thead-dark">
    		<tr>
     			<th scope="col">ID</th>
      			<th scope="col">Nama</th>
      			<th scope="col">Alamat</th>
      			<th scope="col">Umur</th>
      			<th scope="col">Jenis Kelamin</th>
      			<th scope="col">Edit</th>
      			<th scope="col">Delete</th>
      			
      			
    		</tr>
  		</thead>
  		<tbody>
  			<?php 
  				$result=mysqli_query($con,"select * from mhs");
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr><td>".$row['id']."</td><td>".$row['nama']."</td><td>".$row['alamat']."</td><td>".$row['umur']."</td><td>".$row['jenis_kelamin']."<td><a href='edit.php?id=".$row['id']."'><button class='btn btn-success'><img src='src/edit.png'/ width='25px' height='25px'></button></a></td><td><a href='delete.php?id=".$row['id']."'><button class='btn btn-danger'><img src='src/delete.png'/ width='25px' height='25px'></button></a></td></tr>";
				}
  			 ?>
  		</tbody>
</body>
</html>
