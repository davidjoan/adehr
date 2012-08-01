<?php decorate_with(false) ?>
<?php use_helper('Date', 'Text') ?>
<style>
    html, button, input, select, textarea,p,h5,h2 {
	font-family: sans-serif;
}
p {
    text-align:justify;
}
</style>
<img src="/images/frontend/logo.jpg" /><br/>
<h2><?php echo $post->getTitle(); ?>  <a href="#" onclick="window.print();return false;"><?php echo image_tag('frontend/post/print'); ?></a>	</h2>


<h5>Escrito por <?php echo $post->getUserRealname(); ?>. Publicado: <?php echo $post->getFormattedDatetime(); ?></h5>
<p>
    <?php if ($post->getImage() <> ''): ?><?php echo image_tag($post->getThumbnailFilePath('image', 684), array('size' => '640x300')); ?><?php endif; ?>
</p>

<?php echo simple_format_text($post->getPostIndex()->getContent()) ?>

<h5>Escrito por <?php echo $post->getUserRealname(); ?>, <?php echo $post->getFormattedDatetime(); ?></h5>