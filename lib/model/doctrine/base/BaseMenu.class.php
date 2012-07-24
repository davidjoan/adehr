<?php

/**
 * BaseMenu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $post_id
 * @property integer $category_id
 * @property string $name
 * @property string $active
 * @property Post $Post
 * @property Category $Category
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method integer  getPostId()      Returns the current record's "post_id" value
 * @method integer  getCategoryId()  Returns the current record's "category_id" value
 * @method string   getName()        Returns the current record's "name" value
 * @method string   getActive()      Returns the current record's "active" value
 * @method Post     getPost()        Returns the current record's "Post" value
 * @method Category getCategory()    Returns the current record's "Category" value
 * @method Menu     setId()          Sets the current record's "id" value
 * @method Menu     setPostId()      Sets the current record's "post_id" value
 * @method Menu     setCategoryId()  Sets the current record's "category_id" value
 * @method Menu     setName()        Sets the current record's "name" value
 * @method Menu     setActive()      Sets the current record's "active" value
 * @method Menu     setPost()        Sets the current record's "Post" value
 * @method Menu     setCategory()    Sets the current record's "Category" value
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMenu extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_menu');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('post_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => false,
             ));
        $this->hasColumn('category_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => false,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'notnull' => true,
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('i_active', array(
             'fields' => 
             array(
              0 => 'active',
             ),
             ));
        $this->index('i_name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('boolean_columns', array(
             0 => 'active',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Post', array(
             'local' => 'post_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($nestedset0);
        $this->actAs($sluggableext0);
    }
}