<table>
  <tr>
    <td class="left">
      <?php echo link_to(image_tag('general/logo.jpg', array('height' => '60px')), 'http://www.adehr.org.pe') ?>
    </td>
    <td class="right">
      <?php echo image_tag('backend/secure_user.png') ?>&nbsp;<?php echo $sf_user->getUsername() ?>
    </td>
  </tr>
</table>
