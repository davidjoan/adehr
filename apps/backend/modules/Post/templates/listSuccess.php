<?php slot('title') ?>
    Artículos
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
        'sort'               => true,
        'sort_uri'           => '@post_sort',                                
        'uri'                => '@post_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'title',
        'filter_fields'      => array
                                (
                                  'title'         => 'Titulo', 
                                  'user_realname' => 'Autor', 
                                ),
        'columns'            => array
                                (
                                  array('2' , ''             , ''        , ''               ),
                                  array('20', 'title'        , 'Titulo'  , 'getTitle'       ),
                                  array('20', 'user_realname', 'Autor'   , 'getUserRealname'),
                                  array('20', 'category'     , 'Categorías' , 'getCategoryNameForList'),
                                  array('30', 'datetime'     , 'Fecha'   , 'getFormattedDatetime'    ),
                                  array('26', 'status'       , 'Estado'  , 'getStatusName'  ),
                                  array('2' , ''             , ''        , 'checkbox'       ),
                                )
      ))
?>
