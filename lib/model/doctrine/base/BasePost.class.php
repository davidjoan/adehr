<?php

/**
 * BasePost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $image
 * @property string $content
 * @property string $excerpt
 * @property string $meta_description
 * @property string $meta_keywords
 * @property datetime $datetime
 * @property string $status
 * @property User $User
 * @property PostIndex $PostIndex
 * @property Doctrine_Collection $Categories
 * @property Doctrine_Collection $Tags
 * @property Doctrine_Collection $Comments
 * @property Doctrine_Collection $PostCategory
 * @property Doctrine_Collection $PostTag
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method integer             getUserId()           Returns the current record's "user_id" value
 * @method string              getTitle()            Returns the current record's "title" value
 * @method string              getImage()            Returns the current record's "image" value
 * @method string              getContent()          Returns the current record's "content" value
 * @method string              getExcerpt()          Returns the current record's "excerpt" value
 * @method string              getMetaDescription()  Returns the current record's "meta_description" value
 * @method string              getMetaKeywords()     Returns the current record's "meta_keywords" value
 * @method datetime            getDatetime()         Returns the current record's "datetime" value
 * @method string              getStatus()           Returns the current record's "status" value
 * @method User                getUser()             Returns the current record's "User" value
 * @method PostIndex           getPostIndex()        Returns the current record's "PostIndex" value
 * @method Doctrine_Collection getCategories()       Returns the current record's "Categories" collection
 * @method Doctrine_Collection getTags()             Returns the current record's "Tags" collection
 * @method Doctrine_Collection getComments()         Returns the current record's "Comments" collection
 * @method Doctrine_Collection getPostCategory()     Returns the current record's "PostCategory" collection
 * @method Doctrine_Collection getPostTag()          Returns the current record's "PostTag" collection
 * @method Post                setId()               Sets the current record's "id" value
 * @method Post                setUserId()           Sets the current record's "user_id" value
 * @method Post                setTitle()            Sets the current record's "title" value
 * @method Post                setImage()            Sets the current record's "image" value
 * @method Post                setContent()          Sets the current record's "content" value
 * @method Post                setExcerpt()          Sets the current record's "excerpt" value
 * @method Post                setMetaDescription()  Sets the current record's "meta_description" value
 * @method Post                setMetaKeywords()     Sets the current record's "meta_keywords" value
 * @method Post                setDatetime()         Sets the current record's "datetime" value
 * @method Post                setStatus()           Sets the current record's "status" value
 * @method Post                setUser()             Sets the current record's "User" value
 * @method Post                setPostIndex()        Sets the current record's "PostIndex" value
 * @method Post                setCategories()       Sets the current record's "Categories" collection
 * @method Post                setTags()             Sets the current record's "Tags" collection
 * @method Post                setComments()         Sets the current record's "Comments" collection
 * @method Post                setPostCategory()     Sets the current record's "PostCategory" collection
 * @method Post                setPostTag()          Sets the current record's "PostTag" collection
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePost extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_post');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => true,
             ));
        $this->hasColumn('image', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => true,
             ));
        $this->hasColumn('content', 'string', 20000, array(
             'type' => 'string',
             'length' => 20000,
             'notnull' => true,
             ));
        $this->hasColumn('excerpt', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             'notnull' => true,
             ));
        $this->hasColumn('meta_description', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => true,
             ));
        $this->hasColumn('meta_keywords', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             'notnull' => true,
             ));
        $this->hasColumn('datetime', 'datetime', null, array(
             'type' => 'datetime',
             'notnull' => true,
             ));
        $this->hasColumn('status', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             'fixed' => 1,
             'notnull' => true,
             'default' => 'PE',
             ));


        $this->index('u_title', array(
             'fields' => 
             array(
              0 => 'title',
             ),
             'type' => 'unique',
             ));
        $this->index('i_content', array(
             'fields' => 
             array(
              'content' => 
              array(
              'length' => 400,
              ),
             ),
             ));
        $this->index('i_excerpt', array(
             'fields' => 
             array(
              'excerpt' => 
              array(
              'length' => 100,
              ),
             ),
             ));
        $this->index('i_datetime', array(
             'fields' => 
             array(
              0 => 'datetime',
             ),
             ));
        $this->index('i_status', array(
             'fields' => 
             array(
              0 => 'status',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('type_columns', array(
             0 => 'status',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('PostIndex', array(
             'local' => 'id',
             'foreign' => 'post_id'));

        $this->hasMany('Category as Categories', array(
             'refClass' => 'PostCategory',
             'local' => 'post_id',
             'foreign' => 'category_id'));

        $this->hasMany('Tag as Tags', array(
             'refClass' => 'PostTag',
             'local' => 'post_id',
             'foreign' => 'tag_id'));

        $this->hasMany('Comment as Comments', array(
             'local' => 'id',
             'foreign' => 'post_id'));

        $this->hasMany('PostCategory', array(
             'local' => 'id',
             'foreign' => 'post_id'));

        $this->hasMany('PostTag', array(
             'local' => 'id',
             'foreign' => 'post_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
    }
}