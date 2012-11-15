<ul class="sf_admin_actions">
	<?php if($hasManyRoots):?>
 		<li class="sf_admin_action_list">
		<?php echo link_to( 'Regresar' ,$sf_request->getParameter('module') . '/' . $sf_request->getParameter('action') );?>
	<?php endif;?>

</ul>

<?php echo javascript_tag();?>
    $(document).ready(function(){

    $('.createnode').click(function(e){
        var t = $.tree.focused(); 
        if(t.selected) {
            sfJqueryTreeDoctrineManagerPluginCreateNew<?php echo $model;?> = true;
            t.create();
        } 
        else {
            alert("Select a node first");
        }
    });
                
    $('.deletenode').click(function(e){
        var t = $.tree.focused(); 
        if(t.selected) {
           if ( t.parent(t.selected) == -1){
            alert("<?php echo __('forbidden to remove root node');?>")
           }else{
            t.remove();
            }
        } 
        else {
            alert("Select a node first");
        }
    });

    })
<?php echo end_javascript_tag();?>