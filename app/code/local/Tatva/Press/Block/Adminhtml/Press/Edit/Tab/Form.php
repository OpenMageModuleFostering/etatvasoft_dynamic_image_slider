<?php

class Tatva_Press_Block_Adminhtml_Press_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	/**
     * Load Wysiwyg on demand and Prepare layout
     */
	
  protected function _prepareForm()
  {
      
      $form = new Varien_Data_Form();
	  $form->setHtmlIdPrefix('press_');
      $this->setForm($form);
      $fieldset = $form->addFieldset('press_form', array('legend'=>Mage::helper('press')->__('Item information')));
	  $press = Mage::getModel('press/press')->load( $this->getRequest()->getParam('id') );
	  $model = Mage::registry('press_data');
  	  $_model = Mage::registry('press_data')->getData();
	  $_data = Mage::getResourceModel('press/press')->edit_form($_model['press_id']);
	  
	  if ( Mage::registry('press_data') ) {
          $model_data = Mage::registry('press_data')->getData();
		  $model_data["stores"] = $_data;
		  $model_data["store_id"] = $_data;
	  }
  		
	  $after_html = '';
	  $afterpdf_html = '';
      if( $press->getDisplaypicture() )
      {
          $path = Mage::getBaseUrl('media')."press/".$press->getDisplaypicture();
          $after_html = '<a href="'.$path.'" target="_blank"><img height="20" width="20" alt="'.$press->getDisplaypicture().'" title="'.$press->getDisplaypicture().'" id="press" src="'.$path.'" style="vertical-align: middle;"/></a>';
      }
	  if( $press->getPdffile() )
      {
          $path = Mage::getBaseUrl('media')."press/pdf/".$press->getPdffile();
          $afterpdf_html = '<a target="_blank" href="'.$path.'">'.$press->getPdffile().'</a>';
      }
	  if( $press->getDate() )
      {
          $date = $press->getDate();
      }
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('press')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $element = $fieldset->addField('date', 'date', array(
			'name' => 'date',
			'title' => Mage::helper('press')->__('Press Date'),
			'label' => Mage::helper('press')->__('Press Date'),
			'image' => $this->getSkinUrl('images/grid-cal.gif'),
			'format' => 'yyyy-MM-dd',
	  		'class'     => 'required-entry validate-date',
          	'required'  => true,
			
	  )); 
	  
	  
	  $fieldset->addField('displaypicture', 'file', array(
          'label'     => Mage::helper('press')->__('Display Picture'),
          'required'  => false,
		  'class'	  => 'validate-imagefile',
          'name'      => 'displaypicture',
		  'after_element_html' => $after_html,
	  ));
	  
	  $fieldset->addField('pdffile', 'file', array(
          'label'     => Mage::helper('press')->__('PDF Attachment'),
          'required'  => false,
		  'class'	  => 'validate-pdffile',
          'name'      => 'pdffile',
		  'after_element_html' => $afterpdf_html,
	  ));
	  
	  /*$fieldset->addField('pressvideo', 'file', array(
          'label'     => Mage::helper('press')->__('Press Video'),
          'required'  => false,
		  //'class'	  => 'validate-flvfile',
          'name'      => 'pressvideo',
	  ));*/
	  
	  $fieldset->addField('pressvideo', 'text', array(
          'label'     => Mage::helper('press')->__('Press Video Link'),
          'required'  => false,
		  'class'	  => 'validate-url',
          'name'      => 'pressvideo',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('press')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('press')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('press')->__('Disabled'),
              ),
          ),
      ));
	  
  		
            $fieldset->addField('store_id', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('cms')->__('Store View'),
                'title'     => Mage::helper('cms')->__('Store View'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
       
	 
  	
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('press')->__('Content'),
          'title'     => Mage::helper('press')->__('Content'),
		  'style' 		=> 'height:25em;width:40em;',
		  //'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
		  'wysiwyg'   => true,
		  'required'   => true,
	   ));
	  
	 

     
      if ( Mage::getSingleton('adminhtml/session')->getPressData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPressData());
          Mage::getSingleton('adminhtml/session')->setPressData(null);
      } elseif ( Mage::registry('press_data') ) {
          $form->setValues($model_data);
      }
	  
	 
      return parent::_prepareForm();
  }
  
  public function getCustomerGroups()
  {
	$table = $this->getTable('customer_group');
  }
}