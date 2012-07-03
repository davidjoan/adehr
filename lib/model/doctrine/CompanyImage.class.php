<?php

/**
 * CompanyImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CompanyImage extends BaseCompanyImage
{
    
  public function generateImageFilename($file)
  {   
    return Stringkit::fixFilename($file->getOriginalName()).'_'.rand(11111, 99999).$file->getOriginalExtension();
  }
  
  public function getFormattedCreatedAt($format = 'D')
  {
    return $this->getTable()->getDateTimeFormatter()->format($this->getCreatedAt(), $format);
  }  
  
  public function getActiveStr()
  {  	
  	$actives = $this->getTable()->getStatuss();
  	return $actives[$this->getActive()];
  }
}