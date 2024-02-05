<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raul Ferrero Vicente</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</head>


<body>

    <header>
        <?php
        include("html/header.html");
        ?>
    </header>
    <main>
        <div>
            <div class=" d-flex justify-content-start ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h2>Tema1</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="./Temario/UD1.pdf">Tema1 (PDF)</a></li>
                                    <li><a href="/Tema1/phpinfo.php">PHP Info</a></li>
                                    <li><a href="/Tema1/Tutorial.pdf">Tutorial para crear servidor Linux</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                <h2>Tema2</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo1" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="./Temario/UD2.pdf">Tema2 (PDF)</a></li>
                                    <li><a href="/Tema2/eligeidioma.php">Elige Idioma</a></li>
                                    <li><a href="/Tema2/Tarea3.php">Tarea 3-1</a></li>
                                    <li><a href="/Tema2/Tarea3-2.php?variable=456">Tarea 3-2</a></li>
                                    <li><a href="/Tema2/Tarea3-3.php?variable=2023/10/03">Tarea 3-3</a></li>
                                    <li><a href="/Tema2/Tarea3-4.php?raul=1982/09/24&manuel=1998/11/25">Tarea 3-4</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                <h2>Tema3</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h2>Tema3</h2>
                                <ul>
                                    <li><a href="./Temario/UD3.pdf">Tema3 (PDF)</a></li>
                                </ul>
                                <h4>Operadores y bucles</h4>
                                <ul>
                                    <li><a href="/Tema3/piramide.php?altura=16">Piramide</a></li>
                                    <li><a href="/Tema3/rombo.php?altura=16">Rombo</a></li>
                                    <li><a href="/Tema3/rombohueco.php?altura=16">Rombo Hueco</a></li>
                                    <li><a href="/Tema3/monedas.php?precio=6.33&pago=10">Cambio de monedas</a></li>
                                    <li><a href="/Tema3/bisiestos.php?ano=1998">Año Bisiesto</a></li>
                                </ul>
                                <h4>Arrays básicos</h4>
                                <ul>
                                    <li><a href="/Tema3/Tarea5Arrays.php?lado=4">Tarea Arrays</a></li>
                                    <li><a href="/Tema3/Tarea06.php">Tarea Equipos de Futbol</a></li>
                                </ul>
                                <h4>Funciones</h4>
                                <ul>
                                    <li><a href="/Tema3/tarea07utilizarfunciones.php">Tarea Funciones</a></li>
                                    <li><a
                                            href="/Tema3/Euromillones/euromillones.php?var1=1&var2=18&var3=21&var4=24&var5=45&var6=48&especial1=3&especial2=4">Tarea
                                            Euromillolnes</a></li>
                                </ul>
                                <h4>Formularios</h4>
                                <ul>
                                    <li><a href="/Tema3/Formularios/formulario.php">Formulario</a></li>
                                    <li><a href="/Tema3/Formularios/formularioarchivo.php">Formulario subir 2
                                            archivos</a>
                                    </li>
                                    <li><a href="/Tema3/Formularios/Tarea/tareaformulario.php">Tarea 08. Formulario</a>
                                    </li>
                                    <li><a href="/Tema3/Formularios/Tarea09/Formulario09.php">Tarea 09. Formulario</a>
                                    </li>
                                </ul>
                                <h4>Ficheros</h4>
                                <ul>
                                    <li><a href="/Tema3/LeeryEscribir/seleccionar.php">Leer y escribir fichero de
                                            texto</a><br><a
                                            style="font-size: 13px; color: yellow; border-top: 1px dashed;"
                                            href="./vercontenido.php?contenido=/var/www/servidor/Tema3/Ficheros/ficheroPlano.php">Ver
                                            Codigo
                                            para ficheros de TXT Plano</a></li>
                                    <li><a href="/Tema3/Tarea10/notas.php">Notas en fichero CSV</a></li>
                                    <li><a style="font-size: 13px; color: yellow; border-top: 1px dashed;"
                                            href="./vercontenido.php?contenido=/var/www/servidor/Tema3/AprendiendoXML/index.php">Ver
                                            Codigo para
                                            ficheros XML</a></li>
                                </ul>

                                <h4>DOM</h4>
                                <ul>
                                    <li><a href="/Tema3/DOM/dom.php">Crear un Fichero xml con el DOM</a></li>
                                    <li><a href="/Tema3/DOM/Tarea11/TransformaFichero.php">Conversión CSV Notas a
                                            XML</a>
                                    </li>
                                </ul>

                                <h4>PDF</h4>
                                <ul>
                                    <li><a href="/Tema3/PDF/Tarea12/HacerPdf.php">Crear PDF, Reports</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                <h2>Tema4</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="/BBDD/29N.php">Crear Conexion, hacer consulta preparada.</a></li>
                                    <li><a href="/BBDD/consultar.php">Tipos de Consultas</a></li>
                                    <li><a href="/BBDD/conexion.php">Conexion diferente con Update</a></li>
                                    <li><a href="/BBDD/conexionbanco.php">Ejecucion de Script</a></li>
                                    <li><a href="/BBDD/Tarea13/index.php">Tarea 13 BDD. MYSQL</a></li>
                                    <li><a href="/BBDD/Tarea13_PDO_Postgres/index.php">Tarea 13 con PDO Postgres</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                <h2>Tema5</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="./Tema5/unix/paginadeTodos.php">Autenticación por Apache (htacces)</a>
                                    </li>
                                    <li><a href="./Tema5/authserver/index.php">Autenticación por Servidor</a></li>
                                    <li><a href="./Tema5/Tarea14/index.php">Tarea 14. CRUD MYSQL con autenticación por
                                            servidor</a></li>
                                    <li><a href="./Tema5/sesiones/home.php">Sesiones</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                <h2>Tema6</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="./Tema6/mvc/">MVC</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" d-flex justify-content-start  ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo6" aria-expanded="false" aria-controls="collapseTwo6">
                                <h2>Tema7</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                <li><a href="./Tema7/leerApi.php">Leer API.</a></li>
                                <li><a href="./Tema7/consumirApi/index.php">Consumir API.</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" d-flex justify-content-start mb-4 ">
                <div class="accordion mt-4 col-12 col-xxl-6 col-xl-8 col-md-10 shadow z-0 " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo7" aria-expanded="false" aria-controls="collapseTwo7">
                                <h2>PROYECTO TIENDA</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="./ProyectoTarea17/index.php">Tarea17. Navidades.</a></li>
                                    <li><a href="./TAREA18/index.php">Tarea18. JUEGOS MVC.</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>


    <footer>
        <?php
        include("html/footer.html");
        ?>
    </footer>
</body>

</html>