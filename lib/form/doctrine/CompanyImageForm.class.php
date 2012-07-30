<?php

/**
 * CompanyImage form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CompanyImageForm extends BaseCompanyImageForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'title'        => 'Titulo',
      'image'        => 'Imagen',
      'active'       => 'Activo'
    );
  }    
  public function configure()
  {
  	$this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'company_id'           => new sfWidgetFormInputHidden(),
      'title'                => new sfWidgetFormInputText(array(), array('size' => '40')),
      'image'                => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getImage(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_company_image_images_path')
                                                      )
                                  ),
                                  array('size'         => '60')
                                ),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))
    ));            
    $this->setDefault('active', '1');
    $this->addValidators(array
    (
      'image'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_company_image_images_dir').'/'
                                ))
    ));
    
    
    

  	
  $this->types = array
    (
      'id'            => '=', 
      'company_id'    => '=',
      'title'         => 'text',
      'image'         => 'file',
      'active'        => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'created_at'    => '-',
      'updated_at'    => '-'
    );
  
  $this->widgetSchema->setHelp('image' , 'Tamaño recomendado 785x91 px' );
  
  }
}
