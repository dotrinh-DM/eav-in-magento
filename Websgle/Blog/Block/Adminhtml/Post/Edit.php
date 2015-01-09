<?php

class Websgle_Blog_Block_Adminhtml_Post_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_post';
        $this->_mode = 'edit';

    }

    public function getHeaderText()
    {
        if (Mage::registry('post_data') && Mage::registry('post_data')->getId())
        {
            return Mage::helper('blog')->__('Edit Post "%s"', $this->htmlEscape(Mage::registry('post_data')->getTitle()));
        } else {
            return Mage::helper('blog')->__('New Post');
        }
    }
}