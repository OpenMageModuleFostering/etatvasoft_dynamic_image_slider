<?php

class Tatva_Customtab_Model_Mysql4_Customtab extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the customtab_id refers to the key field in your database table.
        $this->_init('customtab/customtab', 'customtab_id');
    }
}