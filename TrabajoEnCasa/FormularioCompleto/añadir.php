<?


function añadir (){

    
     
     $dom = new DOMDocument();
     
     $dom->load('./contactos.xml', LIBXML_NOBLANKS);     //Abrimos el fichero y le quitamos el formateo
    
 
    $raiz = $dom->documentElement;        //Obtiene el nodo raiz del documento
    $contacto = $dom->createElement('contacto');
    
    $alfabetico = $dom->createElement('alfabetico', $_REQUEST['alfabetico']);
    $numerico = $dom->createElement('numerico',$_REQUEST['numerico']);
    $fecha = $dom->createElement('fecha',$_REQUEST['fecha']);
    $radio = $dom->createElement('radio',$_REQUEST['opcion']);
    
    $instrumentos = $dom->createElement('instrumentos');

    foreach ($_REQUEST['aficcion'] as $key => $value) {
        $instrumento = $dom->createElement('instrumento', $value);
        $instrumentos->appendChild($instrumento);
    }
    
    $select = $dom->createElement('select',$_REQUEST['select']);
    $email = $dom->createElement('email',$_REQUEST['email']);
    $pass = $dom->createElement('pass',$_REQUEST['pass']);
    

    $ultimoid = $raiz->lastChild->getAttribute('id');   //Extraigo el numero id del ultimo nodo.
    $nuevoid = ((int) substr ($ultimoid,8))+1 ;     //extraigo el numero, lo convierto a int y le sumo 1.
    $contacto->setAttribute('id', 'contacto'.$nuevoid);
    
    
    $raiz->appendChild($contacto);



    $contacto->appendChild($alfabetico);
    $contacto->appendChild($numerico);
    $contacto->appendChild($fecha);
    $contacto->appendChild($radio);
    $contacto->appendChild($instrumentos);
    $contacto->appendChild($select);
    $contacto->appendChild($email);
    $contacto->appendChild($pass);
    
    
    $dom->formatOutput = true;    //Formatea el documento
    $dom->save('./contactos.xml');
    
}