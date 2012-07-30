<!-- Contenido centro -->
<div class="centro">
    <div class="notaDetalle">
        <?php include_partial('General/alerts') ?>      
        <br />
        <div class="breaker"></div>
        <div class="catTitulo"><a href="#"><b>Formulario de Contacto</b></a></div>
        <br />
        <div class="breaker"></div>
        <div class="cdestacado">

            <form id="contacts-form" action="<?php echo url_for('@contact') ?>" method="post">
                <fieldset>
                    <div class="field">
                        <label><?php echo'Nombres:'; ?></label>
                        <?php echo $form['name']->render(); ?>
                    </div>
                    <div class="field">
                        <label><?php echo 'E-mail:'; ?></label>
                        <?php echo $form['email']->render(); ?>
                    </div>
                    <div class="field">
                        <label><?php echo 'Empresa:'; ?></label>
                        <?php echo $form['company']->render(); ?>
                    </div>
                    <div class="field">
                        <label><?php echo 'Asunto:'; ?></label>
                        <?php echo $form['subject']->render(); ?>
                    </div>        
                    <div class="field">
                        <label><?php echo 'Mensaje:'; ?></label>
                        <?php echo $form['message']->render(); ?>
                    </div>
                    <div class="field">
                        <label>Captcha:</label>
                        <?php echo $form['_csrf_token'] ?>
                        <?php echo $form['captcha'] ?><br/><br/>
                    </div>        
                    <div class="field">
                        <label>&nbsp;</label>
                        <?php echo image_tag(url_for('@image', true)) ?>
                    </div>        
                    <div><input type="submit" value="<?php echo 'Enviar Mensaje'; ?>" /></div>
                </fieldset>
            </form>
        </div>
    </div>
    <br />
    <div class="breaker"></div>

    <div class="masArticulos">Si tienes alguna duda, comentario o necesitas mas información no dudes en escribirnos.</div>

    <div class="breaker"></div>

</div>