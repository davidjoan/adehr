<?php

/**
 * Tag form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TagForm extends BaseTagForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'name'                => 'Nombre',
      'active'                => 'Activo?',
    );
  }  
  public function configure()
  {
  $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(array(), array('size' => 60)),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))      
    ));  

    $this->types = array
    (
      'id'                     => '=',
      'name'                   => 'text',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'                   => '-',
      'created_at'             => '-',
      'updated_at'             => '-',
      'posts_list'             => '-'
    ); 
  }
}
