<?php

class Tatva_Faqs_Block_Adminhtml_Faqs_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('faqs_form', array('legend'=>Mage::helper('faqs')->__('Item information')));
     
      $fieldset->addField('question', 'text', array(
          'label'     => Mage::helper('faqs')->__('Questions'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'question',
      ));

      if (!Mage::app()->isSingleStoreMode())
      {
         $fieldset->addField('store_id', 'multiselect', array(
                 'name'      => 'stores[]',
                 'label'     => Mage::helper('cms')->__('Store View'),
                 'title'     => Mage::helper('cms')->__('Store View'),
                 'required'  => true,
                 'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
         ));
        }
        else {
         $fieldset->addField('store_id', 'hidden', array(
                 'name'      => 'stores[]',
                 'value'     => Mage::app()->getStore(true)->getId()
         ));
         $model->setStoreId(Mage::app()->getStore(true)->getId());
      }

      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('faqs')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('faqs')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('faqs')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('answer', 'editor', array(
          'name'      => 'answer',
          'label'     => Mage::helper('faqs')->__('Answer'),
          'title'     => Mage::helper('faqs')->__('Answer'),
          'style'     => 'width:700px; height:500px;',
          'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
          'wysiwyg'   => true,
          'required'  => true,
      ));


      if ( Mage::getSingleton('adminhtml/session')->getFaqsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getFaqsData());
          Mage::getSingleton('adminhtml/session')->setFaqsData(null);
      } elseif ( Mage::registry('faqs_data') ) {
          $form->setValues(Mage::registry('faqs_data')->getData());
      }
      return parent::_prepareForm();
  }
}