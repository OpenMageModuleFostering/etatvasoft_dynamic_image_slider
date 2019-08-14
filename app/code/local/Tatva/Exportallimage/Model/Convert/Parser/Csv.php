<?php 	
class Tatva_Exportallimage_Model_Convert_Parser_Csv extends Mage_Dataflow_Model_Convert_Parser_Csv
{

    /**
     * Read data collection and write to temporary file
     *
     * @return Mage_Dataflow_Model_Convert_Parser_Csv
     */
	public function unparse()
	{
	    $batchExport = $this->getBatchExportModel()->setBatchId($this->getBatchModel()->getId());
	    $fieldList = $this->getBatchModel()->getFieldList();
		$fieldList['add_images'] = 'add_images';
	    $batchExportIds = $batchExport->getIdCollection();
		
		$io = $this->getBatchModel()->getIoAdapter();
        $io->open();

	    if (!$batchExportIds)
		{
            $io->write("");
            $io->close();
            return $this;
        }

	    if ($this->getVar('fieldnames')) 
		{
	        $csvData = $this->getCsvString($fieldList);
	        $io->write($csvData);
	    }

		$product = new Mage_Catalog_Model_Product();

	    foreach ($batchExportIds as $batchExportId) 
		{
	        $csvData = array();
	        $batchExport->load($batchExportId);
	        $row = $batchExport->getBatchData();
			//$product->setSku($row['sku']);

			$productid = Mage::getModel('catalog/product')->getIdBySku($row['sku']);

			// Initiate product model
			$product = Mage::getModel('catalog/product');

			// Load specific product whose tier price want to update
			$product->load($productid);
			$smallImage = $product->getSmallImage();
			$image = $product->getImage();
			$thumb = $product->getThumbnail();
			$mediaGallery = $product->getMediaGallery();
			$mediaGallery = $mediaGallery['images'];
	   
			$add_images = '';

			foreach ($mediaGallery as $add_image)
			{
				if ($add_image['file'] != $smallImage && $add_image['file'] != $image && $add_image['file'] != $thumb)
					$add_images .= $add_image['file'].';';
			}
	
			$row['add_images'] =  $add_images;
		   
	        foreach ($fieldList as $field) {
	            $csvData[] = isset($row[$field]) ? $row[$field] : '';
	        }
	
	        $csvData = $this->getCsvString($csvData);
	        $io->write($csvData);
	    }

	    $io->close();
	    return $this;
	}

}