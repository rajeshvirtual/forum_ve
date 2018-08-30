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
class Ve_Forum_Block_Adminhtml_Form2_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

public function __construct()
    {
        parent::__construct();
                  
        $this->_objectId = 'id';
        $this->_blockGroup = 'forum';
        $this->_controller = 'adminhtml_form';
         
        $this->_updateButton('save', 'label', Mage::helper('forum')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('forum')->__('Delete'));
         
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
    }
 
    public function getHeaderText()
    {
        return Mage::helper('forum')->__('Add Forum Category');
    }
}
?>