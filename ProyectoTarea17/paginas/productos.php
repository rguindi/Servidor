<?php
    require("../BBDD/funciones.php")
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&display=swap" rel="stylesheet">
  

  <title>Mesa para 2</title>
</head>

<body>
 
    <?php
    require("../html/header.html");
    ?>
 


  <main>

  
    <section class="novedades ">
      <article >
        <div class="card " style="width: 18rem; ">
          <div class="card-header text-center mb-3 ">
            <h3 class="card-text"><?php echo novedades()[0]['titulo']; ?></h3>
          </div>
          <img src="<?php echo '.'. novedades()[0]['imagen_url']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text"><?php echo novedades()[0]['descripcion']; ?></p>
          </div>
          <div class="card-footer text-center bg-success fs-4 ">
            <p class="card-text fw-bold precio ">Precio: <?php echo novedades()[0]['precio']; ?>€</p>
          </div>
        </div>
      </article>
    </section>
    


  </main>




  <div class="pie">
    <?php
    require('../html/footer.html');
    ?>
  </div>

</body>

</html>


