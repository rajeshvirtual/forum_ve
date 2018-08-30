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
class ve_forum_Block_Index extends Mage_Core_Block_Template{   

public function show()
{
	$storeId = Mage::app()->getStore()->getStoreId(); 
	$read = Mage::getSingleton('core/resource')->getConnection('core_read');
	$write = Mage::getSingleton('core/resource')->getConnection('core_write'); 
    $result = $read->fetchAll("select * from forum where store = '$storeId' order by forum_id desc");
	$total_rows = count($result);
    return $result;
}



}