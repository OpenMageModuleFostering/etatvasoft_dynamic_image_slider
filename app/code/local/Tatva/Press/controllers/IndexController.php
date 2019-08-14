<?php
class Tatva_Press_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	$store = Mage::app()->getStore();
		$code  = $store->getCode();
		$enable = Mage::getStoreConfig('press/press/enable',$code);
		if($enable == 0)
		{
			$this->_redirect('');
			return;
		}
		
		$this->loadLayout();     
		$this->getLayout()->getBlock('head')->setTitle('Press');    
		$this->renderLayout();
    }
	
	public function viewAction()
    {
    	$store = Mage::app()->getStore();
		$code  = $store->getCode();
		$enable = Mage::getStoreConfig('press/press/enable',$code);
		if($enable == 0)
		{
			$this->_redirect('');
			return;
		}
		 
    	$this->loadLayout();     
		$this->getLayout()->getBlock('head')->setTitle('Press View');   
		$this->renderLayout();
    }
}