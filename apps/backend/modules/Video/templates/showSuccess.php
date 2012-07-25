<?php slot('title') ?>
  Videos
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Video: <?php echo $form->getObject()->getTitle() ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
