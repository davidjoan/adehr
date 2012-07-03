<?php

/**
 * Company
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Company extends BaseCompany
{
  public function getActiveStr()
  {  	
  	$actives = $this->getTable()->getStatuss();
  	return $actives[$this->getActive()];
  }
  
  public function getNameStr()
  {
  	return sprintf('es: %s<br/>en: %s',$this->Translation['es']->name,$this->Translation['en']->name);
  }
}