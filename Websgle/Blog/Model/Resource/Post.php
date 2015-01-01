<?php

class Websgle_Blog_Model_Resource_Post extends Mage_Eav_Model_Entity_Abstract
{
    public function __construct()
    {
        $resource = Mage::getSingleton('core/resource');
        
        $this->setType(Websgle_Blog_Model_Post::ENTITY);
    }
}
