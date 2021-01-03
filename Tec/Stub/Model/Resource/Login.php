<?php
 
class Tec_Stub_Model_Resource_Login extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('tec_stub/login', 'login_id');
    }
}