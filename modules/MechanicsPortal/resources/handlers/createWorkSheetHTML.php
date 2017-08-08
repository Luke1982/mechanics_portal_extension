<?php

function createWorkSheetHTML($id, $autograph, $lines, $autogr_name, $times, $user) {
	global $adb;
	require_once('Smarty_setup.php');

	list($so_wsid, $so_id) = explode('x', $id);

	$smarty = new vtigerCRM_Smarty();
	$worksheet_path = 'modules/MechanicsPortal/WorkSheet.tpl';

	$company = getCompany();
	$so_data = getSalesOrderData($so_id);

	$smarty->assign('COMPANY', $company);
	$smarty->assign('SO', $so_data);
	$smarty->assign('LINES', $lines);
	$smarty->assign('AUTOGRAPH_SRC', $autograph);
	$smarty->assign('AUTOGRAPH_NAME', $autogr_name);
	$smarty->assign('TIMES', $times);
	$smarty->assign('USER', $user->column_fields);

	$html_worksheet = $smarty->fetch($worksheet_path);

	$adb->pquery("UPDATE vtiger_salesorder SET worksheet_html = ? WHERE salesorderid = ?", array($html_worksheet, $so_id));
}

/*
 * Gets the CRM-company's general data
 */
function getCompany() {
	global $adb;
	$q = "SELECT * FROM vtiger_organizationdetails WHERE organization_id = ?";
	$p = array(1);
	$r = $adb->pquery($q, $p);
	return $adb->fetch_array($r);
}

/*
 * Gets the SalesOrder's general data
 * @param: salesorder ID (int)
 */
function getSalesOrderData($id) {
	global $adb;
	$q = "SELECT * FROM vtiger_salesorder LEFT JOIN vtiger_soshipads ON vtiger_salesorder.salesorderid=vtiger_soshipads.soshipaddressid LEFT JOIN vtiger_sobillads ON vtiger_salesorder.salesorderid=vtiger_sobillads.sobilladdressid LEFT JOIN vtiger_account ON vtiger_salesorder.accountid=vtiger_account.accountid WHERE vtiger_salesorder.salesorderid = ?";
	$p = array($id);
	$r = $adb->pquery($q, $p);
	return $adb->fetch_array($r);
}