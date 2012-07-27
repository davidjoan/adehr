        <!-- Barra Derecha-->
        <div class="derecha"> 
          <!-- Buscador -->
          <div id="buscador">
            <div id="txtBuscar"><b>Buscar</b></div>
            <div id="cajaBuscar">
              <div class="cajaBuscarIn">
                <input type="text" name="txtbuscar" id="txtbuscar" />
              </div>
              <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('imgBuscador','','/images/frontend/buscOver.jpg',1)"><img src="/images/frontend/img_14.jpg" alt="Buscar" name="imgBuscador" width="44" height="34" border="0" id="imgBuscador" /></a></div>
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
                <?php foreach($photos as $key => $photo): ?>
                <div class="<?php echo ($key%2 == 0)?'archMulOff': 'archMulOn'; ?>"><span class="archMulLeft">
                        <a id="single_1" href="<?php echo PhotoTable::getInstance()->getPathPath().'/'.$photo->getPath();?>" title="<?php echo $photo->getTitle(); ?>">
                            <?php echo $photo->getTitle(); ?>
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
              <div class="nubeTagBg"><?php echo $tag->getName(); ?></div>
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
    $("#single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });    
    });
    </script>