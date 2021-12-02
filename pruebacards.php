<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de cards obtenidas de data de base de datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    
<style>
    .banner-image{
        background-image: url(images/her2.jpg);
        
        background-position: center;
        background-size: cover;
      
        height: 200px;

        
    }

</style>
</head>
<body>



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
                <li class="nav-item"><a href="crearReview.html" class="nav-link fs-5">Escribe una review</a></li>
            </ul>
        </div>

    </div>
</nav>


<!-- banner de imagen -->
    
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
  
</div>

<br>
<br>
<br>

<div class="container my-5 d-grid gap-5 ">
    
<h1 class="align-middle"> Reviews de Peliculas</h1>

<div class="card-group">
<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'dbmovieenjoyers');


$s = "select tbreviews.foto,tbdirectores.nombreDirector,tbreviews.review,tbpeliculas.fechaEstreno,tbpeliculas.nombrePelicula,tbActores.nombreActor from tbreviews 
inner JOIN tbpeliculas on tbreviews.idtitulo = tbpeliculas.id
INNER JOIN tbdirectores ON tbreviews.idDirector = tbdirectores.id
inner join tbactores on tbreviews.idActor= tbactores.id";

$result= mysqli_query($con,$s);




while($row = $result->fetch_assoc()) {
  // echo $row['nombre'];
  
  //   echo $row['fechaEstreno'];

  ?>
  <!-- aqui adentro va la card -->
  <div class="card align-middle" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Titulo de pelicula: <?php echo $row['nombrePelicula'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"> Director: <?php echo $row['nombreDirector'] ?> </h6>
    <h6 class="card-subtitle mb-2 text-muted"> Protagonista: <?php echo $row['nombreActor'] ?> </h6>

    <p class="card-text"> Review: <?php echo $row['review'] ?> </p>
    
  </div>
</div>

  



<?php

  
}







  
?>

</div>


</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script>
    var nav =document.querySelector('nav');
    window.addEventListener('scroll',function(){
        if (window.pageYOffset>200) {

                   
           
           
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

