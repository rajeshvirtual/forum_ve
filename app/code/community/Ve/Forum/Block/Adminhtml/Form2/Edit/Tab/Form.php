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
class Ve_Forum_Block_Adminhtml_Form2_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('form_form', array('legend'=>Mage::helper('forum')->__('Forum Topic')));
          
        $fieldset->addField('category', 'text', array(
          'label'     => Mage::helper('forum')->__('Forum Category'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'category',
		 
        ));
        return parent::_prepareForm();
    }
}
