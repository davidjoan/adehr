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
  }
}