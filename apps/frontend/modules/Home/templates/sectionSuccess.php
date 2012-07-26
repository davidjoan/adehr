<?php use_helper('Date', 'Text') ?>

        <!-- Contenido centro -->
        <div class="centro">
        <div class="notaDetalle">
			<div class="breadcrumb"><a href="#">Notas de Prensa</a> - Caso Chilcahuaycco</div>
            <div class="lineaNegra"></div>
            <div class="breaker"></div>
            <h2><?php echo link_to($post->getTitle(), '@post_show?slug='.$post->getSlug()) ?></h2>
            <p>
            <?php if($post->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$post->getImage(), array('widht' => '635'));?><?php endif; ?>
                </p>
            <?php echo simple_format_text($post->getPostIndex()->getContent()) ?>
          	 
            <div class="fecha">Escrito por <?php echo $post->getUserRealname(); ?>, <?php echo $post->getFormattedDatetime(); ?></div>
            <div class="breaker"></div>
            <br /><br />
            <div class="breaker"></div>
        </div>
        </div>
        <!-- /Contenido centro--> 