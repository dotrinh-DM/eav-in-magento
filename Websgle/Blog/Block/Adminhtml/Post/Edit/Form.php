<?php

class Websgle_Blog_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id'),
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset(
            'general',array(
                'legend' => $this->__('Form EAV')
            )
        );

        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label'     => Mage::helper('blog')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'title'      => 'Tiêu đề',
            'note'     => Mage::helper('blog')->__('The name of post.'),
        ));

        $fieldset->addField('url', 'text', array(
            'name' => 'url',
            'label'     => Mage::helper('blog')->__('URL'),
            'class'     => 'required-entry',
            'required'  => true,
            'url'      => 'url'
        ));

        $fieldset->addField('image', 'file', array(
            'name' => 'image',
            'label'     => Mage::helper('blog')->__('Upload Images'),
            'class'     => 'required-entry',
            'required'  => true,
        ));

        $fieldset->addField('content', 'textarea', array(
            'name' => 'content',
            'label'     => Mage::helper('blog')->__('Content'),
            'class'     => 'required-entry',
            'required'  => true,
            'content'      => 'content'
        ));

        $fieldset->addField('is_active', 'select', array(
            'name'     => 'is_active',
            'label'     => Mage::helper('blog')->__('is active'),
            'class'     => 'required-entry',
            'required'  => true,
            'options'   => array(
                1 => 'Enabled',
                0 => 'Disabled',
            ),
        ));

        $form->setValues(Mage::registry('post_data')->getData());
        return parent::_prepareForm();
    }
}