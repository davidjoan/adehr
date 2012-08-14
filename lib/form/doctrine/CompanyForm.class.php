<?php

/**
 * Company form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CompanyForm extends BaseCompanyForm
{
 protected
    $contactDynamicFormManager = null;
  
  public function initialize()
  {
    $this->labels = array
    (
      'name'        => 'Nombre',
     /* 'description' => 'Descripci&oacute;n',
      'history'     => 'Historia',
      'vision'      => 'Visi&oacute;n',
      'mission'     => 'Misi&oacute;n',      */  
      'facebook'    => 'Cuenta Facebook',
      'twitter'     => 'Cuenta Twitter',
      'active'      => 'Activo',
    );
  }
  public function configure()
  {
  	$this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInputText(array(), array('size' => 60)),
    /*  'description'          => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 450,
                                  'height'           => 250,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
      'history'              => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 450,
                                  'height'           => 250,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
      'vision'              => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 450,
                                  'height'           => 250,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
      'mission'             => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 450,
                                  'height'           => 250,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),  */          
      'facebook'             => new sfWidgetFormInputText(array(), array('size' => 80)),
      'twitter'              => new sfWidgetFormInputText(array(), array('size' => 80)),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))
    ));
    $this->setDefault('active', '1');
    $this->types = array
    (
      'id'          => '=',
      'name'        => 'text',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'created_at'  => '-',
      'updated_at'  => '-',
      'description' => '-',
      'history'     => '-',
      'vision'      => '-',
      'mission'     => '-',
      'created_by'  => '-',
      'updated_by'  => '-',
      'facebook'    => '=',
      'twitter'     => '=',
      'slug'        => '-'
    );
    
    $this->validatorSchema['active']->setOption('required', true);
    
    $this->addCompanyImagesForm();
  }
  
    public function addCompanyImagesForm()
  {
    $this->contactDynamicFormManager = new sfDynamicFormEmbedderManager('company_image', $this->object->getCompanyImages()->getRelation(), 'Imagenes Banner Superior', $this, null, new sfCallable(array($this->object, 'getCompanyImages')));
  }
  
}