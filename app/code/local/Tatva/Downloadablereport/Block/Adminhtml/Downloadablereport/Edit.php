<?php

class Tatva_Downloadablereport_Block_Adminhtml_Downloadablereport_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'downloadablereport';
        $this->_controller = 'adminhtml_downloadablereport';
        
        $this->_updateButton('save', 'label', Mage::helper('downloadablereport')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('downloadablereport')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('downloadablereport_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'downloadablereport_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'downloadablereport_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('downloadablereport_data') && Mage::registry('downloadablereport_data')->getId() ) {
            return Mage::helper('downloadablereport')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('downloadablereport_data')->getTitle()));
        } else {
            return Mage::helper('downloadablereport')->__('Add Item');
        }
    }
}