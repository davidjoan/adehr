<?php

/**
 * Home actions.
 *
 * @package    adehr
 * @subpackage Home
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HomeActions extends ActionsProject
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    Doctrine::getTable('Visit')->createAndSave($request->getPathInfoArray());
    
    $this->posts = Doctrine::getTable('Post')->getQueryForTenPrincipalPosts();     
    
    $this->photos = Doctrine::getTable('Photo')->getPhotoGallery();
    
    $this->videos = Doctrine::getTable('Video')->getVideoGallery();
    
    $this->sections = Doctrine::getTable('Category')->getSections();
  }
  
  public function executeShow(sfWebRequest $request)
  {    
   // $this->posts = Doctrine::getTable('Post')->findLastPosts(10);
    
    $this->post = Doctrine::getTable('Post')->findOneBySlug($request->getParameter('slug'));
    $this->redirectUnless($this->post, '@homepage');
    
    $this->getResponse()->setTitle($this->post->getTitle().' | Articulo | ADEHR');
    $this->getResponse()->addMeta('description', $this->post->getMetaDescription());
    $this->getResponse()->addMeta('keywords'   , $this->post->getMetaKeywords());
    
    $this->commentForm = new CommentForm();
    
    if($this->getUser()->isAuthenticated() == true)
    {
      $this->commentForm->setDefaults(array('author_name' => $this->getUser()->getRealname(), 'author_email' => $this->getUser()->getUserEmail()));
    }
    
    if ($request->isMethod('post'))
    {
      $params = $request->getParameter($this->commentForm->getName());
      $params = array_merge($params, $this->getCommentParams($request));
      $this->commentForm->bind($params);
      
      if ($this->commentForm->isValid())
      {
        $comment = $this->commentForm->save();
        $this->redirect('@post_show?slug='.$this->post->getSlug());
      }
    }
  }
  
  public function executeSection(sfWebRequest $request)
  {
      $this->category = Doctrine::getTable('Category')->findOneBySlug($request->getParameter('slug'));
      $this->posts = Doctrine::getTable('Post')->findByCategorySlug($request->getParameter('slug'));
  }
}