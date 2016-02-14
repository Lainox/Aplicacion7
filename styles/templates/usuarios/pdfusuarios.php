<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Listado de Usuarios',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('basephp');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically

//Second table: specify 3 columns

$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(250,246,246),
            'color2'=>array(250,246,246),
            'padding'=>2);
$pdf->Table('select user as usuario, nombre, fecha as "fecha de nacimiento" from users order by user',$prop);
$pdf->Output();
?>