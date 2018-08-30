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

class Ve_Forum_Block_Adminhtml_Manage_Question_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('inchoo_order_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
 
    protected function _prepareCollection()
    {
		$collection = Mage::getModel('ve_forum/qa')->getCollection()->addFieldToFilter('ans_id', array('eq'=>'0'));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    {
        $helper = Mage::helper('ve_forum');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);
		
		 $this->addColumn('Product', array(
            'header' => $helper->__('Product'),
            'index'  => 'Product'
        ));		
 
		$this->addColumn('Useremail', array(
            'header' => $helper->__('Useremail'),
            'index'  => 'useremail'
        ));
       $this->addColumn('Question', array(
            'header' => $helper->__('Question'),
            'index'  => 'question'
        ));
		$this->addColumn('Status', array(
            'header' => $helper->__('Status'),
            'index'  => 'status'
        ));
		
		$this->addColumn('Created At Date/Time', array(
            'header' => $helper->__('Created At Date/Time'),
            'index'  => 'date'
        ));
		
		 $this->addColumn('action',
            array(
            'header'    =>  Mage::helper('forum')->__('Action'),
            'width'     => '100',
            'type'      => 'action',
            'getter'    => 'getId',
            'actions'   => array(
                    array(
                            'caption'   => Mage::helper('forum')->__('Edit'),
                            'url'       => array('base'=> 'adminhtml/forumbackend/edit'),
                            'field'     => 'id'
                    
            ),
			array(
                                  'caption' => Mage::helper('forum')->__('Delete'),
                                  'url' => array('base'=> 'adminhtml/forumbackend/Delete'),
								  'confirm'  => Mage::helper('forum')->__('Are you sure?'),
                                  'field' => 'id'
                              )
                      ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'stores',
            'is_system' => true,
    ));
		
 
        $this->addExportType('*/*/exportInchooCsv3', $helper->__('CSV'));
        $this->addExportType('*/*/exportInchooExcel3', $helper->__('Excel XML'));
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid1', array('_current'=>true));
    }
}