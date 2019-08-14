<?php

class Tatva_Faqs_Model_Mysql4_Faqs_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('faqs/faqs');
    }

     public function addStoreFilter($store)
    {
        if ($store instanceof Mage_Core_Model_Store) {
            $store = array (
                 $store->getId()
            );
        }

        $this->getSelect()->join(
            array('store_table' => $this->getTable('faqs_store')),
            'main_table.faqs_id = store_table.faqs_id',
            array ()
        )->where('store_table.store_id in (?)', array (
            0,
            $store
        ))->group('main_table.faqs_id');

        return $this;
    }

    /* protected function _afterLoad()
    {
        if ($this->_previewFlag) {
            $items = $this->getColumnValues('faqs_id');
            if (count($items)) {
                $select = $this->getConnection()->select()->from(
                    $this->getTable('faqs_store')
                )->where(
                    $this->getTable('faqs_store') . '.faqs_id IN (?)',
                    $items
                );
                if ($result = $this->getConnection()->fetchPairs($select)) {
                    foreach ($this as $item) {
                        if (!isset($result[$item->getData('faqs_id')])) {
                            continue;
                        }
                        if ($result[$item->getData('faqs_id')] == 0) {
                            $stores = Mage::app()->getStores(false, true);
                            $storeId = current($stores)->getId();
                            $storeCode = key($stores);
                        }
                        else {
                            $storeId = $result[$item->getData('faqs_id')];
                            $storeCode = Mage::app()->getStore($storeId)->getCode();
                        }
                        $item->setData('_first_store_id', $storeId);
                        $item->setData('store_code', $storeCode);
                    }
                }
            }
        }

        parent::_afterLoad();
    }*/
}