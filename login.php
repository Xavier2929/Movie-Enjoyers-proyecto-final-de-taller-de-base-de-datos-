<?php
session_start();


$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'dbmovieenjoyers');


$password=$_POST['psswd'];
$email =$_POST['email'];
$name =$_POST['nombre'];

$s = "select * from tbusuarios where correoElectronico='$email' && password ='$password'";

$result= mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){
   header('location:inicio.html');
}else{
 header('location:index.html');
 echo "La inforamcion que introdujo no es correcta";
}
?>