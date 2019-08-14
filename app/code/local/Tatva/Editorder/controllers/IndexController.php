<?php
class Tatva_Editorder_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/editorder?id=15 
    	 *  or
    	 * http://site.com/editorder/id/15 	
    	 */
    	/* 
		$editorder_id = $this->getRequest()->getParam('id');

  		if($editorder_id != null && $editorder_id != '')	{
			$editorder = Mage::getModel('editorder/editorder')->load($editorder_id)->getData();
		} else {
			$editorder = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($editorder == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$editorderTable = $resource->getTableName('editorder');
			
			$select = $read->select()
			   ->from($editorderTable,array('editorder_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$editorder = $read->fetchRow($select);
		}
		Mage::register('editorder', $editorder);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}