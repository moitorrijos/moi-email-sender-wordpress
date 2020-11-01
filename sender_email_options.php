<?php
// Settings Page: Sender Email
// Retrieving values: get_option( 'your_field_id' )
// Settings Page: Sender Email
// Retrieving values: get_option( 'your_field_id' )

add_action('admin_menu', 'add_moi_sender_email_options');

function add_moi_sender_email_options() {
  add_options_page(
    'Información General Concord Security',
    'Opciones de Correo',
    'manage_options',
    'moi-opciones-correo',
    'moi_sender_email_options',
  );
  add_action( 'admin_init', 'register_moi_sender_email' );
}

function register_moi_sender_email() {
  register_setting('moi_sender_group', 'moi_sender_from_name');
  register_setting('moi_sender_group', 'moi_sender_from_email_address');
}

function moi_sender_email_options() {
  if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  ?>
    <div class="wrap">
      <h1>Opciones para el envío de correos electrónicos</h1>
      <form method="post" action="options.php">
        <table class="form-table">
          <tr valign="top">
            <th scope="row">
              <label for="moi_sender_from_name">
                Nombre del correo destinatario
              </label>
            </th>
            <td>
              <input
                type="text"
                name="moi_sender_from_name"
                id="moi_sender_from_name"
                value="<?php echo esc_attr( get_option('moi_sender_from_name') ); ?>"
                class="regular-text"
                required
              >
              <p class="description">
                Nombre del correo que debe aparecer como destinatario.
              </p>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row">
              <label form="moi_sender_from_email_address">
                Correo Electrónico del destinatario
              </label>
            </th>
            <td>
              <input
                type="text"
                name="moi_sender_from_email_address"
                id="moi_sender_from_email_address"
                value="<?php echo esc_attr( get_option('moi_sender_from_email_address') ); ?>"
                class="regular-text"
                required
              >
              <p class="description">
                Nombre del correo electrónico sin el nombre de dominio.
              </p>
            </td>
          </tr>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
  <?php
}
