<?php slot('title') ?>
  Videos
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
        'sort'               => true,
        'sort_uri'           => '@video_sort',                                                                
        'uri'                => '@video_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'title',
        'filter_fields'      => array
                                (
                                  'title'         => 'Titulo'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''            , ''              ),
                                  array('50', 'title'         , 'Titulo'        , 'getTitle'       ),
                                  array('20', 'created_at'    , 'Fecha Creación' , 'getFormattedCreatedAt'       ),
                                  array('6' , 'disable_image' , 'Activo'  , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''            , 'checkbox'      ),
                                )
      ))
?>
