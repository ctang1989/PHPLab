<?php

class ManageAction extends Action {

	public function __construct($m) {
		echo parent::gx().$m->addManage();
		echo parent::gx().$m->deleteManage();
	}
}

?>