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
class Ve_Forum_CaptchaController extends Mage_Core_Controller_Front_Action
{
    /**
     * Refreshes captcha and returns JSON encoded URL to image (AJAX action)
     * Example: {'imgSrc': 'http://example.com/media/captcha/67842gh187612ngf8s.png'}
     *
     * @return null
     */
    public function refreshAction()
    {
        $formId = $this->getRequest()->getPost('formId', false);
        if ($formId) {
            $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
            $this->getLayout()->createBlock('forum/captcha_zend')->setFormId($formId)->setIsAjax(true)->toHtml();
            $this->getResponse()->setBody(json_encode(array('imgSrc' => $captchaModel->getImgSrc())));
        }
        $this->setFlag('', self::FLAG_NO_POST_DISPATCH, true);
    }
}