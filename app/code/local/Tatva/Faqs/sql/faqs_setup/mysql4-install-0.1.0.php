<?php

$installer = $this;

$installer->startSetup();

$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('faqs')};
CREATE TABLE IF NOT EXISTS {$this->getTable('faqs')} (
  `faqs_id` int(10) unsigned NOT NULL auto_increment,
  `question` tinytext NOT NULL default '',
  `answer` text NOT NULL default '',
  `creation_time` datetime default NULL,
  `update_time` datetime default NULL,
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`faqs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='FAQ items' AUTO_INCREMENT=1 ;

-- DROP TABLE IF EXISTS {$this->getTable('faqs_store')};
CREATE TABLE `{$this->getTable('faqs_store')}` (
  `faqs_id` int(10) unsigned NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`faqs_id`,`store_id`),
  CONSTRAINT `FK_FAQ_FAQ_STORE_FAQ` FOREIGN KEY (`faqs_id`) REFERENCES `{$this->getTable('faqs')}` (`faqs_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `FK_FAQ_FAQ_STORE_STORE` FOREIGN KEY (`store_id`) REFERENCES `{$this->getTable('core/store')}` (`store_id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='FAQ items to Stores';
");

$installer->endSetup();