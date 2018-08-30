<?php
/**
* Virtual Employee Forum
* 
* @category     VE
* @package      Ve_Forum
* @copyright    Copyright (c) 2015 VE (http://www.virtualemployee.com/)
* @author       VE (Magento Team)
* @version      Release: 1.0.0.1
*/
?>
<?php
 
class Ve_Forum_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
    public function __construct()
    {
        $this->_blockGroup = 'forum';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('ve_forum')->__('Forum Topic');
        parent::__construct();
        //$this->_removeButton('add');
    }
}