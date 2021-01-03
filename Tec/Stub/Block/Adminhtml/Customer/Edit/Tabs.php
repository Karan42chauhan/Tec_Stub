<?php
class Tec_Stub_Block_Adminhtml_Customer_Edit_Tabs extends Mage_Adminhtml_Block_Customer_Edit_Tabs
{ 
	private $parent;

    protected function _prepareLayout()
    {
        //get all existing tabs
        $this->parent = parent::_prepareLayout();
        //add new tab
        $this->addTab('loginattempts', array(
                    'label'     => Mage::helper('customer')->__('Login Attempts'),
                    'class'     => 'ajax',
                    'url'       => $this->getUrl('*/*/loginattempts', array('_current' => true)),
                 ));
        return $this->parent;
    }
}