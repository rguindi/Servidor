<?
require('../../fpdf186/fpdf.php');
require('./Header.php');

$arrayCliente = array(
    'Nombre' => 'Jose Luis Fernandez Romero',
    'DNI' => '11971618E',
    'Direccion' => 'C/Larga 45, Zamora',
    'Fecha' => '23/11/2023',
    'Pedido' => 'PD-15077765',
);
$arrayasociativopedido = array(
    'Laptop 1TB 4RAM HP i7' => array(
        'cantidad' => 3,
        'precio' => 250,
        'iva' => 21
    ),
    'Teclado' => array(
        'cantidad' => 2,
        'precio' => 40,
        'iva' => 19
    ),
    'Mouse' => array(
        'cantidad' => 5,
        'precio' => 15,
        'iva' => 21
    ),
    'Monitor' => array(
        'cantidad' => 1,
        'precio' => 200,
        'iva' => 19
    ),
    'Impresora' => array(
        'cantidad' => 4,
        'precio' => 120,
        'iva' => 21
    ),
    'Disco Duro' => array(
        'cantidad' => 3,
        'precio' => 80,
        'iva' => 19
    )
);
$pdf = new HeaderC;         //LLama a la cabecera que hemos creado en otro archivo

$pdf->AddPage();                //Añade una pagina

$pdf->SetFont('helvetica', 'B', 20); 
$pdf->SetTextColor (0,0,0);

$pdf->SetLineWidth(2.3);
$pdf->SetDrawColor(256,150,40);
$pdf->Line(90,76,10,76);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('helvetica', 'B', 15); 
$pdf->SetTextColor (100,100,100);
$pdf->Write(5,"Datos del cliente:");
$pdf->Ln();
$pdf->Ln();

cliente($arrayCliente, $pdf);



$pdf->SetY(125);
$pdf->SetX(10);
$pdf->SetFont('helvetica', 'B', 20); 
creaFactura($arrayasociativopedido, $pdf);
$pdf->Output();

function cliente ($arrayCliente, $pdf){
    $pdf->SetTextColor (100,100,100);
    $pdf->SetFontSize(10);
foreach ($arrayCliente as $key => $value) {
    $pdf->Write(5,$key.": ".$value);
    $pdf->Ln();
}
}

    



function creaFactura ($arrayasociativo, $pdf){
    $pdf->SetFontSize(10);
    $pdf-> SetFillColor(256,150,40);    //Color de fonfo
    $pdf-> Cell(80,10, 'Concepto', 0, 0,'C',true);     //True rellena de color de fondo
    $pdf-> Cell(27,10, 'Cantidad', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'Precio', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'Suma', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'I.V.A.', 0, 0,'C',true);
    $pdf->Ln();
    $base = 0;
    $ivatotal=0;
    foreach ($arrayasociativo as $concepto => $resto) {
        $pdf->SetTextColor (100,100,100);
        $pdf->SetLineWidth(1.5);
        $pdf->SetDrawColor(256,150,40);
        $pdf-> SetFillColor(255,255,255);
        $pdf-> Cell(80,10, $concepto, 'B', 0,'L',true);
        $contador = 1;
        $cantidad= 0;
        $totalproducto=0;
        foreach ($resto as $texto => $value) {
            if ($contador ==1) {
                $cantidad= $value;     
                $pdf-> Cell(27,10, $value, 'B', 0,'C',true);
            }
            if ($contador ==2){
              $totalproducto = $cantidad*$value;  
            $pdf-> Cell(27,10, $value.iconv('UTF-8', 'windows-1252', " €"), 'B', 0,'C',true);
            $pdf-> Cell(27,10, $totalproducto.iconv('UTF-8', 'windows-1252', " €"), 'B', 0,'C',true);
            }
            if ($contador ==3){
                $iva = ($totalproducto * $value) / 100;
                $desglose = $value ."% (".$iva.iconv('UTF-8', 'windows-1252', " €").")";
            $pdf-> Cell(27,10, $desglose, 'B', 0,'R',true);
            $ivatotal += $iva;
            $base += $totalproducto;
            }
            
            $contador++;
        }
        $pdf->Ln();
    }
    $totalfinal = $ivatotal+$base;
    $pdf-> Cell(188,10, "Total Base Imponible:  $base".iconv('UTF-8', 'windows-1252', " €")."", 'B', 1,'R',true);
    $pdf-> Cell(188,10, "I.V.A.:  $ivatotal".iconv('UTF-8', 'windows-1252', " €")."", 'B', 1,'R',true);
    $pdf->SetTextColor (0,0,0);
    $pdf-> Cell(188,10, "TOTAL:  $totalfinal".iconv('UTF-8', 'windows-1252', " €")."", 'B', 0,'R',true);



}
