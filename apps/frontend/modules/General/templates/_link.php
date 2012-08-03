<?php if($node->getPostId() <> ''): ?>
<?php echo link_to($node->getName(), '@post_show?slug='.$node->getPost()->getSlug()); ?>
<?php elseif($node->getCategoryId() <> ''): ?>
<?php echo link_to($node->getName(), '@post_section?slug='.$node->getCategory()->getSlug()); ?>
<?php else: ?>
<a href="#"><?php echo $node->getName(); ?></a>
<?php endif; ?>


