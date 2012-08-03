<?php use_helper('Text') ?>    
<!-- Barra Derecha-->
        <div class="derecha"> 
          <!-- Buscador -->
          <div id="buscador">
            <div id="txtBuscar"><b>Buscar</b></div>
            <div id="cajaBuscar">
                <form id="form_search" action="<?php echo url_for('@post_search') ?>" method="post">
              <div class="cajaBuscarIn">
                <?php echo $form['search']->render(); ?>
              </div>
                    <a href="#"  onclick="javascript: document.getElementById('form_search').submit();" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgBuscador','','/images/frontend/buscOver.jpg',1)">
                  <img src="/images/frontend/img_14.jpg" alt="Buscar" name="imgBuscador" width="44" height="34" border="0" id="imgBuscador" />
              </a>
                    </form>
              
            </div>
          </div>
          <!-- /Buscador -->
          <div class="breaker"></div>
          <!-- Ultimos Art-->
          <div class="ultArt">
            <div class="ultArtTit">Ultimos Articulos</div>
            <div class="ultArtTot">
                
              <?php foreach($posts as $key => $post): ?>
              <div class="<?php echo ($key%2 == 0)?'ultArtItemOff': 'ultArtItemOn'; ?>">
                  <img src="/images/frontend/dot.gif" width="10" height="1" />
                  <?php echo link_to($post->getTitle(), '@post_show?slug='.$post->getSlug()) ?>
                <div class="lineaDot"></div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- /Ultimos Art--> 
          
          <!-- Archivos Multimedia-->
          <div class="archMul">
            <div class="archMulTit">
              <div class="archMulT1">Archivos</div>
              <div class="archMulT2">Multimedia</div>
            </div>
            <div class="archMulTot">
                <?php $counter = 0; ?>
                <?php foreach($videos as $key => $video): ?>
                <?php $counter = $counter + 1; ?>
                <div class="<?php echo ($counter%2 == 0)?'archMulOff': 'archMulOn'; ?>"><span class="archMulLeft">
                        <a class="fancybox-media"  href="<?php echo trim($video->getDescription()); ?>">
                            <?php echo truncate_text($video->getTitle(), 37); ?>
                        </a>
                    </span><span class="archMulRight">Video</span>
                  <div class="breaker"></div>
                </div>
                <?php endforeach; ?>                                
                <?php foreach($photos as $key => $photo): ?>
                <?php $counter = $counter + 1; ?>
                <div class="<?php echo ($counter%2 == 0)?'archMulOff': 'archMulOn'; ?>"><span class="archMulLeft">
                        <a class="fancybox-photo" href="<?php echo PhotoTable::getInstance()->getPathPath().'/'.$photo->getPath();?>">
                            <?php echo truncate_text($photo->getTitle(),37); ?>
                        </a>
                    </span><span class="archMulRight">Foto</span>
                  <div class="breaker"></div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="breaker"></div>
          </div>
          <!-- /Archivos Multimedia--> 
          
          <!-- Nube de Tags-->
          <div id="nubeTags">
            <div class="nubeTag">
              <?php foreach($tags as $tag): ?>
              <div class="nubeTagImg"></div>
              <div class="nubeTagBg">
                  <?php echo link_to($tag->getName(),'@post_tag?slug='.$tag->getSlug()); ?></div>
              <div class="nubeTagF"></div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- /Nube de Tags-->
          <div class="breaker"></div>
          <!-- Redes -->
          <div id="redes">
            <div class="redesTit"><span>Síguenos</span></div>
            <div class="breaker"></div>
            <div class="redesImg">
                <div class="redesImgB"><a href="https://www.facebook.com/pages/ADEHR/111874458833632" target="BLANK" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgFace','','/images/frontend/img_26over.png',1)"><img src="/images/frontend/img_26.png" alt="FaceBook" name="imgFace" width="53" height="51" border="0" id="imgFace" /><br />
                <span>Facebook</span></a></div>
              <div class="redesImgB"><a href="http://www.youtube.com" target="BLANK" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgYou','','/images/frontend/img_28over.png',1)"><img src="/images/frontend/img_28.png" alt="YouTube" name="imgYou" width="54" height="51" border="0" id="imgYou" /><br />
                <span>Youtube</span></a></div>
              <div class="redesImgB"><a href="https://twitter.com/adehrperu" target="BLANK" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgTwi','','/images/frontend/img_30Over.png',1)"><img src="/images/frontend/img_30.png" alt="Twiter" name="imgTwi" width="55" height="51" border="0" id="imgTwi" /><br />
                <span>Twiter</span></a></div>
              <div class="redesImgB"><a href="http://vimeo.com/adehrperu" target="BLANK" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgVimeo','','/images/frontend/img_32Over.png',1)"><img src="/images/frontend/img_32.png" alt="Vimeo" name="imgVimeo" width="54" height="51" border="0" id="imgVimeo" /><br />
                <span>Vimeo</span></a></div>
            </div>
            <div class="breaker"></div>
          </div>
          <!-- /Redes--> 
        </div>
        <!-- /Barra Derecha--->        
        <script>
   
$(document).ready(function() {
	$(".fancybox-media").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
                type: 'html',
		helpers : {
			media : {}
		}
	});
        
        	$(".fancybox-photo").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
});    
    </script>