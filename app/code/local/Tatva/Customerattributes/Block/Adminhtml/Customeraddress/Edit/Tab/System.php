<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Product attribute add/edit form system tab
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Tatva_Customerattributes_Block_Adminhtml_Customeraddress_Edit_Tab_System extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $model = Mage::registry('entity_attribute');

        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('customerattributes')->__('System Properties')));

        if ($model->getAttributeId()) {
            $fieldset->addField('attribute_id', 'hidden', array(
                'name' => 'attribute_id',
            ));
        }

        $yesno = array(
            array(
                'value' => 0,
                'label' => Mage::helper('customerattributes')->__('No')
            ),
            array(
                'value' => 1,
                'label' => Mage::helper('customerattributes')->__('Yes')
            ));

        /*$fieldset->addField('attribute_model', 'text', array(
            'name' => 'attribute_model',
            'label' => Mage::helper('catalog')->__('Attribute Model'),
            'title' => Mage::helper('catalog')->__('Attribute Model'),
        ));

        $fieldset->addField('backend_model', 'text', array(
            'name' => 'backend_model',
            'label' => Mage::helper('catalog')->__('Backend Model'),
            'title' => Mage::helper('catalog')->__('Backend Model'),
        ));*/

        $fieldset->addField('backend_type', 'select', array(
            'name' => 'backend_type',
            'label' => Mage::helper('customerattributes')->__('Data Type for Saving in Database'),
            'title' => Mage::helper('customerattributes')->__('Data Type for Saving in Database'),
            'options' => array(
                'text'      => Mage::helper('customerattributes')->__('Text'),
                'varchar'   => Mage::helper('customerattributes')->__('Varchar'),
                'static'    => Mage::helper('customerattributes')->__('Static'),
                'datetime'  => Mage::helper('customerattributes')->__('Datetime'),
                'decimal'   => Mage::helper('customerattributes')->__('Decimal'),
                'int'       => Mage::helper('customerattributes')->__('Integer'),
            ),
        ));

        /*$fieldset->addField('backend_table', 'text', array(
            'name' => 'backend_table',
            'label' => Mage::helper('catalog')->__('Backend Table'),
            'title' => Mage::helper('catalog')->__('Backend Table Title'),
        ));

        $fieldset->addField('frontend_model', 'text', array(
            'name' => 'frontend_model',
            'label' => Mage::helper('catalog')->__('Frontend Model'),
            'title' => Mage::helper('catalog')->__('Frontend Model'),
        ));*/

        /*$fieldset->addField('is_visible', 'select', array(
            'name' => 'is_visible',
            'label' => Mage::helper('catalog')->__('Visible'),
            'title' => Mage::helper('catalog')->__('Visible'),
            'values' => $yesno,
        ));*/

        /*$fieldset->addField('source_model', 'text', array(
            'name' => 'source_model',
            'label' => Mage::helper('catalog')->__('Source Model'),
            'title' => Mage::helper('catalog')->__('Source Model'),
        ));*/

        $fieldset->addField('is_global', 'select', array(
            'name'  => 'is_global',
            'label' => Mage::helper('customerattributes')->__('Globally Editable'),
            'title' => Mage::helper('customerattributes')->__('Globally Editable'),
            'values'=> $yesno,
        ));

        $form->setValues($model->getData());

        if ($model->getAttributeId()) {
            $form->getElement('backend_type')->setDisabled(1);
            if ($model->getIsGlobal()) {
                #$form->getElement('is_global')->setDisabled(1);
            }
        } else {
        }

        $this->setForm($form);

        return parent::_prepareForm();
    }

}
