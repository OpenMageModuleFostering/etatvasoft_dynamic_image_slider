<?php

class Tatva_Faqs_Helper_Data extends Mage_Core_Helper_Abstract
{
    const PATH_PAGE_HEADING = 'faqs/general/heading';
	const PATH_CMS_HEADING = 'faqs/general/heading_block';
	const PATH_PAGE_HEADING_COMMENT = 'faqs/general/headingcomment';
	const DEFAULT_LABEL = 'Frequently Asked Questions';

	public function getCmsBlockLabel()
	{
		$configValue = Mage::getStoreConfig(self::PATH_CMS_HEADING);
		return strlen($configValue) > 0 ? $configValue : self::DEFAULT_LABEL;
	}

	public function getPageLabel()
	{
		$configValue = Mage::getStoreConfig(self::PATH_PAGE_HEADING);
		return strlen($configValue) > 0 ? $configValue : self::DEFAULT_LABEL;
	}
    public function getLabelComment()
	{
		$configValue = Mage::getStoreConfig(self::PATH_PAGE_HEADING_COMMENT);
		return ($configValue) > 0 ? $configValue : "";
	}
}