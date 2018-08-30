<?php


class Ve_Forum_Block_Adminhtml_Managea_Answer_Renderer_Red extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

public function render(Varien_Object $row)
{
$value =  $row->getData($this->getColumn()->getIndex());
$read = Mage::getSingleton('core/resource')->getConnection('core_read');
$write = Mage::getSingleton('core/resource')->getConnection('core_write'); 
$result = $read->fetchRow("select * from qa WHERE qa_id='$value'");
if ($result['ans_id']!=0){
return $result['answer'];
}
else {
return $result['question'];
}
 
}

}