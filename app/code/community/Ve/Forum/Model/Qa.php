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
 
class Ve_Forum_Model_Qa extends Mage_Core_Model_Abstract
{
     public function _construct() {
        parent::_construct();
        $this->_init('ve_forum/qa');
    }
}