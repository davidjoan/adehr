<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $rank
 * @property string $active
 * @property Doctrine_Collection $Posts
 * @property Doctrine_Collection $Menus
 * @property Doctrine_Collection $PostCategory
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getName()         Returns the current record's "name" value
 * @method integer             getRank()         Returns the current record's "rank" value
 * @method string              getActive()       Returns the current record's "active" value
 * @method Doctrine_Collection getPosts()        Returns the current record's "Posts" collection
 * @method Doctrine_Collection getMenus()        Returns the current record's "Menus" collection
 * @method Doctrine_Collection getPostCategory() Returns the current record's "PostCategory" collection
 * @method Category            setId()           Sets the current record's "id" value
 * @method Category            setName()         Sets the current record's "name" value
 * @method Category            setRank()         Sets the current record's "rank" value
 * @method Category            setActive()       Sets the current record's "active" value
 * @method Category            setPosts()        Sets the current record's "Posts" collection
 * @method Category            setMenus()        Sets the current record's "Menus" collection
 * @method Category            setPostCategory() Sets the current record's "PostCategory" collection
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_category');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('rank', 'integer', 5, array(
             'type' => 'integer',
             'length' => 5,
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 1,
             ));


        $this->index('u_name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
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
        $this->hasMany('Post as Posts', array(
             'refClass' => 'PostCategory',
             'local' => 'category_id',
             'foreign' => 'post_id'));

        $this->hasMany('Menu as Menus', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('PostCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
    }
}