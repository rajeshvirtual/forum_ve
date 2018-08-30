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
class Ve_Forum_Block_Adminhtml_Form2_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
 
  public function __construct()
  {
      parent::__construct();
      $this->setId('form_tabs');
      $this->setDestElementId('edit_form'); // this should be same as the form id define above
      $this->setTitle(Mage::helper('forum')->__('Forum Category'));
  }
 
  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('forum')->__('Enter Information'),
          'title'     => Mage::helper('forum')->__('Enter Information'),
          'content'   => $this->getLayout()->createBlock('forum/adminhtml_form2_edit_tab_form')->toHtml(),
      ));
      
      return parent::_beforeToHtml();
  }
}
