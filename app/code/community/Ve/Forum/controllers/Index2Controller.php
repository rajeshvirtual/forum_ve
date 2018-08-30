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
class Ve_Forum_Index2Controller extends Mage_Core_Controller_Front_Action
{
	
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("View Topic"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("view", array(
                "label" => $this->__("View Topic"),
                "title" => $this->__("View Topic"),
                "link"  => Mage::getBaseUrl()
		   ));
	  $this->renderLayout(); 
								   }
	
		
	public function loadAction()
	{
	$int1 = $this->getRequest()->getPost('getresult');
	$int2 = $this->getRequest()->getPost('getid'); 
	$read = Mage::getSingleton('core/resource')->getConnection('core_read');
	$write = Mage::getSingleton('core/resource')->getConnection('core_write'); 
	$AllQuestions = $read->fetchAll("SELECT * FROM  qa where topic_id = '$int2' and status=1");
	
	function category_list($ans_id = 0, $AllQuestions = array()) {
	   // build our category list only once
	   $cats = $AllQuestions;
	   // populate a list items array
	   $list_items = array();
	   foreach($cats as $cat) {
	  // echo "<pre>"; print_r($cat); echo "</pre>"; 
	    if ($cat['type']==1){
		  $src= Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA)."forum/login-user.png"; 
		  }
		  else { 
		  $src= Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA)."forum/logout-user.png"; 
		  }
		  
		  // if not a match, move on
		  if (( int )$cat['ans_id'] !== ( int)$ans_id) {
			 continue;
		  }
		  // open the list item
		  if($cat['ans_id'] != 0){
			// This is an Answer/ Reply
			$list_items[] = '<div class="forum-comment-reply">';
			$list_items[] = '<div class="user-profile-pic">';
			$list_items[] = '<img class="avatar avatar-50 photo" src="'.$src.'" width="50" height="50"  alt="" />';
			$list_items[] = '</div>';
			$list_items[] = '<div class="user-comment-box">';
			$list_items[] = '<h5>By-<b style="color:#136A76;">' . $cat['name'] . '</b></h5>';
			$list_items[] = '<p>' . $cat['answer'] . '</p>';
			$list_items[] = '</div>';
			$list_items[] = '<div class="forum-btn"><a href="#" class="btn btn-reply" id="'.$cat['qa_id'].'">Reply</a></div>';
			$list_items[] = '<div class="clear"></div>';
			$list_items[] = '</div>';
		  } else {
			// This is a Question
			$list_items[] = '<div class="forum-comment-section">';
			$list_items[] = '<div class="user-profile-pic">';
			$list_items[] = '<img class="avatar avatar-50 photo" src="'.$src.'" width="50" height="50  alt=" "="">';
			$list_items[] = '</div>';
			$list_items[] = '<div class="user-comment-box">';
			$list_items[] = '<h5>By-<b style="color:#136A76;">' . $cat['name'] . '</b></h5>';
			$list_items[] = '<p>Question : ' . $cat['question'] . '</p>';
			$list_items[] = '</div>';
			$list_items[] = '<div class="forum-btn"><a href="#" class="btn btn-comment" id="'.$cat['qa_id'].'">Comment</a></div>';
			$list_items[] = '<div class="clear"></div>';
			$list_items[] = '</div>';
		  }
		  
		  $list_items[] = category_list($cat['qa_id'], $AllQuestions);
		  // close the list item
		  // $list_items[] = '</div>';
	   }
	   // convert to a string
	   $list_items = implode('', $list_items);
	   // if empty, no list items!
	   if ('' == trim($list_items)) {
		  return '';
	   }
	   // ...otherwise, return the list
	   return '<div class="new" style="margin-left:30px !important;">' . $list_items . '</div>';
	   // return '<ul style="margin-left:15px;">' . $list_items . '</ul>';
	}
	
	$category = category_list('', $AllQuestions);
	echo $category;	
	}	
								   
	
}
	
	 