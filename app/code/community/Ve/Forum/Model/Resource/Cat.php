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
class Ve_Forum_Model_Resource_Cat extends Mage_Core_Model_Resource_Db_Abstract
{
      public function _construct() 
    {
        $this->_init('ve_forum/cat', 'cat_id');
    }
}