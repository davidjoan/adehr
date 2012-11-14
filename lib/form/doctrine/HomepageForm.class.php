<?php

/**
 * Homepage form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HomepageForm extends BaseHomepageForm
{
   public function initialize()
  {
    $this->labels = array
    (
      'post_id'      => 'Articulo',
      'name'         => 'Nombre', 
      'active'       => 'Activo?'
        
    );
  }  
  public function configure()
  {
  $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'post_id'              => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@menu_load_post'),
                                  'value_callback'  => array($this, 'getPostTitle'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50)),        
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
      'post_id'                => 'combo',
      'name'                   => 'text',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'rank'                   => '-',
      'slug'                   => '-',
      'created_at'             => '-',
      'updated_at'             => '-'
    ); 
  }
  
  
  public function getPostTitle($post_id)
  {
    $title = '';
    if ($post_id)
    {
      $post = Doctrine::getTable('Post')->findOneById($post_id);
      
      $title   = $post ? $post->getTitle() : '';
    }
    
    return $title;
  } 
}
