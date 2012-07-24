<?php slot('title') ?>
  Fotos
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@photo_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'title',
        'filter_fields'      => array
                                (
                                  'title'         => 'Titulo'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''            , ''              ),
                                  array('20', 'title'         , 'Titulo'        , 'getTitle'       ),
                                  array('20', 'size'         , 'Tamaño'        , 'getSize'       ),
            array('20', 'full_mime'         , 'Mime'        , 'getFullMime'       ),
                                  array('6' , 'disable_image' , 'Activo'  , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>
