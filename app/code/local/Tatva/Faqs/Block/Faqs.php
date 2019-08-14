<?php
class Tatva_Faqs_Block_Faqs extends Mage_Core_Block_Template
{
   protected function _prepareLayout()
        {
            
            if ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs')) {
                $breadcrumbsBlock->addCrumb('home', array(
                    'label'=>Mage::helper('catalog')->__('Home'),
                    'title'=>Mage::helper('catalog')->__('Go to Home Page'),
                    'link'=>Mage::getBaseUrl()
                ));
            }

            parent::_prepareLayout();

        }

	/*
	 * Load featured products collection
	 * */
	protected function _getfaqsCollection()
	{
        $storeId = Mage::app()->getStore()->getId();
        $_faqids = Mage::getModel('faqs/faqs')->_getfaqId($storeId);
        $_data = Mage::getModel('faqs/faqs')->_getfaqdata($_faqids);
        return $_data;
    }

    /**
     * Retrieve loaded featured products collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getfaqsCollection()
    {
        return $this->_getfaqsCollection();
    }
}