<?php

/**
 * MediaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MediaTable extends DoctrineTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object MediaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Media');
    }
}