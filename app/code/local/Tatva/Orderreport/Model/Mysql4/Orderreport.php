<?php

class Tatva_Orderreport_Model_Mysql4_Orderreport extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the orderreport_id refers to the key field in your database table.
        $this->_init('orderreport/orderreport', 'orderreport_id');
    }
}