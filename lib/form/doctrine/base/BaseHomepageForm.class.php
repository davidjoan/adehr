<?php

/**
 * Homepage form base class.
 *
 * @method Homepage getObject() Returns the current form's model object
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHomepageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'post_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => true)),
      'name'       => new sfWidgetFormInputText(),
      'rank'       => new sfWidgetFormInputText(),
      'active'     => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'post_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 100)),
      'rank'       => new sfValidatorInteger(array('required' => false)),
      'active'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Homepage', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('homepage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Homepage';
  }

}
