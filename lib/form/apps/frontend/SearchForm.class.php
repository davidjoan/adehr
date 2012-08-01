<?php

class SearchFrontendForm extends BaseMenuForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'post_id'     => 'Articulo'
    );
  }  

  public function configure()
  {
    $this->setWidgets(array
    (
       'post_id'             => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@menu_load_post'),
                                  'value_callback'  => array($this, 'getPostTitle'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50))
    ));        
   
  $this->types = array
    (
     
      
      'id'          => '-',
      'post_id'     => 'combo',
      'category_id' => '-',
      'name'        => '-',
      'active'      => '-',
      'created_at'  => '-',
      'updated_at'  => '-',
      'root_id'     => '-',
      'lft'         => '-',
      'rgt'         => '-',
      'level'       => '-',
      'slug'        => '-'
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