<?php

class Tatva_Attachpdf_Model_Attachpdf extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('attachpdf/attachpdf');
    }
}