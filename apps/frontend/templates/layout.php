<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>    
<body onload="MM_preloadImages('/images/frontend/buscOver.jpg','/images/frontend/img_26over.png','/images/frontend/img_28over.png','/images/frontend/img_30Over.png','/images/frontend/img_32Over.png')">
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
    
