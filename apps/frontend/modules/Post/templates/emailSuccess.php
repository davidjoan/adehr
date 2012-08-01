    <div class="notaDetalle">
        <img src="/images/frontend/logo.jpg" /><br/>
        
        <?php include_partial('General/alerts') ?>      
        
         
        <div class="breaker"></div>
        <div class="catTitulo"><a href="#"><b>Enviar a un Amigo</b></a></div>
        <br />
        <div class="breaker"></div>
        <div class="cdestacado">        

        <form id="contacts-form" action="<?php echo url_for('@post_email?slug='.$sf_request->getParameter('slug')) ?>" method="post">
                <fieldset>
                    <div class="field">
                        <label><?php echo'Correo destino:'; ?></label>
                        <?php echo $form['email_to']->render(); ?>
                    </div>
                    <div class="field">
                        <label><?php echo 'Correo Origen:'; ?></label>
                        <?php echo $form['email_from']->render(); ?>
                    </div>
                    <div class="field">
                        <label><?php echo 'Tu Nombre:'; ?></label>
                        <?php echo $form['name']->render(); ?>
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