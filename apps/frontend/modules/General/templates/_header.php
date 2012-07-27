<!-- header -->
<div id="header">
    <div id="cmenu">
        <div>Institucional: 
            <?php foreach($tree_institucional as $node): ?>
            <?php include_partial('General/link', array('node' => $node)); ?>
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
                <li><?php include_partial('General/link_orange', array('node' => $node)); ?>
                <?php if($node->getNode()->hasChildren()): ?>    
                    <div>
                        <ul>
                            <?php foreach($node->getNode()->getChildren() as $node): ?>
                            <li><?php include_partial('General/link_orange', array('node' => $node)); ?>
                                <?php if($node->getNode()->hasChildren()): ?>    
                                
                                <div>
                                    <ul>
                                        <?php foreach($node->getNode()->getChildren() as $node): ?>
                                        <li><?php include_partial('General/link_orange', array('node' => $node)); ?>
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