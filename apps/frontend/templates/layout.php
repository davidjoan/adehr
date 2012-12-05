<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta name="google-site-verification" content="TBgzYgY-Kauqs6TWFvvdBjCBLdVFutb7GPmv-EczBjA" />
    <meta name="google-site-verification" content="oYrgY7WY7yLr38XTUBtIRxkhUvom1p_MMy6MlKa6xHI" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="/css/jquery/autocompleter.css" />
    <script type="text/javascript" src="/js/widget/sfWidgetFormJQueryCompleter.js"></script>
<script type="text/javascript" src="/js/general/general.js"></script>
<script type="text/javascript" src="/js/general/crud.js"></script>    
    <?php include_javascripts() ?>
    <script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36701510-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>    
<body onload="MM_preloadImages('/images/frontend/buscOver.jpg','/images/frontend/img_26over.png','/images/frontend/img_28over.png','/images/frontend/img_30Over.png','/images/frontend/img_32Over.png')">
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=298486193583518";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="principal">
  <div class="superior">
    <div class="contenido"> 
      <?php include_component('General', 'header') ?>
      <div class="wrap"> 
        <?php echo $sf_content ?>
        <?php include_component('General', 'banner') ?>
        <div class="breaker"></div>
      </div>
    </div>
  </div>
  <?php include_partial('General/footer') ?>
</div>
</body>
</html>
    
