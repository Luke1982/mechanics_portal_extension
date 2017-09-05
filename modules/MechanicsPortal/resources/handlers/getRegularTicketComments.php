<?php

function getRegularTicketComments($id) {
	global $adb;
	$comments = array();

	list($wsid, $ticket_id) = explode('x', $id);
	$q = "SELECT vtiger_modcomments.commentcontent, vtiger_crmentity.createdtime, vtiger_users.first_name AS creator_firstname, vtiger_users.last_name AS creator_lastname, vtiger_smcreatorid AS creator FROM vtiger_modcomments INNER JOIN vtiger_crmentity ON vtiger_modcomments.modcommentsid=vtiger_crmentity.crmid INNER JOIN vtiger_users ON vtiger_crmentity.smcreatorid=vtiger_users.id WHERE vtiger_modcomments.related_to = ? AND vtiger_crmentity.deleted = ?";
	$r = $adb->pquery($q, array($ticket_id, 0));
	while ($comment = $adb->fetch_array($r)) {
		$comments[] = $comment;
	}
	return json_encode($comments);
}