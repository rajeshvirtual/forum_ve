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
class Ve_Forum_Block_Captcha_Zend extends Mage_Captcha_Block_Captcha_Zend
{
    /**
     * Renders captcha HTML (if required)
     *
     * @return string
     */
    protected function _toHtml()
    {
        $this->getCaptchaModel()->generate();
 
        if (!$this->getTemplate()) {
            return '';
        }
        $html = $this->renderView();
 
        return $html;
    }
 
    /**
     * Returns URL to controller action which returns new captcha image
     *
     * @return string
     */
    public function getRefreshUrl()
    {
        return Mage::getUrl(
            Mage::app()->getStore()->isAdmin() ? 'adminhtml/refresh/refresh' : 'forum/captcha/refresh',
            array('_secure' => Mage::app()->getStore()->isCurrentlySecure())
        );
    }
}
