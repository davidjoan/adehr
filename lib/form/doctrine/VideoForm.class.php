<?php

/**
 * Video form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoForm extends BaseVideoForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'title'                => 'Titulo',
      'embed'                => 'Código Embed',
      'description'          => 'Url del video',
      'path'                 => 'Documento',
      'active'               => 'Activo?',
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'          => new sfWidgetFormInputHidden(),
      'active'      => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(array(), array('size' => 60)),
      'embed'       => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 5)),
      'description' => new sfWidgetFormInputText(array(), array('size' => 60)),
    ));
    
    $this->setDefault('active', '1');
    
    
    $this->types = array
    (
      'id'                      => '=',
      'title'                   => 'text',
      'embed'                   => '=',
      'description'             => 'url',
      'rank'                    => '-',
      'slug'                    => '-',
      'active'                  => 'pass',
      'created_at'              => '-',
      'updated_at'              => '-',
      'posts_list'              => '-'
        
        
     
    );
    
    $this->validatorSchema['description']->setOption('required', true);
    $this->validatorSchema['embed']->setOption('required', true);
  }
}
