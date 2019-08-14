<?php

class Tatva_Faqs_Model_Faqs extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('faqs/faqs');
    }

    public function _getfaqId($id)
    {
        $read = Mage::getSingleton('core/resource')->getConnection('core_read');
        $qry = "select distinct(faqs_id) from faqs_store where store_id='".$id."' OR store_id=0";
        $res = $read->fetchAll($qry);
        $final_array = array();
        foreach($res as $_read)
        {
            $final_aray[] = $_read['faqs_id'];
        }
        return $final_aray;
    }
    public function _getfaqdata($faqids)
    {
        //$count = count($faqids);
        $read = Mage::getSingleton('core/resource')->getConnection('core_read');
        $res = array();
        foreach($faqids as $faq_id)
        {
             $query = "select question,answer from faqs where faqs_id='".$faq_id."' And status=1";
             $res[] = $read->fetchAll($query);
        }
        return $res;
    }

}