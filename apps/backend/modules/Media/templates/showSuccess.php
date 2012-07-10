<?php slot('title') ?>
  Recurso
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Recurso: <?php echo $form->getObject()->getName() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
