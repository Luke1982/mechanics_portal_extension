<?php

Class MechanicsPortal {

	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	function vtlib_handler($modulename, $event_type) {
		if($event_type == 'module.postinstall') {

			$this->installWorkSheetBlock();
			$this->createWebServiceOperation();

		} else if($event_type == 'module.disabled') {
			// TODO Handle actions when this module is disabled.
		} else if($event_type == 'module.enabled') {
			// TODO Handle actions when this module is enabled.
		} else if($event_type == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($event_type == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($event_type == 'module.postupdate') {
			// TODO Handle actions after this module is updated.
		}
	}

	private function installWorkSheetBlock() {

		include_once('vtlib/Vtiger/Module.php');

		$modname = 'SalesOrder';
		$module = Vtiger_Module::getInstance($modname);
		$block = new Vtiger_Block();
		$block->label = 'WorkSheet';
		$block->sequence = 2;
		$block->sequence = 2;
		$module->addBlock($block);

		rename('modules/MechanicsPortal/resources/templates/WorkSheet_edit.tpl', 'Smarty/templates/modules/SalesOrder/WorkSheet_edit.tpl');
		rename('modules/MechanicsPortal/resources/templates/WorkSheet_detail.tpl', 'Smarty/templates/modules/SalesOrder/WorkSheet_detail.tpl');

	}

	/*
	 * Creates a custom webservice operation for this module
	 */
	private function createWebServiceOperation() {
		require_once('include/Webservices/Utils.php');
		$operation = array(
						'name'		=> 'createWorkSheetHTML',
						'include'	=> 'modules/MechanicsPortal/resources/handlers/createWorkSheetHTML.php',
						'handler'	=> 'createWorkSheetHTML',
						'prelogin'	=> 0,
						'type'		=> 'POST',		
						'parameters' => array(
								array('name' => 'id', 'type' =>	'String'),
								array('name' => 'autograph', 'type' =>	'String'),
								array('name' => 'lines', 'type' =>	'Encoded')
						)
					);
		registerWSAPI($operation);		
	}


}