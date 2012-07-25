<?php use_helper('Text') ?>    

<div class="centro">
    
    
    <div class="cdestacado"> 
    <?php if($posts[0]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[0]->getImage(), array('size' => '684x315'));?><?php endif; ?>
    <h1><?php echo link_to($posts[0]->getTitle(), '@post_show?slug='.$posts[0]->getSlug()) ?></h1>
    <span><?php echo simple_format_text($posts[0]->getExcerpt()); ?></span>
    </div>
    
    
    <div class="cbarra"></div>
    <div class="ccajas">
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[1]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[1]->getImage(), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[1]->getTitle(), '@post_show?slug='.$posts[1]->getSlug()) ?></span> </div>

        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[2]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[2]->getImage(), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[2]->getTitle(), '@post_show?slug='.$posts[2]->getSlug()) ?></span> </div>
        
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[3]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[3]->getImage(), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[3]->getTitle(), '@post_show?slug='.$posts[3]->getSlug()) ?></span> </div>
        
        <div class="ccaja_off" onmouseover='this.className="ccaja_on"' onmouseout='this.className="ccaja_off"'>
            <?php if($posts[4]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[4]->getImage(), array('size' => '128x60'));?><?php endif; ?><br />
            <span><?php echo link_to($posts[4]->getTitle(), '@post_show?slug='.$posts[4]->getSlug()) ?></span> </div>
    </div>
    <div class="breaker"></div>
    
    
    <div class="cotras"> 
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[5]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[5]->getImage(), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[5]->getTitle(), '@post_show?slug='.$posts[5]->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[5]->getExcerpt(),380)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item --> 
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[6]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[6]->getImage(), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[6]->getTitle(), '@post_show?slug='.$posts[6]->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[6]->getExcerpt(),380)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[7]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[7]->getImage(), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[7]->getTitle(), '@post_show?slug='.$posts[7]->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[7]->getExcerpt(),380)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->    
        
        <!-- item -->
        <div class="cotras_item"> 
            <?php if($posts[8]->getImage() <> ''):?><?php echo image_tag(PostTable::getInstance()->getImagePath().'/'.$posts[8]->getImage(), array('size' => '142x90'));?><?php endif; ?>
            <div>
                <h2><?php echo link_to($posts[8]->getTitle(), '@post_show?slug='.$posts[8]->getSlug()) ?></h2>
                <span><?php echo simple_format_text(truncate_text($posts[8]->getExcerpt(),380)); ?></span>
            </div>
        </div>
        <div class="breaker"></div>
        <!-- /item -->      
        
    </div>
    <div class="breaker"></div>
    
    
    <!-- Galerias-->
    <div class="galerias"> 
        <!-- Galeria -->
        <div class="galeria">
            <div class="galTit">
                <div class="galTxt">Videos</div>
            </div>
            <a href="#">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit</a>
            <div class="galImg"> 
                <img src="/images/frontend/dot.gif" width="292" height="130" />
                <div class="galLeft"></div>
                <div class="galRight"></div>
                <div class="galControl"></div>
            </div>
        </div>
        <!-- /Galeria --> 
        <!-- Galeria -->
        <div class="galeria">
            <div class="galTit">
                <div class="galTxt">Fotos</div>
            </div>
            <a href="#">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit</a>
            <div class="galImg"> <img src="/images/frontend/dot.gif" width="292" height="130" />
                <div class="galLeft"></div>
                <div class="galRight"></div>
                <div class="galControl"></div>
            </div>
            <div class="breaker"></div>
        </div>
        <!-- /Galeria --> 
    </div>
    
    
    <!-- /Galerias-->
    <div class="breaker"></div>
    <div class="lineaDot" style="margin:25px 15px 15px 15px;"></div>
    <div class="breaker"></div>          
    <!-- Notas cajas-->
    <div class="notasPe"> 
        <!-- Notas fila --> 
        
        <?php foreach($sections as $section): ?>
        
        <!-- Nota item-->
        <div class="notaPe">
            <div class="notasTit">
                <div class="notasTxt"><?php echo $section->getName(); ?></div>
            </div>
            <div class="notaT">
                <div class="notaFe">20<br /><span>Ene</span></div>
                <a href="#">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit</a><br />
            </div>
            <img src="/images/frontend/dot.gif" width="297" height="169" /><br />
            <span>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit Lorem ipsum dolor sit amet, conse ctetur adipisicing elit</span> </div>
        <!-- Nota item--> 
       
        <?php endforeach; ?>
        
        <!-- /Notas fila --> 
        <div class="breaker"></div>
    </div>
    <!-- /Notas cajas-->
    <div class="breaker"></div>
</div>

       <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#mycarousel').jcarousel({
                    wrap: 'circular'
                });
        </script>