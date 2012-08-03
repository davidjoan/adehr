         <!-- Galerias-->
          <div class="galerias"> 
          	<div class="fondoGaleria">
            <!-- Galeria -->
            <div class="galeria" style="margin-left:0px;">
              <div class="galTit">
                <div class="galTxt">Videos</div>
              </div>
                <a href="#" id="video_title">Videos ADEHR</a>
              <div class="galImg"> 
                  
                                     <div id="my_video_carousel" class="jcarousel-skin-tango">
                     <ul style="height: 100px; padding-left: 76px;">
                                      <?php foreach($photos as $photo): ?>
        
      <li><?php echo image_tag($photo->getThumbnailFilePath('path',75 ), array('size' => '75x75'));?></li>
    
      <?php endforeach; ?>
        
                                      </ul>
                   </div>
                <div id="video_galLeft" class="galLeft"></div>
                <div id="video_galRight" class="galRight"></div>
              </div>
            </div>
            <!-- /Galeria --> 
            <!-- Galeria -->
            <div class="galeria">
              <div class="galTit">
                <div class="galTxt">Fotos</div>
              </div>
                <a href="#" id="photo_title">&nbsp;</a>
              <div class="galImg">
                   <div id="mycarousel" class="jcarousel-skin-tango">
                       <ul style="height: 100px; padding-left: 76px;">
                                      <?php foreach($photos as $key => $photo): ?>
        
      <li><?php echo image_tag($photo->getThumbnailFilePath('path',75 ), array('size' => '75x75'));?></li>
      <div style="display: none;" id="photo_<?php echo $key+1; ?>"><?php echo $photo->getTitle(); ?></div>
      <?php endforeach; ?>
        
                                      </ul>
                   </div>
     
                <div id="photo_galLeft" class="galLeft"></div>
                <div id="photo_galRight" class="galRight"></div>
              </div>
              <div class="breaker"></div>
            </div>
            <!-- /Galeria --> 
            </div>
          </div>
         
         
         
<script type="text/javascript">
    
function mycarousel_initCallback(carousel) {

    jQuery('#photo_galLeft').bind('click', function() {
        carousel.next();
        return false;
    });

    jQuery('#photo_galRight').bind('click', function() {
        carousel.prev();
        return false;
    });
    
     // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

$(document).ready(function() {
    $("#mycarousel").jcarousel({
        scroll: 1,
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback,
        // This tells jCarousel NOT to autobuild prev/next buttons
        buttonNextHTML: null,
        buttonPrevHTML: null
    });
});

function my_video_carousel_initCallback(carousel) {

    jQuery('#video_galLeft').bind('click', function() {
        carousel.next();
        return false;
    });

    jQuery('#video_galRight').bind('click', function() {
        carousel.prev();
        return false;
    });
    
     // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

 function mycarousel_itemFirstInCallback(carousel, item, idx, state) {
  //  alert('idx: '+idx);
   //    alert('item: '+item);
   $("#photo_title").html($("#photo_"+idx).html());
};

$(document).ready(function() {
    $("#my_video_carousel").jcarousel({
        scroll: 1,
        auto: 2,
        wrap: 'last',
        initCallback: my_video_carousel_initCallback,
        // This tells jCarousel NOT to autobuild prev/next buttons
        buttonNextHTML: null,
        buttonPrevHTML: null,
        itemFirstInCallback:  mycarousel_itemFirstInCallback,
    });
});
</script>