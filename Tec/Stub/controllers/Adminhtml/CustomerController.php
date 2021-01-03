<?php
require_once(Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'CustomerController.php');
class Tec_Stub_Adminhtml_CustomerController extends Mage_Adminhtml_CustomerController
{

	public function loginattemptsAction() {
		echo "Block calling...<br>";
        $this->_initCustomer();
        // $this->loadLayout();
        $this->renderLayout();
    }
}