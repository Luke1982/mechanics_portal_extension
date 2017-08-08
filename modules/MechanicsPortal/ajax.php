<?php

if (isset($_REQUEST['function']) && $_REQUEST['function'] == 'getWorkSheet') {
	global $adb;

	$soid = $_REQUEST['soid'];

	$r = $adb->pquery("SELECT worksheet_html FROM vtiger_salesorder WHERE salesorderid = ?", array($soid));
	$worksheet = $adb->query_result($r, 'worksheet_html', 0);

	echo rawurlencode($worksheet);
}