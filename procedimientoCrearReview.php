<?php

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'dbmovieenjoyers');

 $titulo=$_POST['titulo'];
 $fechaEstreno =$_POST['fechaEstreno'];
 $director =$_POST['director'];
 $actor =$_POST['actor'];
 $review =$_POST['review'];
 $foto =$_POST['foto'];

 
 




 $procedure = "CALL insert_review('$titulo','$fechaEstreno','$director','$actor','$review','$foto')";
//   $procedure = "CALL insert_pelicula2('$titulo','$fechaEstreno')";


 $result = mysqli_query($con,$procedure);
 header('location:inicio.html');
 

?>