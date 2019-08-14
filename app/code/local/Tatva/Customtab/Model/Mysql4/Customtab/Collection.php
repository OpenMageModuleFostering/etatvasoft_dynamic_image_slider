<?php

class Tatva_Customtab_Model_Mysql4_Customtab_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('customtab/customtab');
    }
}