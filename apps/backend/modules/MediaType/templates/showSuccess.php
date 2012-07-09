<?php slot('title') ?>
  Tipo de Recurso
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Tipo de Recurso: <?php echo $form->getObject()->getName() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
