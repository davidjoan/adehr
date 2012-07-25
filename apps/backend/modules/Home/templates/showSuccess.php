Welcome!
<br/>
<h2>
  <?php echo $title; ?>
</h2>

<?php foreach($images as $image): ?>
  <img src="<?php echo htmlentities($image->getLargeThumb()); ?>" alt="" />
<?php endforeach; ?>
<br/>
<br/>
<br/>
<br/>
<br/>
