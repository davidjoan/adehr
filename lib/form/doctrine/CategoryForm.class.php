<?php

/**
 * Category form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
   public function initialize()
  {
    $this->labels = array
    (
      'name'                => 'Nombre',
      'active'                => 'Activo?',
      'posts_list'          => 'Articulos'
        
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
                                )),
       'posts_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('Posts'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_class'     => 'sfWidgetFormSelectDoubleList',
                                  'renderer_options' => array('label_unassociated' => 'No Asociados','label_associated'   => 'Asociados')
                                )),  
    ));  

    $this->types = array
    (
      'id'                     => '=',
      'name'                   => 'text',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'                   => '-',
      'created_at'             => '-',
      'updated_at'             => '-',
      'posts_list'             => 'list'
    ); 
  }
}
