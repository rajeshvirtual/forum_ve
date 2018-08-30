<?php
/**
* Virtual Employee Forum
* 
* @category     VE
* @package      Ve_Forum
* @copyright    Copyright (c) 2016 VE (http://www.virtualemployee.com/)
* @author       VE (Magento Team)
* @version      Release: 1.0.0.1
*/
?>

<?php

class Ve_Forum_Block_Adminhtml_Managecat_Category_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
    public function __construct()
    {
        parent::__construct();
        $this->setId('ve_order_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
 
    protected function _prepareCollection()
    {
		$collection = Mage::getModel('ve_forum/cat')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
	}
 
    protected function _prepareColumns()
    {
        $helper = Mage::helper('ve_forum');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);
 
        $this->addColumn('Id', array(
            'header' => $helper->__('id'),
            'index'  => 'cat_id'
        ));
		
		
        $this->addColumn('Name', array(
            'header' => $helper->__('Category Name'),
            'index'  => 'name'
        ));
		
		 $this->addColumn('action',
            array(
            'header'    =>  Mage::helper('forum')->__('Action'),
            'width'     => '100',
            'type'      => 'action',
            'getter'    => 'getId',
              'actions'   => array(
                    array(
                        'caption' => Mage::helper('forum')->__('Delete'),
                        'url'     => array('base'=> 'adminhtml/order/deletemcat'),
						'confirm'  => Mage::helper('forum')->__('Are you sure?'),
                        'field'   => 'id'
                    )
                ),
            'filter'    => false,
            'sortable'  => false,
            'is_system' => true,
        )
    );
		
 
        $this->addExportType('*/*/exportInchooCsv1', $helper->__('CSV'));
        $this->addExportType('*/*/exportInchooExcel1', $helper->__('Excel XML'));
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid3', array('_current'=>true));
    }
}