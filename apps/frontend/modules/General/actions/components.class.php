<?php

/**
 * General actions.
 *
 * @package    tvonline
 * @subpackage General
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GeneralComponents extends ComponentsProject
{

  public function executeHeader()
  {
      $institucional = Doctrine::getTable('Menu')->findOneById(1);
      $this->tree_institucional =  $institucional->getNode()->getChildren();
      
      $menu_principal = Doctrine::getTable('Menu')->findOneById(2);
      $this->tree_menu_principal =  $menu_principal->getNode()->getChildren();
      
      $this->banners = Doctrine::getTable('CompanyImage')->getBanners();
  }
  
  public function executeBanner()
  {
    $this->tags = Doctrine::getTable('Tag')->getActiveTags();
    
    $this->posts = Doctrine::getTable('Post')->findLastPosts(30);
    
    $this->photos = Doctrine::getTable('Photo')->getPhotoGallery();
    
    $this->videos = Doctrine::getTable('Video')->getVideoGallery();
    
    $this->form = new SearchFrontendForm();
    
    $this->old_posts = Doctrine::getTable('Post')->getOldPosts();
  }  
}