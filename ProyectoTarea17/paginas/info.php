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


  <title>Producto</title>
</head>

<body>
  <div class="cabecera">
    <?php
    require("../html/header.php");
      ?>
  </div>


  <main>

    <section class="articulo ">
      <div class="tituloproducto">
        <h1>
          Información sobre el Proyecto
        </h1>
      </div>
      <div class="d-flex row">
        <figure class="imagenproducto col-6">
        <embed src="../PR17.pdf" type="application/pdf" width="100%" height="800px" />
        </figure>
        <div class="col-6 container" style="color: black;">
          <h4 class=" border-bottom  border-black  ">Raul Ferrero Vicente</h4>
          <h4>2º DAW. IES Claudio Moyano</h4>
          <h4>Tienda de juegos de Mesa</h4>
          <h4>Diciembre de 2023</h4>
         
        </div>

      </div>
    </section>


  </main>




  <div class="pie">
    <?php
    require('../html/footer.html');
    ?>
  </div>

</body>

</html>