<?php

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'dbmovieenjoyers');

 $titulo=$_POST['titulo'];
 $fechaEstreno =$_POST['fechaEstreno'];
 $director =$_POST['director'];
 $actor =$_POST['actor'];
 $review =$_POST['review'];


 $tipoArchivo=$_FILES['foto']['type'];
 $nombreArchivo=$_FILES['foto']['name'];
 $tamanoArchivo=$_FILES['foto']['size'];
 $imagenSubida= fopen($_FILES['foto']['tmp_name'],'r');
 // extraemos los binarios de la imagen
 $binariosImagen=fread($imagenSubida,$tamanoArchivo);
       
 $binariosImagen=mysqli_escape_string($con,$binariosImagen);
 
 




 $procedure = "CALL insert_review('$titulo','$fechaEstreno','$director','$actor','$review','$binariosImagen','$nombreArchivo','$tamanoArchivo');";
//   $procedure = "CALL insert_pelicula2('$titulo','$fechaEstreno')";



 $result = mysqli_query($con,$procedure);



 header('location:inicio.html');
 

?>