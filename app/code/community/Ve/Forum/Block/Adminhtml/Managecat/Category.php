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
 
class Ve_Forum_Block_Adminhtml_Managecat_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
    public function __construct()
    {
        $this->_blockGroup = 'forum';
        $this->_controller = 'adminhtml_managecat_category';
        $this->_headerText = Mage::helper('ve_forum')->__('Manage categories');
        parent::__construct();
        $this->_removeButton('add');
    }
}