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
          <div class="breaker"></div>
          
          <!-- Archivos Multimedia-->
          <div class="archMul">
              <h2>Lo más visto</h2>
              
            <div class="archMulTit">
                <div class="archMulT1"><a class="tabs_banner active" href="#tab1" >Archivos</a></div>
              <div class="archMulT2"><a class="tabs_banner " href="#tab2" >Multimedia</a></div>
            </div>
            <div id="tab1" class="archMulTot tabContents">
                <?php $counter = 0; ?>
                <?php foreach($old_posts as $key => $post): ?>
                <?php $counter = $counter + 1; ?>
                <div class="<?php echo ($counter%2 == 0)?'archMulOff': 'archMulOn'; ?>"><span class="archMulLeft">
                        <?php echo link_to(truncate_text($post->getTitle(),37), '@post_show?slug='.$post->getSlug()) ?>
                    </span><span class="archMulRight"><?php echo $key+1; ?></span>
                  <div class="breaker"></div>
                </div>
                <?php endforeach; ?>
            </div>               
            <div id="tab2" class="archMulTot tabContents">
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
                <div class="redesImgB"><a href="<?php echo url_for("@feed_last_posts");?>" target="BLANK" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgRss','','/images/frontend/rss.png',1)"><img src="/images/frontend/rss.png" alt="RSS" name="imgRss" width="51" height="50" border="0" id="imgrSS" /><br />
                <span>RSS</span></a></div>
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


		$(".tabContents").hide(); // Hide all tab conten divs by default
		$(".tabContents:first").show(); // Show the first div of tab content by default
		
		$(".tabs_banner").click(function(){ //Fire the click event
			
			var activeTab = $(this).attr("href"); // Catch the click link
			$(".tabs_banner").removeClass("active"); // Remove pre-highlighted link
			$(this).addClass("active"); // set clicked link to highlight state
			$(".tabContents").hide(); // hide currently visible tab content div
			$(activeTab).fadeIn(); // show the target tab content div by matching clicked link.
                        return false;
		});
});

    </script>