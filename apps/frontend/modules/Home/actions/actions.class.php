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
    
    $this->getResponse()->setTitle('ADEHR | Articulo | '.$this->post->getTitle());
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
      
      $this->response->setTitle('ADEHR | Sección '.$this->category->getName());
  }
  
  public function executeTag(sfWebRequest $request)
  {
      $this->tag = Doctrine::getTable('Tag')->findOneBySlug($request->getParameter('slug'));
      $this->posts = Doctrine::getTable('Post')->findByTagSlug($request->getParameter('slug'));
      
      $this->response->setTitle('ADEHR | Articulos para el Tag '.$this->tag->getName());
  }  
  
  public function executeContact(sfWebRequest $request)
  {
    $this->response->setTitle('ADEHR | Contactenos');
    //$this->response->addMeta('description', 'Contactanos por Teléfono:3926855 o escribenos al siguiente e-mail: davidtataje@gmail.com');
    $this->form = new ContactFrontendForm();
    
    if($request->isMethod('post')):

          $this->form->bind($request->getParameter('contact'));
        
          if($this->form->isValid()):
   
             if($this->form->getValue('captcha') == $this->getUser()->getAttribute('security_code')):
             $mensage = Swift_Message::newInstance()
		  ->setFrom($this->form->getValue('email'))
                  ->setTo(sfConfig::get('app_contact_form_email'))
		  ->setSubject($this->form->getValue('subject'))
		  ->setBody($this->getPartial('send'), 'text/html');
 
             $this->getMailer()->send($mensage); //enable in production

             $this->getUser()->setFlash('notice', sfConfig::get('app_contact_form_notice'));
             $this->redirect('@contact');
             else:
             $this->getUser()->setFlash('error', sfConfig::get('app_contact_form_captcha'));     
             endif;
          else:
             $this->getUser()->setFlash('error', sfConfig::get('app_contact_form_error'));
          endif;
      endif;
  }  
  
  public function executeImage()
  {
    sfConfig::set('sf_web_debug', false);
    $font = sfConfig::get('sf_web_dir').'/images/general/monofont.ttf';
    $width = 100;
    $height = 40;
    $characters = 6;
    $possible = '23456789bcdfghjkmnpqrstvwxyz';
    $font_size = $height * 0.75;
    $code = '';
    $i = 0;
    while ($i < $characters) { 
	$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
	  $i++;    
    }

    $this->getUser()->setAttribute('security_code', $code);
    $image = imagecreate($width, $height);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 20, 40, 100);
    $noise_color = imagecolorallocate($image, 100, 180, 240);
      for( $i=0; $i<($width*$height)/3; $i++ ) {
         imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
      }
      for( $i=0; $i<($width*$height)/150; $i++ ) {
	imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
      }
      $textbox = imagettfbbox($font_size, 0, $font, $code);
      $x = ($width - $textbox[4])/2;
      $y = ($height - $textbox[5])/2;
      imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);
    header("Content-type:  image/jpeg");
    imagepng($image);
    imagedestroy($image);
    return sfView::NONE;
  }      
  
  public function executeSitemap()
  {
      $this->response->setTitle('ADEHR | Mapa del Sitio');
      
      $institucional = Doctrine::getTable('Menu')->findOneById(1);
      $this->tree_institucional =  $institucional->getNode()->getChildren();
      
      $menu_principal = Doctrine::getTable('Menu')->findOneById(2);
      $this->tree_menu_principal =  $menu_principal->getNode()->getChildren();        
  }
  
  
  public function executeSearch(sfWebRequest $request)
  {
      if($request->isMethod('post')):

       $search = $request->getParameter('search');
       $this->param = $search['search'];
      
       $this->posts = Doctrine::getTable('Post')->findByTitleLike($this->param, 100);
       
       $this->response->setTitle('ADEHR | Articulos encontrados para "'.$this->param.'"');
  
      else:
          return $this->redirect('@homepage');
      endif;
     
      
      
  }    
}