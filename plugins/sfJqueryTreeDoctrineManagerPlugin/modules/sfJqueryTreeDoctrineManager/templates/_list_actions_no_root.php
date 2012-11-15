
<?php echo javascript_tag();?>
$(document).ready(function(e){
    $('#<?php echo strtolower($model);?>_root_create').submit(function(e){
        e.preventDefault();
        var src = $(this).find('.actionImage').attr('src');
        $(this).find('.actionImage').attr('src', '/sfJqueryTreeDoctrineManagerPlugin/css/throbber.gif');
        $.post( $(this).attr('action'), $(this).serialize(), function(){
            document.location.reload();
        } );
    });
});
<?php echo end_javascript_tag();?>