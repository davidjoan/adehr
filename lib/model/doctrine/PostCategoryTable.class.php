<?php

/**
 * PostCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PostCategoryTable extends DoctrineTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PostCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PostCategory');
    }
}