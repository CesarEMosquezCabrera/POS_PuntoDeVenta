<?php 
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";
require_once "../../assest/fpdf/fpdf.php";

$id=$_GET["id"];
$factura=ControladorFactura::ctrInfoFactura($id);
$producto=json_decode($factura["detalle"],true);

?>

<?php
//require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
//encabezado
$pdf->SetFont('Arial','B',15);
$pdf->Cell(100,20,"Sistema POS",0,1);
$pdf->Line(10,25,180,25);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,8,"NIT: 376151024",0,0);
$pdf->setX(110);
$pdf->Cell(50,8,"Nro. Factura: ".$factura['cod_factura'],0,1);
//$pdf->Cell(50,8,utf8_decode("Teléfonos: (591) 9422560"),0,0);
$pdf->Cell(50,8,"Teléfonos: (591) 9422560",0,0);
$pdf->setX(110);
$pdf->Cell(50,8,"Fecha de emision: ".$factura['fecha_emision'],0,1);
$pdf->Cell(50,8,"Emitido por: ".$factura['usuario'],0,1);
$pdf->Cell(50,8,"Dirección: Calle Pucara #129",0,1);
$pdf->Cell(50,8,"",0,1);
$pdf->Cell(50,8,"Nombre: ".$factura['razon_social_cliente'],0,1);
$pdf->Cell(50,8,"NIT/CI: ".$factura['nit_ci_cliente'],0,1);

//DETALLAZOS
$pdf->SetFont('Arial','B',14);
$pdf->Cell(120,15,"",0,1);
$pdf->setX(90);
$pdf->Cell(30,20,"Detalle",0,1,"C");

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(75,98,241);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(92,8,"Descripción",1,0,"L",true);
$pdf->Cell(22,8,"Cantidad",1,0,"L",true);
$pdf->Cell(22,8,"P. Unitario",1,0,"L",true);
$pdf->Cell(22,8,"Descuento",1,0,"L",true);
$pdf->Cell(22,8,"P. Total",1,1,"L",true);

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);

foreach($producto as $value){
    $pdf->Cell(92,8,$value['descripcion'],1,0,"L",);
    $pdf->Cell(22,8,$value['cantidad'],1,0,"L",);
    $pdf->Cell(22,8,$value['precioUnitario'],1,0,"L",);
    $pdf->Cell(22,8,$value['montoDescuento'],1,0,"L",);
    $pdf->Cell(22,8,$value['subtotal'],1,1,"L",);
}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(158,8,"Subtotal: ",1,0);
$pdf->Cell(22,8,$factura['neto'],1,1);

$pdf->Cell(158,8,"Descuento adicional",1,0);
$pdf->Cell(22,8,$factura['descuento'],1,1);

$pdf->Cell(158,8,"total: ",1,0);
$pdf->Cell(22,8,$factura['total'],1,0);

$pdf->Output();
?>