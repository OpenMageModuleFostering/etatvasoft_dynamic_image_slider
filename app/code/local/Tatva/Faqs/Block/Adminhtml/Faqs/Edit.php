<?php

class Tatva_Faqs_Block_Adminhtml_Faqs_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _prepareLayout()
    {
       parent::_prepareLayout();
       if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled())
       {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
       }
    }

    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'faqs';
        $this->_controller = 'adminhtml_faqs';
        
        $this->_updateButton('save', 'label', Mage::helper('faqs')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('faqs')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('faqs_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'faqs_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'faqs_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('faqs_data') && Mage::registry('faqs_data')->getId() ) {
            return Mage::helper('faqs')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('faqs_data')->getTitle()));
        } else {
            return Mage::helper('faqs')->__('Add Item');
        }
    }
}