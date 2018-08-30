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
class Ve_Forum_Block_Adminhtml_Form_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('form_form',               array('legend'=>Mage::helper('forum')->__('Forum Topic')));
          
        $fieldset->addField('category', 'select', array(
          'label'     => Mage::helper('forum')->__('Forum Category'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'category',
		 
        ));
		 $fieldset->addField('store', 'select', array(
          'label'     => Mage::helper('forum')->__('Store'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'store',
        ));
		 $fieldset->addField('parent', 'select', array(
          'label'     => Mage::helper('forum')->__('Parent Category'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'parent',
        ));
		 $fieldset->addField('sub', 'select', array(
          'label'     => Mage::helper('forum')->__('Sub Category'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'sub',
        ));
		 $fieldset->addField('product', 'select', array(
          'label'     => Mage::helper('forum')->__('Product'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'product',
        ));
		$fieldset->addField(
            'description', 
            'editor', 
            array(
                'name'      => 'description',
                'label'     => Mage::helper('forum')->__('Description'),
                'title'     => Mage::helper('forum')->__('Description'),
                'style'     => 'height:36em',
                'required'  => true,
                'config'    => $wysiwygConfig,
            )
        );

          
        return parent::_prepareForm();
    }
}
