<h3>Usted ha recibido un nuevo mensaje de <?php echo $name ?> A través de <a href="http://www.adehr.org.pe" target="BLANK">ADEHR</a></h3>



<?php use_helper('Date', 'Text') ?>
<style>
    html, button, input, select, textarea,p,h5,h2 {
	font-family: sans-serif;
}
p {
    text-align:justify;
}
</style>

<img src="http://www.adehr.org.pe/images/frontend/logo.jpg" /><br/>
<h2><?php echo link_to($post->getTitle(), '@post_show?slug=' . $post->getSlug(),array('absolute' => true)) ?></h2>

<p>
    <?php if ($post->getImage() <> ''): ?><?php echo image_tag("http://www.adehr.org.pe".$post->getThumbnailFilePath('image', 684), array('size' => '640x300')); ?><?php endif; ?>
</p>

<?php echo simple_format_text($post->getPostIndex()->getContent()) ?>

<h5>Escrito por <?php echo $post->getUserRealname(); ?>, <?php echo $post->getFormattedDatetime(); ?></h5>

<p>&nbsp;</p>
ADEHR<br/>