<?php

/**
 * Photo form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'title'                => 'Titulo',
      'path'                 => 'Documento',
      'active'                 => 'Activo?',
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'active'               => new sfWidgetFormInputHidden(),
      'title'                => new sfWidgetFormInput(array(), array('size' => '100')),
      'path'                 => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getPath(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_photo_path')
                                                      )
                                  ),
                                  array('size'         => '60',)
                                ),
    ));
    
    $this->setDefault('active', '1');
    
    $this->addValidators(array
    (
      'path'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_photo_dir').'/'
                                )),
    ));
    
    $this->types = array
    (
      'id'                      => '=',
      'title'                   => 'text',
      'path'                    => 'file',
      'size'                    => '-',
      'full_mime'               => '-',
      'rank'                    => '-',
      'slug'                    => '-',
      'active'                  => 'pass',
      'created_at'              => '-',
      'updated_at'              => '-'
    );
    
    $this->validatorSchema['path']->setOption('required', true);
  }
}
