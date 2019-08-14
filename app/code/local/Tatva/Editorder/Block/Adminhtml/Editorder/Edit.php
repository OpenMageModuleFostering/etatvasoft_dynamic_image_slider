<?php

class Tatva_Editorder_Block_Adminhtml_Editorder_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'editorder';
        $this->_controller = 'adminhtml_editorder';
        
        $this->_updateButton('save', 'label', Mage::helper('editorder')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('editorder')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('editorder_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'editorder_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'editorder_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('editorder_data') && Mage::registry('editorder_data')->getId() ) {
            return Mage::helper('editorder')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('editorder_data')->getTitle()));
        } else {
            return Mage::helper('editorder')->__('Add Item');
        }
    }
}