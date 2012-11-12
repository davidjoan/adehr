<?php use_helper('Text') ?>    

<div class="centro">
    
    
    <div class="cdestacado"> 
    <?php if($posts[0]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[0]->getPost()->getThumbnailFilePath('image',684 ), array('size' => '660x310'));?><?php endif; ?>
    <h1><?php echo link_to($posts[0]->getPost()->getTitle(), '@post_show?slug='.$posts[0]->getPost()->getSlug()) ?></h1>
    <span><?php echo simple_format_text(truncate_text($posts[0]->getPost()->getExcerpt(), 440, ' ...')); ?></span>
    </div>

    <div class="cbarra"></div>
    <div class="ccajas">
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[1]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[1]->getPost()->getThumbnailFilePath('image',128 ), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[1]->getPost()->getTitle(), '@post_show?slug='.$posts[1]->getPost()->getSlug()) ?></span> </div>

        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[2]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[2]->getPost()->getThumbnailFilePath('image',128 ), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[2]->getPost()->getTitle(), '@post_show?slug='.$posts[2]->getPost()->getSlug()) ?></span> </div>
        
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[3]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[3]->getPost()->getThumbnailFilePath('image',128 ), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[3]->getPost()->getTitle(), '@post_show?slug='.$posts[3]->getPost()->getSlug()) ?></span> </div>
        
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[4]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[4]->getPost()->getThumbnailFilePath('image',128 ), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[4]->getPost()->getTitle(), '@post_show?slug='.$posts[4]->getPost()->getSlug()) ?></span> </div>
    </div>
    <div class="breaker"></div>
    
    
    <div class="cotras"> 
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[5]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[5]->getPost()->getThumbnailFilePath('image',142 ), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[5]->getPost()->getTitle(), '@post_show?slug='.$posts[5]->getPost()->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[5]->getPost()->getExcerpt(),300)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item --> 
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[6]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[6]->getPost()->getThumbnailFilePath('image',142 ), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[6]->getPost()->getTitle(), '@post_show?slug='.$posts[6]->getPost()->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[6]->getPost()->getExcerpt(),300)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[7]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[7]->getPost()->getThumbnailFilePath('image',142 ), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[7]->getPost()->getTitle(), '@post_show?slug='.$posts[7]->getPost()->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[7]->getPost()->getExcerpt(),300)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->    
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[8]->getPost()->getImage() <> ''):?><?php echo image_tag($posts[8]->getPost()->getThumbnailFilePath('image',142 ), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[8]->getPost()->getTitle(), '@post_show?slug='.$posts[8]->getPost()->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[8]->getPost()->getExcerpt(),300)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->      
        
    </div>
    <div class="breaker"></div>
    
      <?php include_partial('Home/photos_videos', array('photos' => $post_with_photos, 'videos' => $post_with_videos)) ?>

    <div class="breaker"></div>
    <div class="lineaDot" style="margin:25px 15px 15px 15px;"></div>
    <div class="breaker"></div>          
    <!-- Notas cajas-->
    <div class="notasPe"> 
        <!-- Notas fila --> 
        
        <?php foreach($sections as $section): ?>
        <?php $post = $section->getLastPost(); ?>
        
        <?php if($post): ?>
        <!-- Nota item-->
        <div class="notaPe">
            <div class="notasTit">
                <div class="notasTxt"><?php echo link_to($section->getName(),'@post_section?slug='.$section->getSlug()); ?></div>
            </div>
            <div class="notaT">
                
                <div class="notaFe"><?php echo date("d",strtotime($post->getCreatedAt())); ?><br /><span><?php echo date("M",strtotime($post->getCreatedAt())); ?></span></div>
                <?php echo link_to($post->getTitle(), '@post_show?slug='.$post->getSlug()) ?>
                <br />
            </div>
            <?php if($post->getImage() <> ''):?><?php echo image_tag($post->getThumbnailFilePath('image',297 ), array('size' => '297x169'));?><?php endif; ?>
            <br />
            <span><?php echo simple_format_text(truncate_text($post->getExcerpt(),380)); ?></span> </div>
        <!-- Nota item--> 
       <?php endif; ?>
        <?php endforeach; ?>
        
        <!-- /Notas fila --> 
        <div class="breaker"></div>
    </div>
    <!-- /Notas cajas-->
    <div class="breaker"></div>
</div>