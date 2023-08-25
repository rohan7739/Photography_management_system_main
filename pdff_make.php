<?php                
require 'connection/database_connection.php'; 
include_once('tcpdf_6/tcpdf/tcpdf.php');

$Id=$_GET['Id'];

$inv_mst_query = "SELECT T1.Id, T1.Name, T1.Contact, T1.Email, T1.Address,T1.Photographer, T1.Date, T1.Time, T1.Function FROM appointments T1 WHERE T1.Id='".$Id."' ";             
$inv_mst_results = mysqli_query($con,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>

	<tr><td colspan="2" align="center"><b>Abhimanyu Aghav Films & Photography</b></td></tr>
	<tr><td colspan="2" align="center"><b>CONTACT: +91 9797997979</b></td></tr>
	<tr><td colspan="2" align="center"><b>WEBSITE: WWW.AbhiAghav.COM</b></td></tr>
    <tr><td align="right"><b>Date: '.date("d-m-Y").'</b> </td></tr>
    <hr>
    <tr><td colspan="2" align="center"><b>INVOICE</b></td></tr>
    <br>
    <tr><td colspan="2" align="center"><b> Appointment Sucessfull !!</b></td></tr><br><br>
    <br><br>
    <tr><td colspan="2"><b>BILL NO.: '.$inv_mst_data_row['Id'].'</b></td></tr>
	<tr><td colspan="2"><b>CUST.NAME: '.$inv_mst_data_row['Name'].' </b></td></tr>
    <tr><td colspan="2"><b>Email ID: '.$inv_mst_data_row['Email'].' </b></td></tr>
	<tr><td colspan="2"><b>Photographer Name: '.$inv_mst_data_row['Photographer'].' </b></td></tr>
    <tr><td colspan="2"><b>Date: '.$inv_mst_data_row['Date'].' </b></td></tr>
    <tr><td colspan="2"><b>Time: '.$inv_mst_data_row['Time'].' </b></td></tr>
    <tr><td colspan="2"><b>Type Of Shoot: '.$inv_mst_data_row['Function'].' </b></td></tr>
	<tr><td><b>MOB.NO: '.$inv_mst_data_row['Contact'].' </b></td></tr>
	<tr><td>&nbsp;</td></tr>';


		
		$content .= '<tr><td colspan="2" align="center"><b>Note : Payment accepted at the time of Appointment</b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>THANK YOU ! VISIT AGAIN</b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	</table>
</table>'; 
$pdf->writeHTML($content);

$file_location = "/home/fbi1glfa0j7p/public_html/examples/generate_pdf/uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}

//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

?>