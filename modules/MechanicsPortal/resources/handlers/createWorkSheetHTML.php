<?php

function createWorkSheetHTML($id, $autograph, $lines) {
	global $adb;

	list($so_wsid, $so_id) = explode('x', $id);

	$adb->pquery("UPDATE vtiger_salesorder SET worksheet_html = ? WHERE salesorderid = ?", array('<h1>TEST</h1>', $so_id));
}