<?php

$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE `press`
ADD `date` date NOT NULL AFTER `press_id`,
ADD `pdffile` varchar(255) NOT NULL AFTER `displaypicture`,
ADD `pressvideo` varchar(255) NOT NULL AFTER `pdffile`,
    ");

$installer->endSetup(); 