<?php if($node->getPostId() <> ''): ?>
<?php echo link_to($node->getName(), '@post_show?slug='.$node->getPost()->getSlug()); ?>
<?php else: ?>
<?php echo link_to($node->getName(), '@post_section?slug='.$node->getCategory()->getSlug()); ?>
<?php endif; ?>


