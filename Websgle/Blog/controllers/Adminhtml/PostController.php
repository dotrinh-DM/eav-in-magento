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


    public function editAction()
    {

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('websgle_blog/post')->load($id);
        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if ($data) {
                $model->setData($data)->setId($id);
            }
        }
        else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('blog')->__('Example does not exist'));
            $this->_redirect('*/*/');
        }
        Mage::register('post_data', $model);
        $this->loadLayout();
        $this->_setActiveMenu('blog');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_post_edit'));
        $this->_addLeft($this->getLayout()->createBlock('blog/adminhtml_post_edit_tabs'));
        $this->renderLayout();


    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $postId = $this->getRequest()->getParam('id');
        try {
            $postModel = Mage::getModel('websgle_blog/post')->setData($data);
            if($postId){
                $postModel->setId($postId);
            }
            $postModel->save();
            $message = $this->__('Post was successfully saved.');
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
            Mage::getSingleton('adminhtml/session')->setFormData(false);
            $this->_redirect('*/*/');
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setFormData($data);
        }
    }
}