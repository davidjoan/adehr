<?php slot('title') ?>
  Articulos
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Articulo: <?php echo $form->getObject()->getTitle() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
