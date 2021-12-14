<?php
session_start();


$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'dbmovieenjoyers');


$password=$_POST['psswd'];
$email =$_POST['email'];
// $name =$_POST['nombre'];

$s = "select * from tbusuarios where correoElectronico='$email' && password ='$password'";

$result= mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){

   $query="select tipoUsuario from tbusuarios where correoElectronico='$email' ";
   $res=mysqli_query($con,$query);
   $row = mysqli_fetch_array($res);
    
   
   
   if($row['tipoUsuario']=='admin'){
      $_SESSION['tipo']='admin';
      header('location:inicio.html');
      
   }
   else{
      $_SESSION['tipo']='admin';
     
      header('location:paginaX.html');
   }   
}else{
 header('location:index.html');
}
?>