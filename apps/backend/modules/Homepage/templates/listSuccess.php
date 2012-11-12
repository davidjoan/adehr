<?php slot('title') ?>
    Post de la P&aacute;gina de Inicio
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
        'sort'               => true,
        'sort_uri'           => '@homepage_sort',    
        'uri'                => '@homepage_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'name',
        'filter_fields'      => null,
        'columns'            => array
                                (
                                  array('2' , ''             , ''        , ''               ),
                                  array('20', 'name'        , 'Nombre'  , 'getName'       ),
                                  array('20', 'post_id', 'Articulo'   , 'getPost'),
                                  array('30', 'created_at'   , 'Fecha'   , 'getCreatedAt'    ),
                                  array('6' , 'disable_image' , 'Activo'         , 'getDisableImage', 'center', false),
                                  array('2' , ''             , ''        , 'checkbox'       ),
                                )
      ))
?>
