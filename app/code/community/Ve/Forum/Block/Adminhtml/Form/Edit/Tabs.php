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
class Ve_Forum_Block_Adminhtml_Form_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
 
  public function __construct()
  {
      parent::__construct();
      $this->setId('form_tabs');
      $this->setDestElementId('edit_form'); // this should be same as the form id define above
      $this->setTitle(Mage::helper('forum')->__('Product Information'));
  }
 
  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('forum')->__('Item Information'),
          'title'     => Mage::helper('forum')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('forum/adminhtml_form_edit_tab_form')->toHtml(),
      ));
      
      return parent::_beforeToHtml();
  }
}
