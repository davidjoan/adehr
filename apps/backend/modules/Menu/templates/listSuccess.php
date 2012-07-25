<?php slot('title') ?>
  Menu
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
        'uri'                => '@menu_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'name',
        'filter_fields'      => array
                                (
                                  'name'         => 'Nombre'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''              , ''               , ''                      ),
                                  array('30', 'name'          , 'Nombre'         , 'getName'               ),
                                  array('20', 'root_id'       , 'Menu'           , 'getRootIdString'             ),
                                  array('20', 'created_at'    , 'Fecha Creación' , 'getFormattedCreatedAt' ),
                                  array('6' , 'disable_image' , 'Activo'         , 'getDisableImage', 'center', false),
                                  array('2' , ''              , ''               , 'checkbox'      ),
                                )
      ))
?>
