<?php

class Tatva_Press_store_Model_Mysql4_Press_store extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the press_store_id refers to the key field in your database table.
        $this->_init('press_store/press_store', 'press_store_id');
    }
}