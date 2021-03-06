<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribir Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    .banner-image{
        background-image: url(images/fondoVentana.jpg);
        
        background-position: center;
        background-size: cover;
        opacity: 2;
        height: 200px;

        
    }

    





</style>

</head>
<body>
<!-- navbar -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
        <a href="#" class="navbar-brand fw-bold fs-1">Movie Enjoyers</a>
        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon">

            </span>
        </button>

        <div class="collapse navbar-collapse font-monospace fw-bold " id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav ">
                <li class="nav-item"><a href="inicio.html" class="nav-link  fs-5">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link  fs-5">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="pruebacards.php" class="nav-link  fs-5">Ver Reviews</a></li>
                <li class="nav-item"><a href="#" class="nav-link fs-5">Escribe una review</a></li>
            </ul>
        </div>

    </div>
</nav>


<!-- banner de imagen -->
    
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">
        <h1 class="fs-1 text-white  shadow-lg p-3 mb-5 bg-dark rounded bg-opacity-100"> Escribe tu Review!</h1>
    </div>
</div>
<!-- contenido  -->
<div class="container my-5 d-grid gap-5">
    <form action="procedimientoCrearReview.php" method="post" enctype="multipart/form-data">

        <br>
        <div class="mb-3">
          <label for="text" class="form-label">Titulo de pelicula</label>
          <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" name="titulo" list="listaPeliculas">
        </div>

        <div class="mb-2">
            <label for="text" class="form-label">Fecha de estreno</label>
            <input type="date" class="" id="exampleInputText" aria-describedby="emailHelp" name="fechaEstreno">
          </div>


        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Director</label>
          <input type="text" class="form-control" id="" name="director" list="listaDirectores">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Protagonista (nombre de actor)</label>
            <input type="text" class="form-control" id="" name="actor" list="listaActores">
         </div>


         <div class="input-group">
            <span class="input-group-text">Review</span>
            <textarea class="form-control" type="text" aria-label="With textarea" name="review"></textarea>
          </div>

          <br>

          <div class="input-group mb-3">
            <input type="file" class="form-control-file" name="foto">

          </div>

    

       

        <button type="submit" class="btn btn-primary" name="guardar">Subir</button>
      </form>
      <datalist id="listaDirectores"> 
          
          <?php
          
          $con=mysqli_connect('localhost','root','');
          mysqli_select_db($con,'dbmovieenjoyers');
          $s = "select nombreDirector from tbdirectores";
          $result= mysqli_query($con,$s);
  
          while($row=mysqli_fetch_assoc($result)){
              ?>
              
              <option value="<?php echo $row['nombreDirector'] ?>"></option>
            
           <?php
          }
  
          
          ?>

  
          </datalist>
          <datalist id="listaActores"> 
          
          <?php
          
          $con=mysqli_connect('localhost','root','');
          mysqli_select_db($con,'dbmovieenjoyers');
          $s = "select nombreActor from tbActores";
          $result= mysqli_query($con,$s);
  
          while($row=mysqli_fetch_assoc($result)){
              ?>
              
              <option value="<?php echo $row['nombreActor'] ?>"></option>
            
           <?php
          }
  
          
          ?>
         
  
          </datalist>
          <datalist id="listaPeliculas"> 
          
          <?php
          
          $con=mysqli_connect('localhost','root','');
          mysqli_select_db($con,'dbmovieenjoyers');
          $s = "select nombrePelicula from tbPeliculas";
          $result= mysqli_query($con,$s);
  
          while($row=mysqli_fetch_assoc($result)){
              ?>
              
              <option value="<?php echo $row['nombrePelicula'] ?>"></option>
            
           <?php
          }
  
          
          ?>
         
  
          </datalist>
  
  

</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    var nav =document.querySelector('nav');
    window.addEventListener('scroll',function(){
        if (window.pageYOffset>500) {

                   
           
           
            // nav.classList.add('bg-dark','shadow');
            nav.style.transition = "ease-in-out 0.6s "
            nav.classList.add('bg-dark','shadow');


            
        }else{
            nav.classList.remove('bg-dark','shadow');

        }
    });
</script>

</body>
</html>