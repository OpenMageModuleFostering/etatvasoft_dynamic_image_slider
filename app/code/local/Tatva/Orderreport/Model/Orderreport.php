<?php

class Tatva_Orderreport_Model_Orderreport extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('orderreport/orderreport');
    }
}