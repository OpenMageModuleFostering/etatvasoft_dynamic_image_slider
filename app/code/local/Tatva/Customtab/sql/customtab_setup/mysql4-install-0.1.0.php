<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('customtab')};
CREATE TABLE {$this->getTable('customtab')} (
  `customtab_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email_id` varchar(255) NOT NULL default '',
  `contactno`varchar(255) NOT NULL default '',
 
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`customtab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 