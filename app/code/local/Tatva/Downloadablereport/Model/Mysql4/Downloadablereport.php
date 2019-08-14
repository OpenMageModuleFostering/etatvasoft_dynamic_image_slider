<?php

class Tatva_Downloadablereport_Model_Mysql4_Downloadablereport extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the downloadablereport_id refers to the key field in your database table.
        $this->_init('downloadablereport/downloadablereport', 'downloadablereport_id');
    }
}