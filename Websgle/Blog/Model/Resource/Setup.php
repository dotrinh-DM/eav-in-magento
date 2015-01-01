<?php

class Websgle_Blog_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{
 
    public function getDefaultEntities() {
        return array(
            Websgle_Blog_Model_Post::ENTITY => array(
                'entity_model' => 'websgle_blog/post',
                'table' => 'websgle_blog/post', /* Maps to the config.xml > global > models > tc_skeleton_resource > entities > skeleton */
                'attributes' => array(
                                'title' => array(
                                    'type' => 'varchar',
                                    'label' => 'Title',
                                    'input' => 'text',
                                    'required' => true,
                                    'sort_order' => 10,
                                    'position' => 10,
                                    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                                ),
                                'url' => array(
                                    'type' => 'varchar',
                                    'label' => 'URL',
                                    'input' => 'text',
                                    'required' => true,
                                    'sort_order' => 10,
                                    'position' => 11,
                                    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                                ),
                                'content' => array(
                                    'type' => 'text',
                                    'label' => 'Content',
                                    'input' => 'text',
                                    'required' => true,
                                    'sort_order' => 20,
                                    'position' => 20,
                                    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                                ),
                                'image' => array(
                                    'type' => 'varchar',
                                    'label' => 'Image',
                                    'input' => 'text',
                                    'required' => true,
                                    'sort_order' => 30,
                                    'position' => 30,
                                    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                                ),
                                'is_active' => array(
                                    'type' => 'int',
                                    'label' => 'Is Active',
                                    'input' => 'text',
                                    'required' => false,
                                    'sort_order' => 50,
                                    'position' => 50,
                                    'required' => false,
                                    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                                ),
                )
            )
        );
    }
}
