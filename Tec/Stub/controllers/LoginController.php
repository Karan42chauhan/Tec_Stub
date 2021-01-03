<?php
class Tec_Stub_LoginController extends Mage_Core_Controller_Front_Action
{
    /**
     * Processes login action
     * @return bool
     * @throws Exception
     */
    public function autologinAction()
    {
        $session = $this->_getSession();
        if (!$this->_isAllowed()) {
            $message = $this->__('You have no pemission to use this option');
            $session->addError($message);
            $this->_redirect('customer/account/login');
        }
        else {
        	$currentDateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');
            $id = (int) trim($this->getRequest()->getParam('customerid'));
            $adminId = (int) trim($this->getRequest()->getParam('adminid'));
            $login = Mage::getModel('tec_stub/login');
            try{
                if($id){
                	$login->setCustomerId($id)
        			->setAdminId($adminId)
        			->setCreatedAt($currentDateTime);
        			$login->save();
                    $customer = Mage::getModel('customer/customer')->load($id);
                    $session->setCustomerAsLoggedIn($customer);
                    $message = $this->__('<div style="background-color: yellow;">You are now logged in as <b>%s', $customer->getName().'</b></div>');
                    $session->addNotice($message);
                    Mage::log($message);
                }else{
                    throw new Exception ($this->__('The login attempt was unsuccessful. Some parameter is missing'));
                }
            }catch (Exception $e){
                $session->addError($e->getMessage());
            }
            $this->_redirect('customer/account');
        }
    }

    /**
     * Gets customer session
     * @return Mage_Core_Model_Abstract
     */
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }

    /**
     * Checks if ip is allowed for autologin
     * @return mixed
     */
    protected function _isAllowed()
    {
        $allowedIps = Mage::helper('stub')->getAllowedIps();
        return Mage::helper('stub')->checkAllowedIp($allowedIps);
    }
}