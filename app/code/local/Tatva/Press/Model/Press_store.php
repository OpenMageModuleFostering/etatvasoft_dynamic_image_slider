<?php

class Tatva_Press_store_Model_Press_store extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('press_store/press_store');
    }
}