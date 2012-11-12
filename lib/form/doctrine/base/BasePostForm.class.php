<?php

/**
 * Post form base class.
 *
 * @method Post getObject() Returns the current form's model object
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'picassa_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Picassa'), 'add_empty' => true)),
      'title'            => new sfWidgetFormInputText(),
      'image'            => new sfWidgetFormInputText(),
      'size'             => new sfWidgetFormInputText(),
      'full_mime'        => new sfWidgetFormInputText(),
      'content'          => new sfWidgetFormTextarea(),
      'excerpt'          => new sfWidgetFormTextarea(),
      'meta_description' => new sfWidgetFormTextarea(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
      'datetime'         => new sfWidgetFormInputText(),
      'status'           => new sfWidgetFormInputText(),
      'slug'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'categories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
      'photos_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Photo')),
      'videos_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Video')),
      'tags_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tag')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'picassa_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Picassa'), 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 200)),
      'image'            => new sfValidatorString(array('max_length' => 200)),
      'size'             => new sfValidatorInteger(array('required' => false)),
      'full_mime'        => new sfValidatorString(array('max_length' => 100)),
      'content'          => new sfValidatorString(array('max_length' => 20000)),
      'excerpt'          => new sfValidatorString(array('max_length' => 500)),
      'meta_description' => new sfValidatorString(array('max_length' => 5000)),
      'meta_keywords'    => new sfValidatorString(array('max_length' => 1000)),
      'datetime'         => new sfValidatorPass(),
      'status'           => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'categories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
      'photos_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Photo', 'required' => false)),
      'videos_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Video', 'required' => false)),
      'tags_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tag', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Post', 'column' => array('title'))),
        new sfValidatorDoctrineUnique(array('model' => 'Post', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categories_list']))
    {
      $this->setDefault('categories_list', $this->object->Categories->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['photos_list']))
    {
      $this->setDefault('photos_list', $this->object->Photos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['videos_list']))
    {
      $this->setDefault('videos_list', $this->object->Videos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['tags_list']))
    {
      $this->setDefault('tags_list', $this->object->Tags->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCategoriesList($con);
    $this->savePhotosList($con);
    $this->saveVideosList($con);
    $this->saveTagsList($con);

    parent::doSave($con);
  }

  public function saveCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Categories->getPrimaryKeys();
    $values = $this->getValue('categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Categories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Categories', array_values($link));
    }
  }

  public function savePhotosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['photos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Photos->getPrimaryKeys();
    $values = $this->getValue('photos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Photos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Photos', array_values($link));
    }
  }

  public function saveVideosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['videos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Videos->getPrimaryKeys();
    $values = $this->getValue('videos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Videos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Videos', array_values($link));
    }
  }

  public function saveTagsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tags_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tags->getPrimaryKeys();
    $values = $this->getValue('tags_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tags', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tags', array_values($link));
    }
  }

}
