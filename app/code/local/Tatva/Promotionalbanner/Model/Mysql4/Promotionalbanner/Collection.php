<?php

class Tatva_Promotionalbanner_Model_Mysql4_Promotionalbanner_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('promotionalbanner/promotionalbanner');
    }
}