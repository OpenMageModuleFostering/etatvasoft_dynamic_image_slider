<?php

class Tatva_Customtab_Block_Adminhtml_Customtab_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'customtab';
        $this->_controller = 'adminhtml_customtab';
        
        $this->_updateButton('save', 'label', Mage::helper('customtab')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('customtab')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('customtab_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'customtab_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'customtab_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('customtab_data') && Mage::registry('customtab_data')->getId() ) {
            return Mage::helper('customtab')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('customtab_data')->getTitle()));
        } else {
            return Mage::helper('customtab')->__('Add Item');
        }
    }
}