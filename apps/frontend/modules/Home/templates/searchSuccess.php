<?php use_helper('Date', 'Text') ?>
<?php $cant = 0; ?>
<div class="centro">
    <div class="notaDetalle">
        <div class="catTitulo"><a href="#"><b>Articulos encontrados para "<?php echo $param ?>"</b></a></div>
    </div>
    <?php foreach ($posts as $key => $post): ?>
      <?php $cant++; ?>
        <?php if($key < 50): ?>
        <!-- item -->
        <div class="notaDetalle">
            <div class="breaker"></div>    
            <h2><?php echo link_to($post->getTitle(), '@post_show?slug=' . $post->getSlug()) ?></h2>
            <div class="iconos">
                <div class="izquierda">Escrito por <?php echo $post->getUserRealname(); ?>. Publicado: <?php echo $post->getFormattedDatetime(); ?></div>
                
                <div class="derecha">                    
                <a href="#"><?php echo link_to(image_tag('frontend/post/email'), '@post_email?slug='.$post->getSlug(),array('data-fancybox-type' => "iframe",'class' => "various")); ?></a>&nbsp;
                <a href="#"><?php echo link_to(image_tag('frontend/post/pdf'), '@post_pdf?slug='.$post->getSlug()); ?></a>&nbsp;
                <a href="#"><?php echo link_to(image_tag('frontend/post/print'), '@post_print?slug='.$post->getSlug(),array('data-fancybox-type' => "iframe",'class' => "various")); ?></a>&nbsp;
                </div>
            </div>
            <p><?php echo simple_format_text($post->getExcerpt()); ?></p>
            <div class="breaker"></div>
            <br />
        </div>
        <!-- item -->
        <?php elseif($key == 50): ?>
                <!-- item -->
        <div class="notaDetalle">
            <div class="breaker"></div>    
            <h2><?php echo link_to($post->getTitle(), '@post_show?slug=' . $post->getSlug()) ?></h2>
            <div class="iconos">
                <div class="izquierda">Escrito por <?php echo $post->getUserRealname(); ?>. Publicado: <?php echo $post->getFormattedDatetime(); ?></div><div class="derecha"><a href="#"><img src="/images/frontend/dot.gif" width="20" height="20" class="mano" /></a>&nbsp;<a href="#"><img src="/images/frontend/dot.gif" width="20" height="20" class="mano" /></a>&nbsp;<a href="#"><img src="/images/frontend/dot.gif" width="20" height="20" class="mano" /></a></div>
            </div>
            <p><?php echo simple_format_text($post->getExcerpt()); ?></p>
            <div class="breaker"></div>
            <br />
        </div>
        <!-- item -->
        <div class="masArticulos">
        <b>M&Aacute;S ART&Iacute;CULOS:</b><br /><br />
        </div>
        <?php else: ?>
           <?php echo link_to($post->getTitle(), '@post_show?slug=' . $post->getSlug()) ?>
        <?php endif; ?> 
         
    <?php endforeach; ?>
        
        <div class="masArticulos">
        <b>Su búsqueda dio <?php echo $cant; ?> resultados.</b><br /><br />
        </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        
	$(".various").fancybox({
		maxWidth	: 700,
		maxHeight	: 700,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
    });
</script>