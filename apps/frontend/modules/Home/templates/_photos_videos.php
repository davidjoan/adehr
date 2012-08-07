<!-- Galerias-->
<div class="galerias"> 
    <div class="fondoGaleria">
        <!-- Galeria -->
        <div class="galeria" style="margin-left:0px;">
            <div class="galTit">
                <div class="galTxt">Videos</div>
            </div>
            <div id="video_title" style="width: 290; height: 30px;">&nbsp;</div>
            <div class="galImg"> 

                <div id="my_video_carousel" class="jcarousel-skin-tango">
                    <ul style="height: 100px; padding-left: 76px;">
                        <?php foreach ($videos as $key => $video): ?>

                            <li><?php echo link_to(image_tag($video->getThumbnailFilePath('image', 128), array('size' => '75x75')), '@post_show?slug='.$video->getSlug()); ?></li>
                            <div style="display: none;" id="video_<?php echo $key + 1; ?>"> <?php echo link_to($video->getTitle(), '@post_show?slug='.$video->getSlug()); ?></div>
                            
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
            <div id="photo_title" style="width: 290px; height: 30px;">&nbsp;</div>
            <div class="galImg">
                <div id="mycarousel" class="jcarousel-skin-tango">
                    <ul style="height: 100px; padding-left: 76px;">
                        <?php foreach ($photos as $key => $photo): ?>

                            <li><?php echo link_to(image_tag($photo->getThumbnailFilePath('image', 128), array('size' => '75x75')), '@post_show?slug='.$photo->getSlug()); ?></li>
                            <div style="display: none;" id="photo_<?php echo $key + 1; ?>"><?php echo link_to($photo->getTitle(), '@post_show?slug='.$photo->getSlug()); ?></div>
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

    function photoCallback(carousel, item, idx, state) {
        $("#photo_title").html($("#photo_"+idx).html());
    };
 

    $(document).ready(function() {
        $("#mycarousel").jcarousel({
            scroll: 1,
            auto: 2,
            wrap: 'both',
            initCallback: mycarousel_initCallback,
            // This tells jCarousel NOT to autobuild prev/next buttons
            buttonNextHTML: null,
            buttonPrevHTML: null,
            itemFirstInCallback:  photoCallback
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


    function videCallBack(carousel, item, idx, state) {
        $("#video_title").html($("#video_"+idx).html());
    };

    $(document).ready(function() {
        $("#my_video_carousel").jcarousel({
            scroll: 1,
            auto: 2,
            wrap: 'both',
            initCallback: my_video_carousel_initCallback,
            // This tells jCarousel NOT to autobuild prev/next buttons
            buttonNextHTML: null,
            buttonPrevHTML: null,
            itemFirstInCallback:  videCallBack
        });
    });
</script>