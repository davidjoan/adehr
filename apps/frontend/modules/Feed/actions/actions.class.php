<?php

/**
 * Feed actions.
 *
 * @package    adehr
 * @subpackage Feed
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeedActions extends ActionsProject
{
  public function executeLastPosts(sfWebRequest $request)
  {
    $feed = new sfRss201Feed();
    
    $feed->setTitle('ADEHR Noticias');
    $feed->setLink('http://www.adehr.org.pe');
    $feed->setAuthorName('Equipo de ADEHR');
    $feed->setAuthorEmail('davidtataje@gmail.com');
    
    $feedImage = new sfFeedImage();
    $feedImage->setTitle('ADEHR');
    $feedImage->setLink('http:/www.adehr.org.pe/images/general/favicon.ico');
    $feed->setImage($feedImage);
    
    $category_slug = $request->getParameter('category_slug');
    if (!$category_slug)
    {
      $posts = Doctrine::getTable('Post')->findLastPosts(20);
    }
    else
    {
      $posts = Doctrine::getTable('Post')->findLastPostsByCategorySlug($category_slug, 20);
    }
    
    foreach ($posts as $post)
    {
      $item = new sfFeedItem();
      $item->setTitle($post->getTitle());
      $item->setLink('@post_show?slug='.$post->getSlug());
      $item->setAuthorName($post->getUser()->getRealname());
      $item->setAuthorEmail($post->getUser()->getEmail());
      $item->setPubdate(strtotime($post->getDatetime()));
      $item->setUniqueId($post->getSlug());
      $item->setDescription($post->getExcerpt());
      
      $feed->addItem($item);
    }
    
    $this->feed = $feed;
  }
}
