<?php

class Tatva_Promotionalbanner_Model_Mysql4_Promotionalbanner extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the promotionalbanner_id refers to the key field in your database table.
        $this->_init('promotionalbanner/promotionalbanner', 'promotionalbanner_id');
    }
}