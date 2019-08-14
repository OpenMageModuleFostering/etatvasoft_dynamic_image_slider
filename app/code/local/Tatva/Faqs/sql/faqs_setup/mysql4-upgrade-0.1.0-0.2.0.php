<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('faqs')};
CREATE TABLE IF NOT EXISTS {$this->getTable('faqs')} (
  `faqs_id` int(11) unsigned NOT NULL auto_increment,
  `question` varchar(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `answer` text NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`faqs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- DROP TABLE IF EXISTS `{$this->getTable('faqs_store')}`;
CREATE TABLE `{$this->getTable('faqs_store')}` (
  `faqs_id` int(10) unsigned NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`faqs_id`,`store_id`),
  CONSTRAINT `FK_FAQ_FAQ_STORE_STORE` FOREIGN KEY (`faqs_id`) REFERENCES `{$this->getTable('faq')}` (`faqs_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `FK_FAQ_FAQ_STORE_STORE` FOREIGN KEY (`store_id`) REFERENCES `{$this->getTable('core/store')}` (`store_id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='FAQ items to Stores';


");

$installer->endSetup();