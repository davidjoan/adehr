<?php

/**
 * Home actions.
 *
 * @package    adehr
 * @subpackage Home
 * @author     David Tataje Mendoza
 */
class HomeActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
$username = 'adehrperu';
$album    = '21AniversarioDelAsesinatoDelPeriodistaHugoBustiosSaavedra';

$pic = new Picasa();

try
{
  $album = $pic->getAlbumById($username, $album);
  $this->images = $album->getImages();
  $this->title  = $album->getTitle();
}
catch( Exception $e )
{
  $this->images = array();
  $this->title = '';
}      
  }
}
