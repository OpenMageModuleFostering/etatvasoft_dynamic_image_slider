<?php

class Tatva_Faqs_Block_Adminhtml_Faqs_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('faqsGrid');
      $this->setDefaultSort('faqs_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('faqs/faqs')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('faqs_id', array(
          'header'    => Mage::helper('faqs')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'faqs_id',
      ));

      $this->addColumn('question', array(
          'header'    => Mage::helper('faqs')->__('Question'),
          'align'     =>'left',
          'index'     => 'question',
      ));

	  if (!Mage::app()->isSingleStoreMode())
      {
          $this->addColumn('store_id',
                  array (
                          'header' => Mage::helper('cms')->__('Store view'),
                          'index' => 'store_id',
                          'type' => 'store',
                          'store_all' => true,
                          'store_view' => true,
                          'sortable' => false,
                          'filter_condition_callback' => array (
                                  $this,
                                  '_filterStoreCondition' ) ));
      }

      $this->addColumn('status', array(
          'header'    => Mage::helper('faqs')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('faqs')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('faqs')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('faqs')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('faqs')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('faqs_id');
        $this->getMassactionBlock()->setFormFieldName('faqs');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('faqs')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('faqs')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('faqs/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('faqs')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('faqs')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

  protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

   protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }

       $this->getCollection()->addStoreFilter($value);
    }

}