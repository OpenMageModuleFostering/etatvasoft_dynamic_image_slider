<?php
class Tatva_Downloadablereport_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/downloadablereport?id=15 
    	 *  or
    	 * http://site.com/downloadablereport/id/15 	
    	 */
    	/* 
		$downloadablereport_id = $this->getRequest()->getParam('id');

  		if($downloadablereport_id != null && $downloadablereport_id != '')	{
			$downloadablereport = Mage::getModel('downloadablereport/downloadablereport')->load($downloadablereport_id)->getData();
		} else {
			$downloadablereport = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($downloadablereport == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$downloadablereportTable = $resource->getTableName('downloadablereport');
			
			$select = $read->select()
			   ->from($downloadablereportTable,array('downloadablereport_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$downloadablereport = $read->fetchRow($select);
		}
		Mage::register('downloadablereport', $downloadablereport);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}