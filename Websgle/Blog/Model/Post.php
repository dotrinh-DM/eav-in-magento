<?php

class Websgle_Blog_Model_Post extends Mage_Core_Model_Abstract
{
    const ENTITY = 'websgle_blog_post';
    protected $_eventPrefix = 'websgle_blog';
    protected $_eventObject = 'post';
 
    function _construct()
    {
        $this->_init('websgle_blog/post');
    }
}
