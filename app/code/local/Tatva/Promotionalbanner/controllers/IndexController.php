<?php
class Tatva_Promotionalbanner_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/promotionalbanner?id=15 
    	 *  or
    	 * http://site.com/promotionalbanner/id/15 	
    	 */
    	/* 
		$promotionalbanner_id = $this->getRequest()->getParam('id');

  		if($promotionalbanner_id != null && $promotionalbanner_id != '')	{
			$promotionalbanner = Mage::getModel('promotionalbanner/promotionalbanner')->load($promotionalbanner_id)->getData();
		} else {
			$promotionalbanner = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($promotionalbanner == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$promotionalbannerTable = $resource->getTableName('promotionalbanner');
			
			$select = $read->select()
			   ->from($promotionalbannerTable,array('promotionalbanner_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$promotionalbanner = $read->fetchRow($select);
		}
		Mage::register('promotionalbanner', $promotionalbanner);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}