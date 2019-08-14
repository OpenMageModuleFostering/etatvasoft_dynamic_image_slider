<?php
class Tatva_Faqs_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$template = Mage::getConfig()->getNode('global/page/layouts/'.Mage::getStoreConfig("faqs/general/layout").'/template');

		$this->loadLayout();

	  //	$this->getLayout()->getBlock('root')->setTemplate($template);
		$this->getLayout()->getBlock('head')->setTitle($this->__(Mage::getStoreConfig("faqs/general/meta_title")));
		$this->getLayout()->getBlock('head')->setDescription($this->__(Mage::getStoreConfig("faqs/general/meta_description")));
		$this->getLayout()->getBlock('head')->setKeywords($this->__(Mage::getStoreConfig("faqs/general/meta_keywords")));

                $breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs');
                $breadcrumbsBlock->addCrumb('faqs', array(
                    'label'=>Mage::helper('faqs')->__(Mage::helper('faqs')->getPageLabel()),
                    'title'=>Mage::helper('faqs')->__(Mage::helper('faqs')->getPageLabel()),
                ));



		$this->renderLayout();
    }
}