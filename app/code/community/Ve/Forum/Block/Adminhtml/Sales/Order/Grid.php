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
 
class Ve_Forum_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
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
		$collection = Mage::getModel('ve_forum/forum')->getCollection();
        $this->setCollection($collection);
		
        return parent::_prepareCollection();
	   }
 
    protected function _prepareColumns()
    {
        $helper = Mage::helper('ve_forum');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);
 
        $this->addColumn('Id', array(
            'header' => $helper->__('id'),
            'index'  => 'forum_id'
        ));
		$this->addColumn('Forumcategory', array(
            'header' => $helper->__('Forumcategory'),
            'index'  => 'forumcategory'
        ));
		$this->addColumn('Product', array(
            'header' => $helper->__('Product'),
            'index'  => 'product'
        ));
		$this->addColumn('Message', array(
            'header' => $helper->__('Message'),
            'index'  => 'message'
        ));
		
		$this->addColumn('Date', array(
            'header' => $helper->__('Created Date/Time'),
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
                            'url'       => array('base'=> 'adminhtml/forumbackend/manageedit'),
                            'field'     => 'id'
                    
            ),
			array(
                                  'caption' => Mage::helper('forum')->__('Delete'),
                                  'url' => array('base'=> 'adminhtml/forumbackend/Deletetopic'),
								  'confirm'  => Mage::helper('forum')->__('Are you sure?'),
                                  'field' => 'id'
                              )
                      ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'stores',
            'is_system' => true,
    ));
 
        $this->addExportType('*/*/exportInchooCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportInchooExcel', $helper->__('Excel XML'));
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
	

}