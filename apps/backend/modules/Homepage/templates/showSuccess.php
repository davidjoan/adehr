<?php slot('title') ?>
  Pagina de Inicio
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Pagina de Inicio: <?php echo $form->getObject()->getPost() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
