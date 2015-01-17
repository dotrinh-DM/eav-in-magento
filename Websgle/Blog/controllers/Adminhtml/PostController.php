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
        if ($_FILES['image']['name'] != '') {
            $path = Mage::getBaseDir('media') . DS . 'blog';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $data['image'] = $this->uploadImgAction($_FILES['image']['name'], 'image', $path);
        }

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

    public function uploadImgAction($files_name, $prefix_name, $path)
    {
        try {
            $fileName = $files_name;
            $fileExt = strtolower(substr(strrchr($fileName, "."), 1));
            $fileNamewoe = uniqid($prefix_name);
            $fileName = str_replace(' ', '', $fileNamewoe) . '.' . $fileExt;
            $uploader = new Varien_File_Uploader($prefix_name);
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(false);
            $uploader->setFilesDispersion(false);
            $uploader->save($path, $fileName);
            return $fileName;
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('websgle_blog/post');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('blog')->__('The post has been deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the post to delete.'));
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $postIds = $this->getRequest()->getParam('posts_id');
        if (!is_array($postIds)) {
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('adminhtml')->__('Please select item(s)')
            );
        } else {
            try {
                foreach ($postIds as $postId) {
                    $post_data = Mage::getModel('websgle_blog/post')->load($postId);
                    $post_data->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Items(s) were successfully deleted'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

}