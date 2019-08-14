<?php

class Tatva_Press_Model_Mysql4_Press extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the press_id refers to the key field in your database table.
        $this->_init('press/press', 'press_id');
    }
	
	public function insert($a,$b,$c='')
    {    
		$count = count($b);
		$write = Mage::getSingleton('core/resource')->getConnection('core_write');
		if($c!='')
		{
			$write->query("delete from press_store where press_id = ".$c);
		}
		for($i=0 ; $i<$count ; $i++)
		{
			$write->query("insert into press_store(press_id,store_id) values ($a,$b[$i])");
		}
    }
	
	public function edit_form($id)
    {    
		$query = "select store_id from press,press_store where press_store.press_id ='" .$id. "'";
		$read = Mage::getSingleton('core/resource')->getConnection('core_read')->fetchAll($query);
		$final_aray = array();
        foreach($read as $_read)
        {
            $final_aray[] = $_read['store_id'];
        }
    	return $final_aray;
    }
	
	public function getStoreId($id)
    { 
		$query = "select * from press_store where press_store.store_id ='" .$id. "' or press_store.store_id=0";
		$read = Mage::getSingleton('core/resource')->getConnection('core_read')->fetchAll($query);
		$final_aray = array();
        foreach($read as $_read)
        {
            $final_aray[$_read['press_id']] = $_read['store_id'];
        }
		return $final_aray;
    }
}