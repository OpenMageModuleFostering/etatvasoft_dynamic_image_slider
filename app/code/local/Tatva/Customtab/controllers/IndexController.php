<?php
class Tatva_Customtab_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	$this->loadLayout();
        $block = $this->getLayout()->createBlock(
            'Mage_Core_Block_Template',
            'customtab.customtab',
            array(
                'template' => 'customtab/customtab.phtml'
            )
        );
        $this->getLayout()->getBlock('content')->append($block);
        //$this->getLayout()->getBlock('right')->insert($block, 'catalog.compare.sidebar', true);
        $this->_initLayoutMessages('core/session');
        $this->renderLayout();
		 

			
	   
    }
	
	public function postAction()
{

        $postData = $this->getRequest()->getPost();
        //print_r($postData);exit;
        $model = Mage::getModel('customtab/customtab');
        //print_r($model);exit;
        $model->setCustomtabId($this->getRequest()->getParam('customtab_id'))
            ->setName($postData['name'])
            ->setEmailId($postData['email_id'])
			->setContactno($postData['contactno'])
            ->save();
        Mage::getSingleton('customer/session')->addSuccess(Mage::helper('adminhtml')->__('Rule was successfully saved'));

      //  $this->_redirect('*/*/index');'
	  $this->_redirect('*/*/');
}
}