<?php

class Websgle_Blog_Adminhtml_PostController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Blog Manager'));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post'));
        $this->renderLayout();
    }


//    public function editAction()
//    {
//
//        $id = $this->getRequest()->getParam('id');
//        $model = Mage::getModel('wensgle_blog/post')->load($id);
//        if ($model->getId() || $id == 0) {
//            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
//            if ($data) {
//                $model->setData($data)->setId($id);
//            }
//        }
//        else {
//            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('blog')->__('Example does not exist'));
//            $this->_redirect('*/*/');
//        }
//        Mage::register('post_data', $model);
//        $this->loadLayout();
//        $this->_setActiveMenu('blog');
//        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post_edit'));
//        $this->_addLeft($this->getLayout()->createBlock('blog/adminhtml_post_edit_tabs'));
//        $this->renderLayout();
//
//
//    }
//
//    public function saveAction()
//    {
//        $data = $this->getRequest()->getPost();
//        $postId = $this->getRequest()->getParam('id');
//        try {
//            $postModel = Mage::getModel('websgle_blog/post')->setData($data);
//            if($postId){
//                $postModel->setId($postId);
//            }
//            $postModel->save();
//            $message = $this->__('Post was successfully saved.');
//            Mage::getSingleton('adminhtml/session')->addSuccess($message);
//            Mage::getSingleton('adminhtml/session')->setFormData(false);
//            $this->_redirect('*/*/');
//        } catch (Exception $e) {
//            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
//            Mage::getSingleton('adminhtml/session')->setFormData($data);
//        }
//    }
//
//    public function deleteAction()
//    {
//        if ($id = $this->getRequest()->getParam('id')) {
//            try {
//                $model = Mage::getModel('websgle_blog/post');
//                $model->setId($id);
//                $model->delete();
//                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('blog')->__('The post has been deleted.'));
//                $this->_redirect('*/*/');
//                return;
//            }
//            catch (Exception $e) {
//                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
//                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
//                return;
//            }
//        }
//        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the post to delete.'));
//        $this->_redirect('*/*/');
//    }

//    public function massDeleteAction()
//    {
//        $postIds = $this->getRequest()->getParam('post');
//        if (!is_array($postIds)) {
//            Mage::getSingleton('adminhtml/session')->addError(
//                Mage::helper('adminhtml')->__('Please select post(s)')
//            );
//        } else {
//            try {
//                $products = 0;
//                foreach ($vendorIds as $vendorId) {
//                    $vendor = Mage::getModel('vendors/vendor')->load($vendorId);
//                    if ($products += $this->deleteProduct($vendor)) {
//                        $vendor->delete();
//                    }
//                }
//                Mage::getSingleton('adminhtml/session')->addSuccess(
//                    Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($vendorIds))
//                );
//                Mage::getSingleton('adminhtml/session')->addSuccess(
//                    Mage::helper('adminhtml')->__('%d product(s) were successfully deleted', $products)
//                );
//            } catch (Exception $e) {
//                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
//            }
//        }
//        $this->_redirect('*/*/index');
//    }
}