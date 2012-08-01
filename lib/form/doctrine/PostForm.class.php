<?php

/**
 * Post form.
 *
 * @package    adehr
 * @subpackage form
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm
{
    
  protected
    $menuDynamicFormManager = null;    
  public function initialize()
  {
    $this->labels = array
    (
      'title'                => 'Titulo',
      'content'              => 'Contenido',
      'meta_description'     => 'Meta Description',
      'meta_keywords'        => 'Meta Keywords',
      'status'               => 'Estado',
      'image'                => 'Imagen',
      'categories_list'      => 'Categorías',
      'tags_list'            => 'Tags',
      'videos_list'          => 'Videos',
      'photos_list'          => 'Fotos',
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'title'                => new sfWidgetFormInputText(array(), array('size' => 100)),
      'content'              => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 550,
                                  'height'           => 350,
                                  'config'           => 'theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                                                         theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                                         theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                                                         theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
                                                         theme_advanced_toolbar_location : "top",
                                                         theme_advanced_toolbar_align : "left",
                                                         theme_advanced_statusbar_location : "bottom",
                                                         theme_advanced_resizing : true',
                                )),
      'image'                 => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getImage(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_post_path')
                                                      )
                                  ),
                                  array('size'         => '60',)
                                ),        
      'meta_description'     => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 5)),
      'meta_keywords'        => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),
      'status'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'categories_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('Categories'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'tags_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('Tags'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),   
     'videos_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('Videos'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_class'     => 'sfWidgetFormSelectDoubleList',
                                  'renderer_options' => array('label_unassociated' => 'No Asociados','label_associated'   => 'Asociados')
                                )),        
        
     'photos_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('Photos'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_class'     => 'sfWidgetFormSelectDoubleList',
                                  'renderer_options' => array('label_unassociated' => 'No Asociadas','label_associated'   => 'Asociadas')
                                )),        
        
  /*    'videos_list'        => new sfWidgetFormJQueryCompleterDoubleList(array
                                (
                                 'selected'   => $this->getVideos(),
                                 'search_url' => $this->genUrl('@post_load_video'),
                                 'label_selected' => 'Seleccionados',
                                 'label_autocompleter' => 'Buscar',
                                 'search_config'          => sprintf('{ max: "30" }')
                                )),
      'photos_list'        => new sfWidgetFormJQueryCompleterDoubleList(array
                                (
                                 'selected'   => $this->getPhotos(),
                                 'search_url' => $this->genUrl('@post_load_photo'),
                                 'label_selected' => 'Seleccionados',
                                 'label_autocompleter' => 'Buscar',
                                 'search_config'          => sprintf('{ max: "30" }')
                                )), */       
    ));
    
    $this->addValidators(array
    (
      'image'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_post_dir').'/'
                                )),
    ));    
    
    $this->types = array
    (
      'id'                     => '=',
      'user_id'                => '-',
      'title'                  => 'text',
      'image'                  => 'file',
      'size'                   => '-',
      'full_mime'              => '-',
      'content'                => '=',
      'meta_description'       => '=',
      'meta_keywords'          => '=',
      'excerpt'                => '-',
      'datetime'               => '-',
      'status'                 => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'                   => '-',
      'created_at'             => '-',
      'updated_at'             => '-',
      'categories_list'        => 'list',
      'tags_list'              => 'list',
      'videos_list'            => 'list',
      'photos_list'            => 'list'
    );
    
    $this->widgetSchema->setHelp('image' , 'Tamaño recomendado 680x310px' );
     
    $this->addMenusForm();
  }
  
    public function addMenusForm()
  {
    $this->menuDynamicFormManager = new sfDynamicFormEmbedderManager('menu', $this->object->getMenus()->getRelation(), 'Menus', $this, null, new sfCallable(array($this->object, 'getMenus')));
  }
  
  protected function updateTitleColumn($title)
  {    
    $this->object->getPostIndex()->setTitle($title);
    
    return $title;
  }
  
  protected function updateContentColumn($content)
  {
   // $index_content = preg_replace_callback('#< pre>\[(\w+)\](.*?)\[/\\1\]< /pre>#s', array($this, 'processCode'), $content);

    $index_content = preg_replace_callback('#\[(\w+)\](.*?)\[/\\1\]#s', array($this, 'processCode'), $content);
  
 
    $this->object->getPostIndex()->setContent($index_content);
 
    return $content;
  }
 
  protected function processCode($matches)
  {
    $code = str_replace('& nbsp;', ' ', $matches[2]);
    $code = html_entity_decode($code);
 
    $geshi = new GeSHi($code, $matches[1]);
    $geshi->set_header_type(GESHI_HEADER_PRE);
    $geshi->enable_classes();
 
    return $geshi->parse_code();
  }
  
   public function getVideos()
  {
  	$videos  = $this->getObject()->getVideos();
  	$videoss = $videos->toCustomArray(array('title' => 'getTitle'));
  	return $videoss;
  }

   public function getPhotos()
  {
  	$photos  = $this->getObject()->getPhotos();
  	$photoss = $photos->toCustomArray(array('title' => 'getTitle'));
        
  	return $photoss;
  }  
}
