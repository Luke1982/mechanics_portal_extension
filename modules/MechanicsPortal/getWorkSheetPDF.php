<?php

if (!isset($_REQUEST['pdfaction']) && $_REQUEST['pdfaction'] != 'delete') {

	require_once('modules/MechanicsPortal/vendor/tcpdf/tcpdf.php');

	global $adb;
	$id = $_REQUEST['soid'];
	$r = $adb->pquery("SELECT worksheet_html, salesorder_no FROM vtiger_salesorder WHERE salesorderid = ?", array($id));
	$worksheet_html = '<style type="text/css">table td {border-style: solid solid solid solid;border-width: 0.1px 0.1px 0.1px 0.1px;border-color: #000 #000 #000 #000;}</style>';
	$worksheet_html .= $adb->query_result($r, 0, 'worksheet_html');
	$order_no = $adb->query_result($r, 0, 'salesorder_no');

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'px', PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetFont('dejavusans', '', 8, '', true);

	$pdf->AddPage();
	$pdf->writeHTML($worksheet_html, true, false, false, false, '');

	$filepath = $_SERVER['DOCUMENT_ROOT'].'/modules/MechanicsPortal/tmp_pdf/';
	$filename = 'werkbon_' . $order_no .  '.pdf';
	// $filename = $job_no . '_' . $procedure . '.pdf';

	$pdf->Output($filepath . $filename, 'F');

	$return = array();
	$return['download_loc'] = '/modules/MechanicsPortal/tmp_pdf/' . $filename;
	$return['delete_loc'] = $filepath . $filename;
	echo json_encode($return);

} else if (isset($_REQUEST['pdfaction']) && $_REQUEST['pdfaction'] == 'delete') {

	unlink($_REQUEST['filetodelete']);

}