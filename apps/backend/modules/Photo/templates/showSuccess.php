<?php slot('title') ?>
  Fotos
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Recurso: <?php echo $form->getObject()->getTitle() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
