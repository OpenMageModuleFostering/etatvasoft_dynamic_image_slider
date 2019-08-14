<?php

$installer = $this;

$installer->startSetup();

$installer->run("

CREATE TABLE `press_store` (
  `press_id` int(11) unsigned NOT NULL,
  `store_id` smallint(5) unsigned NOT NULL,
  KEY `press_id` (`press_id`),
  KEY `store_id` (`store_id`),
  CONSTRAINT `press_store_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `core_store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `press_store_ibfk` FOREIGN KEY (`press_id`) REFERENCES `press` (`press_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 