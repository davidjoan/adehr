<?php slot('title') ?>
  <?php echo $form->isNew() ? 'Nuevo' : 'Editar' ?> Tipo de Recurso
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
