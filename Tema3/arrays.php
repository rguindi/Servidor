<?php

    //Array numerico

    $arrayNum = array (10);    //Un array con una posición. 10 es el valor.

    print_r($arrayNum);

    echo "<br>";

    $arraysemana = array ("Lunes", "Martes", "Miercoles", "Jueves");
    print_r ($arraysemana);
    echo "<br>";

    $array = array ("Lunes", 2, "Miercoles", 4);    //Mezclando tipos
    print_r ($array);

    echo "<br>";
    var_dump ($array);  //Tipos de datos
    echo "<br>";
    //declarar de forma corta array

    $arraydeformacorta = ["Lunes", 25];  //Se quita la palabra array con corchetes
    var_dump ($arraydeformacorta); 
    echo "<br>";


    //Recorrer array con for  SE UTILIZA FUNCION COUNT  //Mejor foreach

    for ($i=0; $i < count ($arraysemana); $i++) { 
        echo "<br>" . $arraysemana[$i];
    }
    echo "<br>";

    //Array dinamico. Modificar tamaño y contenido

    $arraysemana [4] = "Viernes";

    for ($i=0; $i < count ($arraysemana); $i++) { 
        echo "<br>" . $arraysemana[$i];
    }
    echo "<br>";

        //FOREACH
    foreach ($arraysemana as $key => $value) {
        echo "<br>" . $arraysemana[$key];
    }
    echo "<br>";

    //ARRAYS ASOCIATIVOS  ($_SERVER lo es)
    
    $notas = array ("Smail"=>10, "Mario"=>9, "Manuel" => "Sobresaliente");

    //Con este array solo se puede utilizar foreach

    foreach ($notas as $key => $value) {
        echo "<br>";
        echo "La nota de $key (key) es : $value (value)";
    }

    echo "<br>";

        //ARRAYS MULTIPLES

        
        $DAW = array ("PROG"=>"Programacion", "DWES"=> "Desarrollo servidor");
        $DAM = array ("LM"=>"Lenguaje de marcas", "PSP"=> "Servicios y procesos");
        $ASIR = array ("SO"=>"Sistemas operativos", "BD"=> "Bases de datos");
        $ciclos = array ("DAW"=>$DAW, "DAM"=>$DAM, "ASIR"=>$ASIR); //Array numerico


        //Recorrerlo

        foreach ($ciclos as $key => $value) {
            
            echo "<br> El ciclo de $key tiene las asignaturas: ";

            foreach ($value as $siglas => $asignatura) {
                echo "<br>- $siglas : $asignatura .";

            }

        }
        echo "<br>";
        echo "<br>";
        //Recorrerlo con las funciones del array

            reset ($ciclos); //Por si esta a mitad de  un recorrido

            while (current($ciclos)){
                //print_r(current($ciclos));
                echo "<br> El ciclo de". key($ciclos) . "tiene las asignaturas: ";
                $ciclo = current($ciclos);

                while(current($ciclo)){

                    echo "<br>".key($ciclo). ":". current($ciclo);
                    next ($ciclo);
                }

                next ($ciclos);


            }




?>