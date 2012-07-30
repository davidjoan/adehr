<div class="centro">
    <div class="notaDetalle">
        <div class="catTitulo"><a href="#"><b>Mapa del Sitio</b></a></div>
    </div>
            <br />
            <div class="breaker"></div>

    <ul id="primaryNav" class="col2">
        <li><a href="http://www.adehr.org.pe">Institucional</a>
            <ul>
                <?php foreach ($tree_institucional as $node): ?>
                    <li><?php include_partial('General/link', array('node' => $node)); ?></li>
                <?php endforeach; ?>
                <li><a href="/contact">Contactenos</a></li>
                <li><a href="/sitemap">Mapa del Sitio</a></li>
            </ul>
        </li>
        <li><a href="http://www.adehr.org.pe">Inicio</a>
            <ul>
                <?php foreach ($tree_menu_principal as $node): ?>
                    <li><?php include_partial('General/link', array('node' => $node)); ?></li>
                    <?php if ($node->getNode()->hasChildren()): ?>
                        <ul>
                            <?php foreach ($node->getNode()->getChildren() as $node): ?>
                                <li><?php include_partial('General/link', array('node' => $node)); ?></li>
                                <?php if ($node->getNode()->hasChildren()): ?>
                                    <ul>
                                        <?php foreach ($node->getNode()->getChildren() as $node): ?>
                                            <li><?php include_partial('General/link', array('node' => $node)); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>

    </ul>    

</div>