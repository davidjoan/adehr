<?php slot('title') ?>
  Categorias
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Categoria: <?php echo $form->getObject()->getName() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
