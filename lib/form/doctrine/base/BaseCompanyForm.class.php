<?php

/**
 * Company form base class.
 *
 * @method Company getObject() Returns the current form's model object
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompanyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'history'     => new sfWidgetFormTextarea(),
      'vision'      => new sfWidgetFormTextarea(),
      'mission'     => new sfWidgetFormTextarea(),
      'facebook'    => new sfWidgetFormInputText(),
      'twitter'     => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'description' => new sfValidatorString(array('max_length' => 10000)),
      'history'     => new sfValidatorString(array('max_length' => 10000)),
      'vision'      => new sfValidatorString(array('max_length' => 10000)),
      'mission'     => new sfValidatorString(array('max_length' => 10000)),
      'facebook'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'twitter'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'active'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Company', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('company[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }

}
