<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'path'       => new sfWidgetFormInputText(),
      'size'       => new sfWidgetFormInputText(),
      'full_mime'  => new sfWidgetFormInputText(),
      'rank'       => new sfWidgetFormInputText(),
      'active'     => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'posts_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Post')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 100)),
      'path'       => new sfValidatorString(array('max_length' => 255)),
      'size'       => new sfValidatorInteger(array('required' => false)),
      'full_mime'  => new sfValidatorString(array('max_length' => 100)),
      'rank'       => new sfValidatorInteger(array('required' => false)),
      'active'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'posts_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Post', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Photo', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['posts_list']))
    {
      $this->setDefault('posts_list', $this->object->Posts->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePostsList($con);

    parent::doSave($con);
  }

  public function savePostsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['posts_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Posts->getPrimaryKeys();
    $values = $this->getValue('posts_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Posts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Posts', array_values($link));
    }
  }

}
