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
class Ve_Forum_Adminhtml_ForumbackendController extends Mage_Adminhtml_Controller_Action
{
	  public function gridAction()
        {
        $this->loadLayout();
        $this->getResponse()->setBody(
        $this->getLayout()->createBlock('orderfeedback/adminhtml_orderfeedback_grid')->toHtml()
        );
        }
	
		public function indexAction()
		{
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('forum/adminhtml_form2_edit'))->_addLeft($this->getLayout()->createBlock('forum/adminhtml_form2_edit_tabs'));
		$this->renderLayout();
		}
		
	public function addAction()
		{
	    $this->loadLayout();
		$this->renderLayout();
		}
	public function queAction()
		{
	    $this->loadLayout();
	    $this->_title($this->__("Forum Category"));
	    $this->renderLayout();
		}
	public function ansAction()
		{
	    $this->loadLayout();
	    $this->_title($this->__("Forum Category"));
	    $this->renderLayout();
		}

		public function panneAction()
		{
		if ($this->getRequest()->isPost()){
		 $int1 = $this->getRequest()->getPost('topic');
		 $int2 = $this->getRequest()->getPost('pc');
		 $int3 = $this->getRequest()->getPost('textfield2');
		 $int4 = $this->getRequest()->getPost('textfield3');
		 $int5 = $this->getRequest()->getPost('textfield4');
		 $int6 = $this->getRequest()->getPost('userid');
		 $int7 = $this->getRequest()->getPost('date');
		$_category = Mage::getModel('catalog/category')->load($int2);
		$categoryName = $_category->getName();
		$fields['forumcategory'] = $int1;
		$fields['parentcategory'] = $categoryName;
		$fields['subcategory'] = $int3;
		$fields['product'] = $int4;
		$fields['message'] = $int5;
		$fields['userid'] = $int6;
		$fields['date'] = $int7;
		$model = Mage::getModel('ve_forum/forum');
		$model = Mage::getModel('ve_forum/forum')->setData($fields); 
        $model->save();
		Mage::getSingleton('core/session')->addSuccess('New Topic has been added Successfully'); 
		$this->loadLayout();
		$this->_title($this->__("Forum Category"));
		$this->renderLayout();
		}
	
    
	}
	
	public function editAction()
	{
		
	$this->loadLayout();
    $this->renderLayout();
	}
	

	
	public function edit1Action() 
	{
	if ($this->getRequest()->isPost()){
	 $int1 = $this->getRequest()->getPost('questions');
	 $int2 = $this->getRequest()->getPost('status'); 
	 $int3 = $this->getRequest()->getPost('id'); 
	 $int4 = $this->getRequest()->getPost('email');
	 $connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');
	 $connectionWrite->beginTransaction();
	$data = array();
	$data['question'] = $int1;
	$data['status'] = $int2;
	$where = $connectionWrite->quoteInto('qa_id=?', $int3);
	$connectionWrite->update('qa', $data, $where);
	$connectionWrite->commit(); 
	Mage::getSingleton('core/session')->addSuccess('Your change has been updated successfully'); 
	$emailTemplate = Mage::getModel('core/email_template')->loadDefault('custom_email_front');
	//Getting the Store E-Mail Sender Name.
	$senderName = Mage::getStoreConfig('trans_email/ident_general/name');
	//Getting the Store General E-Mail.
	$senderEmail = Mage::getStoreConfig('trans_email/ident_general/email');
	$customerEmail = $int4;
	//Variables for Confirmation Mail.s
	$emailTemplateVariables = array();
	$emailTemplateVariables['message'] = $int1;
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
	$this->loadLayout();
    $this->_setActiveMenu('forum/forum');
    $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_manage_question'));
    $this->renderLayout();
	}
	}
	
	public function edit2Action() 
	{
		
	$this->loadLayout();
    $this->renderLayout();
	
	}
	
	public function edit3Action()
	{
	 if ($this->getRequest()->isPost()){
	 $int1 = $this->getRequest()->getPost('answer');
	 $int2 = $this->getRequest()->getPost('status'); 
	 $int3 = $this->getRequest()->getPost('id'); 
	 $int4 = $this->getRequest()->getPost('email');
	 $connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');
	 $connectionWrite->beginTransaction();
	$data = array();
	$data['answer'] = $int1;
	$data['status'] = $int2;
	$where = $connectionWrite->quoteInto('qa_id=?', $int3);
	$connectionWrite->update('qa', $data, $where);
	$connectionWrite->commit(); 
	Mage::getSingleton('core/session')->addSuccess('Your change has been updated successfully'); 
	$emailTemplate = Mage::getModel('core/email_template')->loadDefault('custom_email_front');
	//Getting the Store E-Mail Sender Name.
	$senderName = Mage::getStoreConfig('trans_email/ident_general/name');
	//Getting the Store General E-Mail.
	$senderEmail = Mage::getStoreConfig('trans_email/ident_general/email');
	$customerEmail = $int4;
	//Variables for Confirmation Mail.
	$emailTemplateVariables = array();
	$emailTemplateVariables['message'] = $int1;
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
        $this->loadLayout();
        $this->_setActiveMenu('forum/forum');
        $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_managea_answer'));
        $this->renderLayout();
	}
	
	}
	public function kjAction()
	{ 
	 if ($this->getRequest()->isPost()){
		$int1 = $this->getRequest()->getPost('store');
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');
		$write = Mage::getSingleton('core/resource')->getConnection('core_write'); 
		$result = $read->fetchAll("select root_category_id from core_store_group");
		  foreach($result as $cat) {
			 $sw=$cat['root_category_id'];
					}
		$optionCat =  Mage::getModel('catalog/category')->load($sw);
		$subcategories = $optionCat->getChildren();
		$options = '<option value="">No Parent Category</option>';
		  foreach(explode(',',$subcategories) as $subcategory) {
				$category = Mage::getModel('catalog/category')->load($subcategory);
				$options .= '<option value="'.$category->getId().'">'.$category->getName().'</option>';
		  }
		echo $options;
		
		}
	}
	public function jkkjAction()
	{ 
	 if ($this->getRequest()->isPost()){
		$int1 = $this->getRequest()->getPost('pc');
	
		$optionCat =  Mage::getModel('catalog/category')->load($int1);
		$subcategories = $optionCat->getChildren();
		$options = '<option value="">No Sub Category</option>';
		if(!empty($subcategories)) {
		  foreach(explode(',',$subcategories) as $subcategory) {
				$category = Mage::getModel('catalog/category')->load($subcategory);
				$options .= '<option value="'.$category->getId().'">'.$category->getName().'</option>';
		  }
		}
		//echo $options;
			$categoryIds = array($int1);
			
			$collection = Mage::getModel('catalog/product')->getCollection()->joinField('category_id', 'catalog/category_product', 'category_id', 'product_id = entity_id', null, 'left')->addAttributeToSelect('*')->addAttributeToFilter('category_id', array('in' => $categoryIds));
			$_collectionSize = $collection->count();
			$products = '<option value="">No Products</option>';
			foreach ($collection as $_product){ 
				//echo $_product->getName();	
				$products .= '<option value="'.$_product->getName().'">'.$_product->getName().'</option>';
			}
			$data[0] = $options;
			$data[1] = $products;
			echo json_encode($data);
			exit;
		}
	}
	
	public function workjkkjAction()
	{ 
	
	 if ($this->getRequest()->isPost()){
		$int1 = $this->getRequest()->getPost('textfield2');
		
		$categoryIds = array($int1);
			$collection = Mage::getModel('catalog/product')->getCollection()->joinField('category_id', 'catalog/category_product', 'category_id', 'product_id = entity_id', null, 'left')->addAttributeToSelect('*')->addAttributeToFilter('category_id', array('in' => $int1));
			$_collectionSize = $collection->count();
			$products = '<option value="">No Products</option>';
			foreach ($collection as $_product){ 
				//echo $_product->getName();	
				$products .= '<option value="'.$_product->getName().'">'.$_product->getName().'</option>';
			}
			echo $products; 
			exit;
			

	}
	}

	
	public function workjkkjjkAction()
	{ 
	   if ($this->getRequest()->isPost()){
		$int1 = $this->getRequest()->getPost('store');
		$category = '<option value="">No Forum Category</option>';
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');
		$write = Mage::getSingleton('core/resource')->getConnection('core_write'); 
		$result2 = $read->fetchAll("select * from cat");
           foreach($result2 as $cat2) {
			 $category .= '<option value="'.$cat2['name'].'">'.$cat2['name'].'</option>';
				
					}
	echo $category; 

	}
	}

	public function DeleteAction() 
	{
	
	$int1 = $this->getRequest()->getParam('id'); 
	$connection = Mage::getSingleton('core/resource')->getConnection('core_write');  
	$connection->beginTransaction(); 
	$condition = $connection->quoteInto('qa_id=?', $int1);  
    $connection->delete('qa', $condition);  
	$connection->commit(); 
	$this->loadLayout();
    $this->_setActiveMenu('forum/forum');
    $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_manage_question_grid'));
    $this->renderLayout();
	}
	
	
	public function DeleteansAction() 
	{
	
	$int1 = $this->getRequest()->getParam('id');
	$connection = Mage::getSingleton('core/resource')->getConnection('core_write');  
	$connection->beginTransaction(); 
	$condition = $connection->quoteInto('qa_id=?', $int1);  
    $connection->delete('qa', $condition);  
	$connection->commit(); 
	$this->loadLayout();
    $this->_setActiveMenu('forum/forum');
    $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_managea_answer_grid'));
    $this->renderLayout();
	}

    public function manageeditAction() 
	{
	$this->loadLayout();
    $this->renderLayout();
	}
	
	public function updateAction()
	{
	if ($this->getRequest()->isPost()){
		$int1 = $this->getRequest()->getPost('topic');
		$int2 = $this->getRequest()->getPost('pc');
		$int3 = $this->getRequest()->getPost('textfield2');
		$int4 = $this->getRequest()->getPost('textfield3');
		$int5 = $this->getRequest()->getPost('textfield4');
		$int6 = $this->getRequest()->getPost('userid');
		$int7 = $this->getRequest()->getPost('store');
		$int8 = $this->getRequest()->getPost('updateid');
		$_category = Mage::getModel('catalog/category')->load($int2);
		$categoryName = $_category->getName();
		$connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');
		$connectionWrite->beginTransaction();
		$data = array();
		$data['forumcategory'] = $int1;
		$data['parentcategory'] = $categoryName;
		$data['subcategory'] = $int3;
		$data['product'] = $int4;
		$data['message'] = $int5;
		$data['store'] = $int7;
		$where = $connectionWrite->quoteInto('forum_id=?', $int8);
		$connectionWrite->update('forum', $data, $where);
		$connectionWrite->commit();  
		Mage::getSingleton('core/session')->addSuccess('Topic has been updated successfully'); 
		$this->loadLayout();
		$this->_setActiveMenu('forum/forum');
		$this->_addContent($this->getLayout()->createBlock('forum/adminhtml_sales_order'));
		$this->renderLayout();
	}
	
	}
	public function DeletetopicAction() 
	{
		
	$int1 = $this->getRequest()->getParam('id'); 
	$connection = Mage::getSingleton('core/resource')->getConnection('core_write');  
	$connection->beginTransaction(); 
	$condition = $connection->quoteInto('forum_id=?', $int1);  
    $connection->delete('forum', $condition);  
	$connection->commit(); 
	$this->loadLayout();
    $this->_setActiveMenu('forum/forum');
    $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_sales_order'));
    $this->renderLayout();
	}
	
	public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
		$int1 = $this->getRequest()->getPost('category');
		$admin_user_session = Mage::getSingleton('admin/session');
		$adminuserId = $admin_user_session->getUser()->getUserId();
		$userArray = Mage::getSingleton('admin/session')->getData();
		$user = Mage::getSingleton('admin/session'); 
		$userUsername = $user->getUser()->getUsername();
		$fields['name'] = $int1;
		$fields['username'] = $userUsername;
		$fields['userid'] = $adminuserId;
		$model = Mage::getModel('ve_forum/cat');
		$model = Mage::getModel('ve_forum/cat')->setData($fields); 
        $model->save();
		Mage::getSingleton('core/session')->addSuccess('New Category added successfully'); 
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('forum/adminhtml_form2_edit'))->_addLeft($this->getLayout()->createBlock('forum/adminhtml_form2_edit_tabs'));
		
		$this->renderLayout();
                }
}

	protected function _isAllowed()
	{
    return true;
	}

}