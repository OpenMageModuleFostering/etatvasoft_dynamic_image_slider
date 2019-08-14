<?php
class Tatva_Orderreport_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/orderreport?id=15 
    	 *  or
    	 * http://site.com/orderreport/id/15 	
    	 */
    	/* 
		$orderreport_id = $this->getRequest()->getParam('id');

  		if($orderreport_id != null && $orderreport_id != '')	{
			$orderreport = Mage::getModel('orderreport/orderreport')->load($orderreport_id)->getData();
		} else {
			$orderreport = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($orderreport == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$orderreportTable = $resource->getTableName('orderreport');
			
			$select = $read->select()
			   ->from($orderreportTable,array('orderreport_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$orderreport = $read->fetchRow($select);
		}
		Mage::register('orderreport', $orderreport);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}