<?php
/*
Plugin Name:  Moi Sender Email
Plugin URI:   https://github.com/moitorrijos/moi-email-sender-wordpress
Description:  An email sender for WordPress.
Version:      0.4
Author:       Juan Moises Torrijos
Author URI:   https://moitorrijos.com/
Text Domain:  moiemailsender
Domain Path:  languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'MOI_EMAIL_SENDER', 'ventas@' );
define( 'MOI_NAME_SENDER', 'Concord Security' );

// include( plugin_dir_path( __FILE__ ) . 'sender_email_options.php' );
include( plugin_dir_path( __FILE__ ) . 'email_settings.php' );
include( plugin_dir_path( __FILE__ ) . 'moi_send_email.php');
