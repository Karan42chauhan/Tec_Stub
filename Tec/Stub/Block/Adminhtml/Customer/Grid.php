<?php
class Tec_Stub_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid
{
    protected function _prepareColumns()
    {
    	parent::_prepareColumns();

        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('customer')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'popup' => true,
                        'caption'   => Mage::helper('customer')->__('Edit'),
                        'url'       => array('base'=> 'stub/login/autologin'),
                        'field'     => 'customerid'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'renderer'  => 'Tec_Stub_Block_Adminhtml_Customer_Renderer_Loginasadmin',
                'is_system' => true,
        ));
    }
}