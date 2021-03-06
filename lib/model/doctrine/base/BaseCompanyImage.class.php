<?php

/**
 * BaseCompanyImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $company_id
 * @property string $title
 * @property string $image
 * @property string $active
 * @property Company $Company
 * 
 * @method integer      getId()         Returns the current record's "id" value
 * @method integer      getCompanyId()  Returns the current record's "company_id" value
 * @method string       getTitle()      Returns the current record's "title" value
 * @method string       getImage()      Returns the current record's "image" value
 * @method string       getActive()     Returns the current record's "active" value
 * @method Company      getCompany()    Returns the current record's "Company" value
 * @method CompanyImage setId()         Sets the current record's "id" value
 * @method CompanyImage setCompanyId()  Sets the current record's "company_id" value
 * @method CompanyImage setTitle()      Sets the current record's "title" value
 * @method CompanyImage setImage()      Sets the current record's "image" value
 * @method CompanyImage setActive()     Sets the current record's "active" value
 * @method CompanyImage setCompany()    Sets the current record's "Company" value
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompanyImage extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_company_image');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('company_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'notnull' => false,
             ));
        $this->hasColumn('image', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => false,
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
        $this->hasOne('Company', array(
             'local' => 'company_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}