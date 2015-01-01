<?php

class Websgle_Blog_Model_Resource_Post_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('websgle_blog/post');
    }
}
