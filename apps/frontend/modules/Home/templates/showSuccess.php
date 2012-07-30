<?php use_helper('Date', 'Text') ?>

        <!-- Contenido centro -->
        <div class="centro">
        <div class="notaDetalle">
			<div class="breadcrumb"><a href="#">Notas de Prensa</a> - Caso Chilcahuaycco</div>
            <div class="lineaNegra"></div>
            <div class="breaker"></div>
            <h2><?php echo link_to($post->getTitle(), '@post_show?slug='.$post->getSlug()) ?></h2>
            <div class="iconos">
                <div class="izquierda">Escrito por <?php echo $post->getUserRealname(); ?>. Publicado: <?php echo $post->getFormattedDatetime(); ?></div>
                <div class="derecha">                    
                    <a href="#"><?php echo image_tag('frontend/post/email'); ?></a>&nbsp;
                    <a href="#"><?php echo image_tag('frontend/post/pdf'); ?></a>&nbsp;
                    <a href="#"><?php echo image_tag('frontend/post/print'); ?></a>
                </div>
            </div>
            
            
            <p>
            <?php if($post->getImage() <> ''):?><?php echo image_tag($post->getThumbnailFilePath('image',684 ), array('size' => '640x300'));?><?php endif; ?>
                </p>
            <?php echo simple_format_text($post->getPostIndex()->getContent()) ?>
          	 
            <div class="fecha">Escrito por <?php echo $post->getUserRealname(); ?>, <?php echo $post->getFormattedDatetime(); ?></div>
            <div class="breaker"></div>
            <br />

                <div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>            

            
            <br />
            <div class="breaker"></div>
        </div>
        </div>
        <!-- /Contenido centro--> 