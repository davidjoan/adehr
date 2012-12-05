<?php

/**
 * Post actions.
 *
 * @package    adehr
 * @subpackage Post
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostActions extends ActionsProject
{
 /**
  * Executes email action
  *
  * @param sfRequest $request A request object
  */
  public function executeEmail(sfWebRequest $request)
  {
      
    $this->response->setTitle('ADEHR | Enviar Email a un Amigo');
    //$this->response->addMeta('description', 'Contactanos por Teléfono:3926855 o escribenos al siguiente e-mail: davidtataje@gmail.com');
    
    $slug = $request->getParameter('slug');    
    $post = Doctrine::getTable('Post')->findOneBySlug($slug);
    
    $this->form = new EmailFrontendForm();
    
    $this->form->setDefault('subject', $post->getTitle());
    
    
    if($request->isMethod('post')):

          $this->form->bind($request->getParameter('email'));
        
          if($this->form->isValid()):
   
             if($this->form->getValue('captcha') == $this->getUser()->getAttribute('security_code')):
             $mensage = Swift_Message::newInstance()
		  ->setFrom($this->form->getValue('email_from'))
                  ->setTo($this->form->getValue('email_to'))
		  ->setSubject($this->form->getValue('subject'))
		  ->setBody($this->getPartial('email', array('post' => $post, 'name' => $this->form->getValue('name'))), 'text/html');
 
             $this->getMailer()->send($mensage); //enable in production

             $this->getUser()->setFlash('notice', 'Tu Correo ha sido enviado con &eacute;xito.');
             else:
             $this->getUser()->setFlash('error', sfConfig::get('app_contact_form_captcha'));     
             endif;
          else:
             $this->getUser()->setFlash('error', sfConfig::get('app_contact_form_error'));
          endif;
      endif;
      
  }
  
 /**
  * Executes pdf action
  *
  * @param sfRequest $request A request object
  */
  public function executePdf(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    $slug    = $request->getParameter('slug');
    
    $post = Doctrine::getTable('Post')->findOneBySlug($slug);
    $this->forward404Unless($post);
    
    $pdf = new PostPDF('P', 'mm', 'A4', $post);
    $pdf->AddPage(); 
    $pdf->Ln(10);
    

    $pdf->Image(sfConfig::get('sf_web_dir') .'/images/general/logo.jpg',10,8,33);
   
    
    $pdf->Ln(20);
    if ($post->getImage() <> ''): 
        
        $pdf->Image($post->getThumbnailFileDirectory('image', 684),40,40,100);
    $pdf->Ln(80);
        
    endif;
    
    $pdf->Image(sfConfig::get('sf_web_dir') .'/images/general/logo.jpg',10,8,33);
    
    //Deb::print_r($post->getContent());
    $pdf->WriteHTML($post->getContent());
    
    $pdf->Ln(30);
    $writer = "Escrito por ".$post->getUserRealname()." el ".$post->getFormattedDatetime();
    $pdf->Cell(60);
    $pdf->Cell(58,5,utf8_decode($writer),0,0,'C');
    
     $pdf->Output(sprintf('adehr-articulo-%s.pdf',Doctrine_Inflector::urlize($post->getTitle())),'D');
   
    throw new sfStopException();      
  }
  
 /**
  * Executes print action
  *
  * @param sfRequest $request A request object
  */
  public function executePrint(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    
    $this->response->setTitle('ADEHR | Imprimir');
    $slug    = $request->getParameter('slug');
    $this->post = Doctrine::getTable('Post')->findOneBySlug($slug);
    $this->forward404Unless($this->post);
  }   
}
