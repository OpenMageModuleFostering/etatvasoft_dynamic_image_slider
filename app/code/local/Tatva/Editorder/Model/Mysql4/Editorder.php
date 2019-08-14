<?php

class Tatva_Editorder_Model_Mysql4_Editorder extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the editorder_id refers to the key field in your database table.
        $this->_init('editorder/editorder', 'editorder_id');
    }
}