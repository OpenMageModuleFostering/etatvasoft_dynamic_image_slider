<?php

class Tatva_Customtab_Model_Customtab extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('customtab/customtab');
    }
}