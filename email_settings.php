<?php

/**
 * Change the original email address
 * from wordpress@concordsecurity.org 
 * to ventas@concordsecurity.org
 */
function moi_custom_wp_mail_from( $original_email_address ) {
  $new_email_address = get_option( 'from_email_address' );
  return str_replace( 'wordpress@', $new_email_address, $original_email_address );
}

add_filter( 'wp_mail_from', 'moi_custom_wp_mail_from' );

function moi_custom_wp_from_name( $original_from_name ) {
  $new_from_name = get_option( 'from_name' );
  return str_replace( 'WordPress', $new_from_name, $original_from_name );
}

add_filter( 'wp_mail_from_name', 'moi_custom_wp_from_name' );
