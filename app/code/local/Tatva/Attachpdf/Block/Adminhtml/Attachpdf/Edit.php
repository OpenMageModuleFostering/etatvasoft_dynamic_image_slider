<?php

class Tatva_Attachpdf_Block_Adminhtml_Attachpdf_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'attachpdf';
        $this->_controller = 'adminhtml_attachpdf';
        
        $this->_updateButton('save', 'label', Mage::helper('attachpdf')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('attachpdf')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('attachpdf_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'attachpdf_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'attachpdf_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('attachpdf_data') && Mage::registry('attachpdf_data')->getId() ) {
            return Mage::helper('attachpdf')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('attachpdf_data')->getTitle()));
        } else {
            return Mage::helper('attachpdf')->__('Add Item');
        }
    }
}