<?php
session_start();
header('location:index.html');

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'dbmovieenjoyers');


$password=$_POST['psswd'];
$email =$_POST['email'];
$name =$_POST['nombre'];

$s = "select * from tbusuarios where correoElectronico='$email'";

$result= mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){
    echo "una cuenta con este correo electronico ya fue creada";
}else{
    $reg="insert into tbusuarios(nombre,correoElectronico,password) values('$name','$email','$password')";
    mysqli_query($con,$reg);
    echo "tu nueva cuenta ha sido registrado de manera exitosa";
}
?>