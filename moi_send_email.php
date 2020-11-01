<?php

add_action( 'wp_ajax_moi_sender_contact_form', 'moi_sender_send_email' );
add_action( 'wp_ajax_nopriv_moi_sender_contact_form', 'moi_sender_send_email' );

function moi_sender_send_email() {
  /**
   * Campos recibidos de formData.
   */
  $tu_nombre = $_POST['tu-nombre'];
  $tu_apellido = $_POST['tu-apellido'];
  $correo_electronico = $_POST['correo-electronico'];
  $numero_telefono = $_POST['numero-telefono'];
  $provincia = $_POST['provincia'];
  $tipo_empresa = $_POST['tipo-empresa'];
  $nombre_empresa = $_POST['nombre-empresa'];
  $tu_mensaje = $_POST['tu-mensaje'];

  /**
   * Correo extraído de las opciones de correo
   */
  $to_company = MOI_EMAIL_SENDER;
  $html_styles = 'style="font-family: sans-serif; font-size: 16px; width: 70ch"';

  ob_start();

?>

  <body>
    <h1 <?php echo $html_styles; ?>>Estimado Equipo Concord Security</h1>
    <p <?php echo $html_styles; ?>>Han Recibido un correo de <?php echo "$tu_nombre $tu_apellido"; ?></p>
    <p <?php echo $html_styles; ?>>
      Contáctelo al correo:
      <a href="<?php echo 'mailto:' . $correo_electronico; ?>"><?php echo $correo_electronico; ?></a>.
    </p>
    <p <?php echo $html_styles; ?>>El servicio requerido es: Terminales de reconocimiento facial y control de temperatura.</p>
    <p <?php echo $html_styles; ?>>Datos del prospecto:</p>
    <ul>
      <li <?php echo $html_styles; ?>>Número de teléfono: <?php echo $numero_telefono; ?></li>
      <li <?php echo $html_styles; ?>>Provincia: <?php echo $provincia; ?></li>
      <li <?php echo $html_styles; ?>>Tipo de Empresa: <?php echo $tipo_empresa; ?></li>
      <?php if ($tipo_empresa === "Persona Juridica") : ?>
        <li <?php echo $html_styles; ?>>Nombre de Empresa: <?php echo $nombre_empresa; ?></li>
      <?php endif; ?>
    </ul>
    <p <?php echo $html_styles; ?>>Mensaje:</p>
    <p <?php echo $html_styles; ?>><?php echo $tu_mensaje; ?></p>
    <p <?php echo $html_styles; ?>>Correo enviado desde el formulario de contacto.</p>
  </body>

<?php

  $mail_message_company = ob_get_clean();

  ob_start();

?>
  <h1 <?php echo $html_styles; ?>>Hola <?php echo "$tu_nombre $tu_apellido"; ?>,</h1>
  <p <?php echo $html_styles; ?>>
    Gracias por contactarnos a través de de nuestro formulario.
    Un agente de venta se contactará contigo muy pronto.
    Su consulta es muy importante para nosotros.
  </p>
  <p <?php echo $html_styles; ?>>Atentamente,</p>
  <p <?php echo $html_styles; ?>>Equipo de venta de Concord Security, S. A.</p>
<?php
  
  $mail_message_client = ob_get_clean();

  $mail_subject_company = "Mensaje de Formulario Web";
  
  $mail_subject_client = "Gracias por contactarnos";

  $headers = array('Content-Type: text/html; charset=UTF-8');

  wp_mail( $correo_electronico, $mail_subject_client, $mail_message_client, $headers );

  wp_mail( $to_company, $mail_subject_company, $mail_message_company, $headers );

  wp_send_json_success();
  
}
