<?php slot('title') ?>
  <?php echo $form->isNew() ? 'Nueva' : 'Editar' ?> Tag
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>
