<?php

Class MechanicsPortal {

	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	function vtlib_handler($modulename, $event_type) {
		if($event_type == 'module.postinstall') {

			// Set module relations to SalesOrders
			$this->setSalesOrderRelations();

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

	private function setSalesOrderRelations() {

		include_once('vtlib/Vtiger/Module.php');

		$so_instance = Vtiger_Module::getInstance('SalesOrder');

		$so_instance->setRelatedList(
			Vtiger_Module::getInstance('HelpDesk'),
			'Tickets',
			Array('ADD','SELECT')
		);

	}	

}