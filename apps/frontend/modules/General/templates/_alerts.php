<?php if($sf_user->hasFlash('error')): ?>    
    <div class="ui-widget"  style="width: 477px;padding: 10px 25px 25px;">
      <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
      <p>
      <strong>Error:</strong> <?php echo $sf_user->getFlash('error') ?></p>
      </div>
    </div>    
  <?php endif; ?> 
  <?php if($sf_user->hasFlash('notice')): ?>
    <div class="ui-widget"  style="width: 477px;padding: 10px 25px 25px;">
    <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
    <p>
    <strong>Gracias!</strong> <?php echo $sf_user->getFlash('notice') ?></p>
    </div>
    </div>    
  <?php endif; ?> 