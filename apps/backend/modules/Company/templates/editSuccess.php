<?php slot('title') ?>
  <?php echo $form->isNew() ? 'Agregar' : 'Editar' ?> Datos de la Empresa
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
