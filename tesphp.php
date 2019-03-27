<?php 
$name=$_POST['text'];
$Gender=$_POST['g'];
$hobby=$_POST['cb'];
$jurusan=$_POST['jurusan'];
$tes1=$_POST['tes1'];
$uts=$_POST['uts'];
$tes2=$_POST['tes2'];
$uas=$_POST['uas'];
$IPK=0;
echo "<table border='1'>";
echo "<tr><td>Name</td><td>Jurusan</td><td>Hobby</td><td>IPK</td><td>Grade</td></tr>";
if ($Gender == "pria") {
	
	echo "<tr><td>Mr.".$name."</td>";

}

elseif ($Gender == "wanita") {
	echo "<td>Mrs.".$name."</td>";
}
if ($jurusan =="informatika") {
	echo "<td>".$jurusan."</td>";
}
elseif ($jurusan =="sib") {
	echo "<td>".$jurusan."</td>";
}
echo "<td>";
foreach ($hobby as $value) {
	
	echo $value."<br>";
}
echo "</td>";
$IPK=(($tes1+$uts+$uas+$tes2)/4)*4/100;
$grade=($tes1+$uts+$uas+$tes2)/4;
echo "<td>".$IPK."</td>";
if ($grade >80) {
	echo "<td>A</td>";
}
elseif ($grade >68) {
	echo "<td>B</td>";
}
elseif ($grade >56) {
	echo "<td>C</td>";
}
elseif ($grade > 45) {
	echo "<td>D</td>";
}
echo "</tr>";
echo "</table>";
?>