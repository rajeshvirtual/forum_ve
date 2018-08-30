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
   class Ve_Forum_Block_Captcha extends Mage_Captcha_Block_Captcha  
    {  
        protected function _toHtml()  
        {  
            $blockPath = 'forum/captcha_zend';  
            $block = $this->getLayout()->createBlock($blockPath);  
            $block->setData($this->getData());  
            return $block->toHtml();  
        }  
    }  
	
	