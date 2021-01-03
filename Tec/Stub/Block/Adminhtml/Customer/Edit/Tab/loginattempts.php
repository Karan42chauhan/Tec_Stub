<?php
class Tec_Stub_Block_Adminhtml_Customer_Edit_Tab_Loginattempts extends Mage_Adminhtml_Block_Widget_Form

{
    echo "in login attempts";

    public function __construct()
    {
        parent::_construct();

        // $this->_blockGroup = 'tec_stub_adminhtml';

        // $this->_controller = 'customer';
        echo "test";
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('tec_stub/login_collection')
            ->addFieldToSelect('login_id')
            ->addFieldToSelect('customer_id')
            ->addFieldToSelect('admin_id')
            ->addFieldToSelect('created_at');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

         $this->addColumn('login_id', array(
            'header'    => Mage::helper('customer')->__('ID'),
            'index'     => 'login_id',
        ));

        $this->addColumn('customer_id', array(
            'header'    => Mage::helper('customer')->__('Customer Id'),
            'index'     => 'customer_id',
        ));

        $this->addColumn('admin_id', array(
            'header'    => Mage::helper('customer')->__('Admin Id'),
            'index'     => 'admin_id',
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('customer')->__('LogIn Attempted At'),
            'index'     => 'created_at',
            'type'      => 'datetime',
        ));

        return parent::_prepareColumns();
    }

}
