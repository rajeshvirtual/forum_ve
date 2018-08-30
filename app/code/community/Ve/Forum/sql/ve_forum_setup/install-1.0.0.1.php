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

$installer = $this;
$installer->startSetup();
$installer->run("
     
-- DROP TABLE IF EXISTS {$this->getTable('cat')};
   CREATE TABLE {$this->getTable('cat')} (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `roleid` varchar(255) NOT NULL,
   PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
     
");


$installer->run("
     
-- DROP TABLE IF EXISTS {$this->getTable('forum')};
   CREATE TABLE {$this->getTable('forum')} (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forumcategory` varchar(255) NOT NULL,
  `parentcategory` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `store` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
     
");


$installer->run("
     
-- DROP TABLE IF EXISTS {$this->getTable('qa')};
   CREATE TABLE {$this->getTable('qa')} (
   `qa_id` int(11) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(500) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `qst_id` varchar(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`qa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
     
");
$installer->endSetup();
?>


