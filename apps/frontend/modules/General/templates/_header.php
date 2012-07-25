<!-- header -->
<div id="header">
    <div id="cmenu">
        <div>Institucional: 
            <?php foreach($tree_institucional as $node): ?>
            <a href="#"><?php echo $node['name']?></a>
            <?php endforeach; ?>
            <a href="#">Contáctenos</a> <a href="#">Mapa de Sitio</a></div>
    </div>
    <div id="clogo">
        <a href="/"><img src="/images/frontend/logo.jpg" /></a>
        <div id="placeholder" style="width: 785px; height: 91px;"></div>
        <script>
                 $('#placeholder').crossSlide({
  sleep: 4,
  fade: 1
}, [
    <?php foreach($banners as $key => $banner): ?>
    <?php echo sprintf('{ src: "%s", dir: "%s" },',$banner->getFilePath('image'), ($key%2==0)?'up':'down');?>
    <?php endforeach; ?>
]);
        </script>
    </div>
    <div class="breaker"></div>
    <div id="csubmenu"> 
        <!-- Menu Naranja -->
        <div id="menu">
            <ul class="menu">
                <li><a href="/" class="parent"><span>Inicio</span></a></li>
                <?php foreach($tree_menu_principal as $node): ?>
                <li><a href="/" class="parent"><span><?php echo $node['name']; ?></span></a>
                <?php if($node->getNode()->hasChildren()): ?>    
                    <div>
                        <ul>
                            <?php foreach($node->getNode()->getChildren() as $node): ?>
                            <li><a href="#" <?php echo $node->getNode()->hasChildren()?'class="parent"':''; ?>><span><?php echo $node['name']; ?></span></a>
                                <?php if($node->getNode()->hasChildren()): ?>    
                                
                                <div>
                                    <ul>
                                        <?php foreach($node->getNode()->getChildren() as $node): ?>
                                        <li><a href="#" <?php echo $node->getNode()->hasChildren()?'class="parent"':''; ?>><span><?php echo $node['name']; ?></span></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </li>
                           <?php endforeach; ?>
                        </ul>
                    </div>                    
                <?php endif; ?>
                </li>
                <?php endforeach; ?>  
            </ul>
        </div>
        <!-- /Menu Naranja --> 
    </div>
</div>
<!-- /header -->