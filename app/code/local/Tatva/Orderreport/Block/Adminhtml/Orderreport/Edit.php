<?php

class Tatva_Orderreport_Block_Adminhtml_Orderreport_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'orderreport';
        $this->_controller = 'adminhtml_orderreport';
        
        $this->_updateButton('save', 'label', Mage::helper('orderreport')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('orderreport')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('orderreport_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'orderreport_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'orderreport_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('orderreport_data') && Mage::registry('orderreport_data')->getId() ) {
            return Mage::helper('orderreport')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('orderreport_data')->getTitle()));
        } else {
            return Mage::helper('orderreport')->__('Add Item');
        }
    }
}