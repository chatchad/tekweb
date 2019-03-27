<?php 
$con=mysqli_connect("localhost","root","","tekweb99");
	
if(isset($_POST['showtable']))
{
	$sql="select * from mhs";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr><td>".$row['id']."</td><td>".$row['nama']."</td><td>".$row['alamat']."</td><td>".$row['umur']."</td><td>".$row['jenis_kelamin']."<td><a class='cekide' ide=".$row['id']."><button class='btn btn-success'><img src='src/edit.png'/ width='25px' height='25px'></button></a></td><td><a class='cekidd' idd=".$row['id']."><button class='btn btn-danger' onclick='deletedata()''><img src='src/delete.png'/ width='25px' height='25px'></button></a></td></tr>";
	}
	exit(); 
} 
elseif (isset($_POST['insert'])) {
	$nama=$_POST['name'];
	$umur=$_POST['umur'];
	$alamat=$_POST['alamat'];
	$Gender=$_POST['jenis_kelamin'];
	$query=mysqli_query($con,"INSERT into mhs VALUES (null,'$nama','$alamat',$umur,'$Gender')");
	echo("INSERT into mhs VALUES (null,'$nama','$alamat',$umur,'$Gender')");

}
elseif (isset($_POST['deletes'])) {
	$id=$_POST['id'];
	
	$query=mysqli_query($con,"DELETE from mhs where id=$id");

}
elseif(isset($_POST['updates']))
{	
	$id=$_POST['id'];
	echo $id;
	$query=mysqli_query($con,"SELECT * from mhs where id=$id");
	$row=mysqli_fetch_array($query);
	$id=$row['id'];
	$nama=$row['nama'];
	$alamat=$row['alamat'];
	$umur=$row['umur'];	
	$jk=$row['jenis_kelamin'];	
	echo $nama;
	echo $alamat;
	echo $umur;
	echo $jk;
	exit();
	#$ide=$_POST['id'];
	#$name=$_POST['name'];
	#$age=$_POST['age'];
	#$add=$_POST['address'];
	#$Gender=$_POST['g'];
	#$query=mysqli_query($con,"UPDATE mhs SET nama='$name',alamat='$add',umur=$age,jenis_kelamin='$Gender' WHERE id=$ide");
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


<script type="text/javascript">
$(document).ready(function(){
	showdata();
	$("body").delegate(".cekidd","click" ,function deletedata()
	{
		var v_id=$(this).attr('idd');
		
	$.ajax({
		url	: "dataajax.php",
		type	: "POST",
		async	: false,
		datatype: "html",
		data	: {
		deletes	: 1,
		id 		: v_id

			 }, 
		success	: function(res)
		{
			showdata();
		}
	
	});
	});

	$("body").delegate(".cekide","click" ,function editdata()
	{
		var v_id=$(this).attr('ide');
		
	$.ajax({
		url	: "dataajax.php",
		type	: "POST",
		async	: false,
		datatype: "html",
		data	: {
		updates	: 1,
		id 		: v_id

			 }, 
		success	: function(res)
		{
			alert(res);
			showdata();
			$('#id').val(show.id);
			$('#name').val(show.nama);
			$('#umur').val(show.umur);
			$('#alamat').val(show.alamat);
			$('#g').val(show.jk);
		}
	
	});
	});

});
	function showdata()
	{
	$.ajax({
		url	: "dataajax.php",
		type	: "POST",
		async	: false,
		data	: {
		showtable	: 1
			 }, 
		success	: function(res)
		{
		$('#showdata').html(res);
		}
	
	});
	}

	function insertdata()
	{
		var v_name=$('#name').val();
		var v_alamat=$('#alamat').val();
		var v_umur=$('#umur').val();
		$.ajax({
			url : "dataajax.php",
			type: "POST",
			async: false,
			data	: {
			insert			: 1,
			name 			:v_name,
			alamat 	 		:v_alamat,
			umur 		 	:v_umur,
			jenis_kelamin 	:$("[name=g]").val()
            },
        success	: function(res)
		{
			
		$('#showdata').html(res);
		}

	});
	}

</script>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      			<li class="nav-item active">
  					<a class="navbar-brand">Welcome,</a>
				</li>
			</ul>
		</div>
</nav>

<div class="jumbotron jumbotron-fluid">
  		<div class="container">
   
	<form name="myform" method="POST">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="id" id="id" value=<?php if (isset($row)) {echo '"'.$id.'"';}?>></td>
			<br>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="name" id="name" value=<?php if (isset($row)) {echo '"'.$nama.'"';}?>></td>
			<br>
		</tr>
		<tr>
		<td>
			alamat
		</td>
		<td>:</td>
		<td>
			<input type="text" name="address" id="alamat" value=<?php if (isset($row)) {echo '"'.$alamat.'"';}?>>
		</td>
	</tr>
	<tr>
		<td>
			umur
		</td>
		<td>:</td>
		<td>
			<input type="text" name="age" id="umur" value=<?php if (isset($row)) {echo '"'.$umur.'"';}?>>
		</td>
		
	</tr>
	<tr>
		<td>Jenis Kelamin </td>
		<td>:</td>
		<td>
			<?php
			if (isset($row)) {
			if ($jk=="W") {
				echo '<input type="radio" name="g" value="W" checked="checked">wanita<br>';
				echo '<input type="radio" name="g" value="L">pria<br>';
			}
			else{
				echo '<input type="radio" name="g" value="W">wanita<br>';
				echo '<input type="radio" name="g" value="L" checked="checked">pria<br>';
			}
			}
			?>
		</td>
	</tr>				
	</table>
	
	<input type="button" class="btn btn-success" onclick="insertdata()" value="save">
	<button class="btn btn-success" onclick="showdata()">Show</button>
	<button class="btn btn-success" onclick="updates()">Update</button>			
</form>	
</div>
</div>
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
  		<tbody id="showdata">
</tbody>
</table>
</body>
</html>