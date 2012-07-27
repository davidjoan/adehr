<?php use_helper('Date', 'Text') ?>

<div class="centro">
    <div class="notaDetalle">
        <div class="catTitulo"><a href="#"><b><?php echo $category->getName() ?></b></a></div>
    </div>
    <?php foreach ($posts as $key => $post): ?>
        <?php if($key < 50): ?>
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
</div>        