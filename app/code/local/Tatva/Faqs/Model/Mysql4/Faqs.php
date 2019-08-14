<?php

class Tatva_Faqs_Model_Mysql4_Faqs extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the faqs_id refers to the key field in your database table.
        $this->_init('faqs/faqs', 'faqs_id');
    }

    /* protected function _getLoadSelect($field, $value, $object) {

		$select = parent::_getLoadSelect($field, $value, $object);

		if ($object->getStoreId()) {
			$select->join(
				array('nns' => $this->getTable('faqs_store')),
				$this->getMainTable() . '.item_id = `nns`.faqs_id'
			)->where('status=1 AND `nns`.store_id in (0, ?) ',
			$object->getStoreId())->order('created_time DESC')->limit(1);
		}

		return $select;
	}*/

    protected function _afterSave(Mage_Core_Model_Abstract $object)
	{
		$condition = $this->_getWriteAdapter()->quoteInto('faqs_id = ?', $object->getId());

		// process slider item to store relation
		$this->_getWriteAdapter()->delete($this->getTable('faqs_store'), $condition);
		foreach ((array) $object->getData('stores') as $store) {
			$storeArray = array ();
			$storeArray['faqs_id'] = $object->getId();
			$storeArray['store_id'] = $store;
			$this->_getWriteAdapter()->insert(
				$this->getTable('faqs_store'), $storeArray
			);
		}
		return parent::_afterSave($object);
	}

    protected function _afterLoad(Mage_Core_Model_Abstract $object)
	{
	    // process slider item to store relation
		$select = $this->_getReadAdapter()->select()->from(
			$this->getTable('faqs_store')
		)->where('faqs_id = ?', $object->getId());

		if ($data = $this->_getReadAdapter()->fetchAll($select)) {
			$storesArray = array ();
			foreach ($data as $row) {
				$storesArray[] = $row['store_id'];
			}
			$object->setData('store_id', $storesArray);
		}

		return parent::_afterLoad($object);
	}
}