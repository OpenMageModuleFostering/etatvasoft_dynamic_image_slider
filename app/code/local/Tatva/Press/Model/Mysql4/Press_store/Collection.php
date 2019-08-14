<?php

class Tatva_Press_store_Model_Mysql4_Press_store_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('press_store/press_store');
    }
}