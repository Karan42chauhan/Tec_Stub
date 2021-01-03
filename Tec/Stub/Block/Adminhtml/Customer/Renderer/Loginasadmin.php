<?php
class Tec_Stub_Block_Adminhtml_Customer_Renderer_Loginasadmin extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $custId = $row->getData('entity_id');
        $adminuser = Mage::getSingleton('admin/session');
        $adminId = $adminuser->getUser()->getUserId();
        $role_data = Mage::getModel('admin/user')->load($value)->getRole()->getData();

        $link = '<a rel="noopener" target="_blank" href="'.Mage::helper('adminhtml')->getUrl('*/*/edit',array('id'=>$custId)).'">Edit User</a>
                    <br><a rel="noopener" target="_blank" href="'.Mage::helper('adminhtml')->getUrl('stub/login/autologin',array('customerid'=>$custId,'adminid'=>$adminId)).'">Login As Customer</a>';
              
        return $link;
    }
}