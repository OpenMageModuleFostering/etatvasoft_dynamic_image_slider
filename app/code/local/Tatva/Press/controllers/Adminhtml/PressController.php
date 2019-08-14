<?php

class Tatva_Press_Adminhtml_PressController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('press/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('press/press')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('press_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('press/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('press/adminhtml_press_edit'))
				->_addLeft($this->getLayout()->createBlock('press/adminhtml_press_edit_tabs'));
			if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
				$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
			}
			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('press')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			if(isset($_FILES['displaypicture']['name']) && $_FILES['displaypicture']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('displaypicture');
					
					// Any extention would work
	           		$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
					$filedet = pathinfo($_FILES['displaypicture']['name']);
							
					// We set media/press as the upload dir
					$path = Mage::getBaseDir('media') . DS .'press'.DS;
					$filedet['displaypicture'] = str_replace(" ","",$filedet['filename']);
					$uploader->save($path, str_replace(" ","_",$filedet['displaypicture'].time().'.'.$filedet['extension']));
					// actual path of image
                    $imageUrl = Mage::getBaseDir('media').DS."press".DS.$filedet['displaypicture'].time().'.'.$filedet['extension'];

                    // path of the resized image to be saved
                    // here, the resized image is saved in media/resized folder
                    $imageResized = Mage::getBaseDir('media').DS."press".DS."thumbnail".DS.$filedet['displaypicture'].time().'.'.$filedet['extension'];
			$store = Mage::app()->getStore();
			$code  = $store->getCode();
                    // resize image only if the image file exists and the resized image file doesn't exist
                    // the image is resized proportionally with the width/height 135px
                    if (!file_exists($imageResized)&&file_exists($imageUrl)) :
                        $imageObj = new Varien_Image($imageUrl);
                        $imageObj->constrainOnly(TRUE);
                        $imageObj->keepAspectRatio(TRUE);
                        $imageObj->keepFrame(FALSE);
                        $imageObj->resize(Mage::getStoreConfig('press/press/imagewidth',$code),Mage::getStoreConfig('press/press/imageheight',$code));
                        $imageObj->save($imageResized);
                    endif;
					
				} catch (Exception $e) {
		      		Mage::getSingleton('adminhtml/session')->addError('Only .jpg, .jpeg, .png, .gif file extension is allowed for Display Picture');
                	Mage::getSingleton('adminhtml/session')->setFormData($data_files);
                	$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                	return;
		        }
	        
		        //this way the name is saved in DB
	  			$data['displaypicture'] = str_replace(" ","_",$filedet['displaypicture'].time().'.'.$filedet['extension']);
				
			}
			
			if(isset($_FILES['pdffile']['name']) && $_FILES['pdffile']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader1 = new Varien_File_Uploader('pdffile');
					
					// Any extention would work
	           		$uploader1->setAllowedExtensions(array('pdf'));
					$uploader1->setAllowRenameFiles(false);
					$uploader1->setFilesDispersion(false);
					$filedet1 = pathinfo($_FILES['pdffile']['name']);
					$filedet1['pdffile'] = str_replace(" ","",$filedet1['filename']);	
						
					// We set media/press as the upload dir
					$path = Mage::getBaseDir('media') . DS .'press'.DS.'pdf'.DS;
					
					$uploader1->save($path, str_replace(" ","_",$filedet1['pdffile'].time().'.'.$filedet1['extension']));
					
				} catch (Exception $e) {
		      		Mage::getSingleton('adminhtml/session')->addError('Only .pdf file extension is allowed for Attachement');
                	Mage::getSingleton('adminhtml/session')->setFormData($data_files);
                	$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                	return;
		        }
	        
		        //this way the name is saved in DB
	  			$data['pdffile'] = str_replace(" ","_",$filedet1['pdffile'].time().'.'.$filedet1['extension']);
				
			}
			
			$model = Mage::getModel('press/press');
			$model1 = Mage::getModel('press/press_store');
			
			
				$data['store_id'] = $value;
				$model->setData($data)->setId($this->getRequest()->getParam('id'));
			
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				
				$model->save();
				$_press_id = $model['press_id'];
				$_store = $model['stores'];
				if(!$this->getRequest()->getParam('id'))
					Mage::getResourceModel('press/press')->insert($_press_id,$_store);
				else
					Mage::getResourceModel('press/press')->insert($_press_id,$_store,$this->getRequest()->getParam('id'));
					
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('press')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('press')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('press/press');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $pressIds = $this->getRequest()->getParam('press');
        if(!is_array($pressIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($pressIds as $pressId) {
                    $press = Mage::getModel('press/press')->load($pressId);
                    $press->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($pressIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $pressIds = $this->getRequest()->getParam('press');
        if(!is_array($pressIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($pressIds as $pressId) {
                    $press = Mage::getSingleton('press/press')
                        ->load($pressId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($pressIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'press.csv';
        $content    = $this->getLayout()->createBlock('press/adminhtml_press_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'press.xml';
        $content    = $this->getLayout()->createBlock('press/adminhtml_press_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}