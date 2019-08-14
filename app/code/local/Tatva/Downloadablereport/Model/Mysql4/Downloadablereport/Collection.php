<?php

class Tatva_Downloadablereport_Model_Mysql4_Downloadablereport_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('downloadablereport/downloadablereport');
    }
}