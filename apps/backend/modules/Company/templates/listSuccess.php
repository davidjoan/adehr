<?php slot('title') ?>
  Nuestra Empresa
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@company_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'name',
        'filter_fields'      => array
                                (
                                  'name'         => 'Nombre',  
                                ),
        'columns'            => array
                                (


                                //array('20', 'id'            , 'Id'   , 'getId'       ),
                                //array('20', 'description'   , 'Description'  , 'getDescription'),
                                  array('30', 'name'          , 'Nombre', 'getName'    ),
                                  array('6' , 'disable_image' , 'Activo'  , 'getDisableImage', 'center', false),
                                //array('26', 'active'        , 'Estado'  , 'getActiveStr'  ),
                                  array('2' , ''              , ''        , 'checkbox'       ),
                                ),
        'buttons'            => array('delete' => false,'add' => false)                                
      ))
?>