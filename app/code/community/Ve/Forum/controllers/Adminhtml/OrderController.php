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
include(‘Mage/Adminhtml/controllers/Sales/OrderController.php’);
class Ve_Forum_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Forum Topic'))->_title($this->__('Manage Forum'));
        $this->loadLayout();
        $this->_setActiveMenu('forum/forum');
        $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_sales_order'));
        $this->renderLayout();
		
    }
 
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('forum/adminhtml_sales_order_grid')->toHtml()
        );
    }
	
	 public function grid1Action()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('forum/adminhtml_manage_question_grid')->toHtml()
        );
    }
	 public function grid2Action()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('forum/adminhtml_managea_answer_grid')->toHtml()
        );
    }
	 public function grid3Action()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('forum/adminhtml_managecat_category_grid')->toHtml()
        );
    }
	
 
    public function exportInchooCsvAction()
    {
        $fileName = 've_forum_topic.csv';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
 
    public function exportInchooExcelAction()
    {
        $fileName = 've_forum_topic.xml';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
	
	 public function exportInchooCsv1Action()
    {
        $fileName = 've_forum_category.csv';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_managecat_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
 
    public function exportInchooExcel1Action()
    {
        $fileName = 've_forum_category.xml';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_managecat_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
	 public function exportInchooCsv2Action()
    {
        $fileName = 've_forum_answer.csv';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_managea_answer_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
 
    public function exportInchooExcel2Action()
    {
        $fileName = 've_forum_answer.xml';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_managea_answer_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
	 public function exportInchooCsv3Action()
    {
        $fileName = 've_forum_question.csv';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_manage_question_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
 
    public function exportInchooExcel3Action()
    {
        $fileName = 've_forum_question.xml';
        $grid = $this->getLayout()->createBlock('forum/adminhtml_manage_question_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
	 public function queAction()
    {
        $this->_title($this->__('Manage Question'))->_title($this->__('Manage Question'));
        $this->loadLayout();
        $this->_setActiveMenu('forum/forum');
        $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_manage_question'));
        $this->renderLayout();
		
    }
	
	public function ansAction()
    {
        $this->_title($this->__('Manage Answer'))->_title($this->__('Manage Answer'));
        $this->loadLayout();
        $this->_setActiveMenu('forum/forum');
        $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_managea_answer'));
        $this->renderLayout();
		
    }
	public function mcatAction()
    {
        $this->_title($this->__('Manage Answer'))->_title($this->__('Manage Answer'));
        $this->loadLayout();
        $this->_setActiveMenu('forum/forum');
        $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_managecat_category'));
        $this->renderLayout();
		
    }
	public function deletemcatAction()
    {
    $int1 = $this->getRequest()->getParam('id'); 
	$connection = Mage::getSingleton('core/resource')->getConnection('core_write');  
	$connection->beginTransaction(); 
	$condition = $connection->quoteInto('cat_id=?', $int1);  
    $connection->delete('cat', $condition);  
	$connection->commit(); 
	$this->loadLayout();
    $this->_setActiveMenu('forum/forum');
    $this->_addContent($this->getLayout()->createBlock('forum/adminhtml_managecat_category'));
    $this->renderLayout();
	}
	
	public function newAction() {
		$this->loadLayout();
		$this->renderLayout();
	}
 
	protected function _isAllowed()
	{
    return true;
	}
 
}
?>