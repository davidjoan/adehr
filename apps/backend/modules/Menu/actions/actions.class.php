<?php

/**
 * Menu actions.
 *
 * @package    adehr
 * @subpackage Menu
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuActions extends ActionsCrud
{

 public function executeLoadPosts(sfWebRequest $request)
  {
    $posts = Doctrine::getTable('Post')->findByTitleLike($request->getParameter('term'), $request->getParameter('limit'));
    $post = $posts->toCustomArray(array('id' => 'getId', 'title' => 'getTitle'));
    return $this->renderJson($post);
  }    
}
