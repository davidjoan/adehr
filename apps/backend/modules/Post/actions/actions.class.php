<?php

/**
 * Post actions.
 *
 * @package    saludonline
 * @subpackage Post
 * @author     David Joan Tataje Mendoza <dtataje@datasolutions.pe>
 */
class PostActions extends ActionsCrud
{
  protected function getExtraFilterAndArrangeFields()
  {
    return array('u' => array('user_realname' => 'realname'));
  }
  protected function complementList(sfWebRequest $request, DoctrineQuery $q)
  {
    Doctrine::getTable($this->modelClass)->updateQueryForList($q);
    sfDynamicFormEmbedder::resetParams('menu');
  }
  
  public function executeLoadVideos(sfWebRequest $request)
  {
    $videos = Doctrine::getTable('Video')->findByTitleLike($request->getParameter('term'), $request->getParameter('limit'));
    $result = $videos->toCustomArray(array('id' => 'getId', 'content' => 'getTitle'));
    return $this->renderJson($result);
  }   

  public function executeLoadPhotos(sfWebRequest $request)
  {
    $photos = Doctrine::getTable('Photo')->findByTitleLike($request->getParameter('term'), $request->getParameter('limit'));
    $result = $photos->toCustomArray(array('id' => 'getId', 'content' => 'getTitle'));
    return $this->renderJson($result);
  }  
  
 
}
