<?php use_helper('Date', 'Text') ?>

<!-- Contenido centro -->
<div class="centro">
    <div class="notaDetalle">
        <h2><?php echo link_to($post->getTitle(), '@post_show?slug=' . $post->getSlug()) ?></h2>
        <?php if($post->getShowDates() == '1'): ?>
        <div class="iconos">
            <div class="izquierda">Escrito por <?php echo $post->getUserRealname(); ?>. Publicado: <?php echo $post->getFormattedDatetime(); ?></div>
            <div class="derecha">                    
                <a href="#"><?php echo link_to(image_tag('frontend/post/email'), '@post_email?slug='.$post->getSlug(),array('data-fancybox-type' => "iframe",'class' => "various")); ?></a>&nbsp;
                <a href="#"><?php echo link_to(image_tag('frontend/post/pdf'), '@post_pdf?slug='.$post->getSlug()); ?></a>&nbsp;
                <a href="#"><?php echo link_to(image_tag('frontend/post/print'), '@post_print?slug='.$post->getSlug(),array('data-fancybox-type' => "iframe",'class' => "various")); ?></a>&nbsp;
            </div>
        </div>
        <?php endif; ?>


        <p>
            <?php if ($post->getImage() <> ''): ?><?php echo image_tag($post->getThumbnailFilePath('image', 684), array('size' => '640x300')); ?><?php endif; ?>
        </p>
        <?php echo simple_format_text($post->getPostIndex()->getContent()) ?>

        <?php if($post->getShowDates() == '1'): ?>
        <div class="fecha">Escrito por <?php echo $post->getUserRealname(); ?>, <?php echo $post->getFormattedDatetime(); ?></div>
        <?php endif; ?>
        <div class="breaker"></div>
        <br />

        <div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>            


        <br />
        <?php if($post->getShowDates() == '1'): ?>
        <div class="breaker"></div>
        <?php if(count($post->getVideos()->toArray()) > 0): ?>
        <h2>Videos</h2>  
        
        <?php foreach($post->getVideos() as $video): ?>
        
        <h2><?php echo $video->getTitle(); ?></h2>
        <br/>
        <p><?php echo $video->getEmbed(); ?></p>
        <br/>
        <div class="breaker"></div>
        
        <?php endforeach; ?>
        
        <?php endif; ?>        

        <div class="breaker"></div>
        <?php if(count($post->getPhotos()->toArray()) > 0): ?>
        <h2>Fotos</h2>            

        <!-- Start Advanced Gallery Html Containers -->				
        <div class="navigation-container">
            <div id="thumbs" class="navigation">
                <a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page"></a>

                <ul class="thumbs noscript">
                    <?php foreach ($post->getPhotos() as $photo): ?>
                        <li>
                            <a class="thumb" name="<?php echo $photo->getTitle(); ?>" href="<?php echo $photo->getFilePath('path'); ?>" title="<?php echo $photo->getTitle(); ?>">
                                <img src="<?php echo $photo->getThumbnailFilePath('path', 75); ?>" alt="<?php echo $photo->getTitle(); ?>" />

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page"></a>
            </div>
        </div>
        <div class="content">
            <div class="slideshow-container">
                <div id="controls" class="controls"></div>
                <div id="loading" class="loader"></div>
                <div id="slideshow" class="slideshow"></div>
            </div>
        </div>
        
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<!-- /Contenido centro--> 

<script type="text/javascript">
    jQuery(document).ready(function($) {
        
	$(".various").fancybox({
		maxWidth	: 700,
		maxHeight	: 700,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});

        <?php if(count($post->getPhotos()->toArray()) > 0): ?>
        // We only want these styles applied when javascript is enabled
        $('div.content').css('display', 'block');

        // Initially set opacity on thumbs and add
        // additional styling for hover effect on thumbs
        var onMouseOutOpacity = 0.67;
        $('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
            mouseOutOpacity:   onMouseOutOpacity,
            mouseOverOpacity:  1.0,
            fadeSpeed:         'fast',
            exemptionSelector: '.selected'
        });
				
        // Initialize Advanced Galleriffic Gallery
        var gallery = $('#thumbs').galleriffic({
            delay:                     2500,
            numThumbs:                 10,
            preloadAhead:              10,
            enableTopPager:            false,
            enableBottomPager:         false,
            imageContainerSel:         '#slideshow',
            controlsContainerSel:      '#controls',
            captionContainerSel:       '#caption',
            loadingContainerSel:       '#loading',
            renderSSControls:          true,
            renderNavControls:         true,
            playLinkText:              'Iniciar Presentación',
            pauseLinkText:             'Pausar Presentación',
            prevLinkText:              '&lsaquo; Foto Anterior',
            nextLinkText:              'Siguiente Foto &rsaquo;',
            nextPageLinkText:          'Siguiente &rsaquo;',
            prevPageLinkText:          '&lsaquo; Anterior.',
            enableHistory:             true,
            autoStart:                 false,
            syncTransitions:           true,
            defaultTransitionDuration: 900,
            onSlideChange:             function(prevIndex, nextIndex) {
                // 'this' refers to the gallery, which is an extension of $('#thumbs')
                this.find('ul.thumbs').children()
                .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                .eq(nextIndex).fadeTo('fast', 1.0);

                // Update the photo index display
                this.$captionContainer.find('div.photo-index')
                .html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
            },
            onPageTransitionOut:       function(callback) {
                this.fadeTo('fast', 0.0, callback);
            },
            onPageTransitionIn:        function() {
                var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
                var nextPageLink = this.find('a.next').css('visibility', 'hidden');
						
                // Show appropriate next / prev page links
                if (this.displayedPage > 0)
                    prevPageLink.css('visibility', 'visible');

                var lastPage = this.getNumPages() - 1;
                if (this.displayedPage < lastPage)
                    nextPageLink.css('visibility', 'visible');

                this.fadeTo('fast', 1.0);
            }
        });

        /**************** Event handlers for custom next / prev page links **********************/

        gallery.find('a.prev').click(function(e) {
            gallery.previousPage();
            e.preventDefault();
        });

        gallery.find('a.next').click(function(e) {
            gallery.nextPage();
            e.preventDefault();
        });

        /****************************************************************************************/

        /**** Functions to support integration of galleriffic with the jquery.history plugin ****/

        // PageLoad function
        // This function is called when:
        // 1. after calling $.historyInit();
        // 2. after calling $.historyLoad();
        // 3. after pushing "Go Back" button of a browser
        function pageload(hash) {
            // alert("pageload: " + hash);
            // hash doesn't contain the first # character.
            if(hash) {
                $.galleriffic.gotoImage(hash);
            } else {
                gallery.gotoIndex(0);
            }
        }

        // Initialize history plugin.
        // The callback is called at once by present location.hash. 
        $.historyInit(pageload, "advanced.html");

        // set onlick event for buttons using the jQuery 1.3 live method
        $("a[rel='history']").live('click', function(e) {
            if (e.button != 0) return true;

            var hash = this.href;
            hash = hash.replace(/^.*#/, '');

            // moves to a new page. 
            // pageload is called at once. 
            // hash don't contain "#", "?"
            $.historyLoad(hash);

            return false;
        });
        <?php endif; ?>

        /****************************************************************************************/
    });
</script>        