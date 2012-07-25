<?php

/**
 * Menu form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuForm extends BaseMenuForm
{
    
  public function initialize()
  {
    $this->labels = array
    (
      'post_id'     => 'Articulo',
      'category_id' => 'Categoría',
      'name'        => 'Nombre',
      'active'      => 'Activo?',
      'parent'      => 'Menu Padre'
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(array(), array('size' => 60)),
      'post_id'              => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'     => $this->getRelatedModelName('Post'),
                                  'add_empty' => '--- Seleccionar ---'
                                )),
       'post_id'             => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@menu_load_post'),
                                  'value_callback'  => array($this, 'getPostTitle'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50)),          
      'category_id'              => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'     => $this->getRelatedModelName('Category'),
                                  'add_empty' => '--- Seleccionar ---'
                                )),        

      'parent'               => new sfWidgetFormDoctrineChoiceNestedSet(array(
                                'model'     => 'Menu',
                                'add_empty' => false ,
                             )),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))
    ));      
    
    
    $this->setDefault('active', '1');
    if ($this->getObject()->getNode()->hasParent())
    {
      $this->setDefault('parent', $this->getObject()->getNode()->getParent()->getId());
    }
   
   $this->addValidators(array
    (
       'parent'              => new sfValidatorDoctrineChoiceNestedSet(array
                                 (
                                   'model' => 'Menu',
                                   'node'  => $this->getObject()
                                  )) 
    ));    
   
  $this->types = array
    (
     
      
      'id'          => '=',
      'post_id'     => 'combo',
      'category_id' => 'combo',
      'name'        => 'text',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'created_at'  => '-',
      'updated_at'  => '-',
      'root_id'     => '-',
      'lft'         => '-',
      'rgt'         => '-',
      'level'       => '-',
      'slug'        => '-',
      'parent'        => '=',//A node cannot be set as a child of itself.
    );
  
  }
  
  public function doSave($con = null)
  {
  	
    // save the record itself
    parent::doSave($con);
    // if a parent has been specified, add/move this node to be the child of that node
    if ($this->getValue('parent'))
    {
      $parent = Doctrine::getTable('Menu')->findOneById($this->getValue('parent'));
      if ($this->isNew())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        $this->getObject()->getNode()->moveAsLastChildOf($parent);
      }
    }
    // if no parent was selected, add/move this node to be a new root in the tree
    else
    {
      $categoryTree = Doctrine::getTable('Menu')->getTree();
      if ($this->isNew())
      {
        $categoryTree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }
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
