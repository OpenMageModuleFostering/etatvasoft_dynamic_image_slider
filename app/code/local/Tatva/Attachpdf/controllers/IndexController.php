<?php
class Tatva_Attachpdf_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/attachpdf?id=15 
    	 *  or
    	 * http://site.com/attachpdf/id/15 	
    	 */
    	/* 
		$attachpdf_id = $this->getRequest()->getParam('id');

  		if($attachpdf_id != null && $attachpdf_id != '')	{
			$attachpdf = Mage::getModel('attachpdf/attachpdf')->load($attachpdf_id)->getData();
		} else {
			$attachpdf = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($attachpdf == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$attachpdfTable = $resource->getTableName('attachpdf');
			
			$select = $read->select()
			   ->from($attachpdfTable,array('attachpdf_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$attachpdf = $read->fetchRow($select);
		}
		Mage::register('attachpdf', $attachpdf);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}