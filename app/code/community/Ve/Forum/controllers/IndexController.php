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
class Ve_Forum_IndexController extends Mage_Core_Controller_Front_Action{
	
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Forum Topic"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("forum topic", array(
                "label" => $this->__("Forum Topic"),
                "title" => $this->__("Forum Topic")
		   ));

      $this->renderLayout(); 
	  
    }
	
	  public function newAction()
	  {
		if ($this->getRequest()->isPost()){
		$int2 = $this->getRequest()->getPost('topic_id');
		$_data = $this->getRequest()->getPost();
		$_captcha = Mage::getModel('customer/session')->getData('form-validate-captcha_word');
		if ($_captcha['data'] == $_data['captcha']['form-validate-captcha']) {
		$int1 = $this->getRequest()->getPost('questions');
		$int2 = $this->getRequest()->getPost('topic_id');
		$int3 = $this->getRequest()->getPost('email');
		$int4 = $this->getRequest()->getPost('status'); 
		$int5 = $this->getRequest()->getPost('store_id');
		$int6 = $this->getRequest()->getPost('ctype'); 	
		$int7 = $this->getRequest()->getPost('product');
		$int8 = $this->getRequest()->getPost('date');
		$connection = Mage::getSingleton('core/resource')->getConnection('core_write');$connection->beginTransaction();
		$fields['question'] = $int1;
		$fields['topic_id'] = $int2;
		$fields['useremail'] = $int3;
		$fields['status'] = $int4;
		$fields['name'] = $int5;
		$fields['type'] = $int6;
		$fields['Product'] = $int7;
		$fields['date'] = $int8;
		$connection->insert('qa', $fields);
		$connection->commit();
		Mage::getSingleton('core/session')->addSuccess('You have successfully post a question, this will appear soon after a short review.'); 
		$emailTemplate = Mage::getModel('core/email_template')->loadDefault('custom_email');

//Getting the Store E-Mail Sender Name.
$senderName = Mage::getStoreConfig('trans_email/ident_general/name');
//Getting the Store General E-Mail.
$senderEmail = $int3;
$customerEmail = Mage::getStoreConfig('trans_email/ident_general/email');
//Variables for Confirmation Mail.
$emailTemplateVariables = array();
$emailTemplateVariables['name'] = $int5;
$emailTemplateVariables['email'] = $int3;
$emailTemplateVariables['message'] = $int1;
$emailTemplateVariables['product'] = $int7;
//Appending the Custom Variables to Template.
$processedTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);

//Sending E-Mail to Customers.
$mail = Mage::getModel('core/email')
 ->setToName($senderName)
 ->setToEmail($customerEmail)
 ->setBody($processedTemplate)
 ->setSubject('Subject :')
 ->setFromEmail($senderEmail)
 ->setFromName($senderName)
 ->setType('html');
	$mail->send();
	$this->_redirect('forum/');
	  }    
	  else
	  {
	  Mage::getSingleton('core/session')->addError('Wrong Captcha code entered.'); 
		$url= "forum/index2/?order_id=".$int2."";
		$this->_redirect($url);
		}
}
 }
	public function answerAction()
	  {
		if ($this->getRequest()->isPost()){
		$int8 = $this->getRequest()->getPost('topic_id');
		$_data = $this->getRequest()->getPost();
		$_captcha = Mage::getModel('customer/session')->getData('form-validate-captcha_word');
		if ($_captcha['data'] == $_data['captcha']['form-validate-captcha']) {
		$int1 = $this->getRequest()->getPost('answer');
		$int2 = $this->getRequest()->getPost('ans_id');
		$int3 = $this->getRequest()->getPost('email');
		$int4 = $this->getRequest()->getPost('status'); 
		$int5 = $this->getRequest()->getPost('store_id'); 
		$int6 = $this->getRequest()->getPost('ctype'); 
		$int7 = $this->getRequest()->getPost('product'); 
		$int8 = $this->getRequest()->getPost('topic_id');
		$int9 = $this->getRequest()->getPost('date');
		$connection = Mage::getSingleton('core/resource')->getConnection('core_write');$connection->beginTransaction();
		$fields['answer'] = $int1;
		$fields['ans_id'] = $int2;
		$fields['useremail'] = $int3;
		$fields['status'] = $int4;
		$fields['name'] = $int5;
		$fields['type'] = $int6;
		$fields['qst_id'] = $int2;
		$fields['Product'] = $int7;
		$fields['topic_id'] = $int8;
		$fields['date'] = $int9;
		$connection->insert('qa', $fields);
		$connection->commit();
		$this->loadLayout();
		$this->_title($this->__("Forum Category"));
		//$this->renderLayout();
		Mage::getSingleton('core/session')->addSuccess('You have successfully post an answer, this will appear soon after a short review.');
		$emailTemplate = Mage::getModel('core/email_template')->loadDefault('custom_email');
		//Getting the Store E-Mail Sender Name.
		$senderName = Mage::getStoreConfig('trans_email/ident_general/name');
		//Getting the Store General E-Mail.
		$senderEmail = $int3;
		$customerEmail = Mage::getStoreConfig('trans_email/ident_general/email');
		//Variables for Confirmation Mail.
		$emailTemplateVariables = array();
		$emailTemplateVariables['name'] = $int5;
		$emailTemplateVariables['email'] = $int3;
		$emailTemplateVariables['message'] = $int1;
		$emailTemplateVariables['product'] = $int7;
		//Appending the Custom Variables to Template.
		$processedTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);
		//Sending E-Mail to Customers.
		$mail = Mage::getModel('core/email')
		->setToName($senderName)
		->setToEmail($customerEmail)
		->setBody($processedTemplate)
		->setSubject('Subject :')
		->setFromEmail($senderEmail)
		->setFromName($senderName)
		->setType('html');
		$mail->send();
		$url= "forum/";
		$this->_redirect($url);
	  }
	   else
	  {
	  Mage::getSingleton('core/session')->addError('Wrong Captcha code entered.');
	  
		$url= "forum/index2/?order_id=".$int8."";
		$this->_redirect($url);
		}
	  }
	  }
	
	public function refreshAction()  
    {  
        $formId = $this->getRequest()->getPost('formId', false);  
        if ($formId) {  
            $captchaModel = Mage::helper('forum')->getCaptcha($formId);  
            $this->getLayout()->createBlock('ve_forum/captcha_zend')->setFormId($formId)->setIsAjax(true)->toHtml();  
            $this->getResponse()->setBody(json_encode(array('imgSrc' => $captchaModel->getImgSrc())));  
        }  
        $this->setFlag('', self::FLAG_NO_POST_DISPATCH, true);  
    }  
	
}