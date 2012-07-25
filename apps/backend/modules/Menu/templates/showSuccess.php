<?php slot('title') ?>
  Menu
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Menu: <?php echo $form->getObject()->getName() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
