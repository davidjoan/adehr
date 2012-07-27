<?php if($node->getCategoryId() == ''): ?>
<a href="<?php echo url_for('@post_show?slug='.$node->getPost()->getSlug()); ?>" <?php echo $node->getNode()->hasChildren()?'class="parent"':''; ?>><span><?php echo $node->getName(); ?></span></a>
<?php elseif($node->getPostId() == ''): ?>
<a href="<?php echo url_for('@post_section?slug='.$node->getCategory()->getSlug()); ?>" <?php echo $node->getNode()->hasChildren()?'class="parent"':''; ?>><span><?php echo $node->getName(); ?></span></a>
<?php endif; ?>



