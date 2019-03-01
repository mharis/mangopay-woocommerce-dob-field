<?php
/**
 * Plugin Name: MANGOPAY WooCommerce Hide DoB field.
 * Plugin URI:
 * Description: Hides DoB field required for Mangopay.
 * Version: 1.0.0
 * Author: Haris Zulfiqar
 * Author URI: https://hariszulfiqar.com
 *
 * @package Mangopay
 * @since 1.0.0
 * @author Haris Zulfiqar <haris@hariszulfiqar.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Injects CSS styles on checkout page to hide MANGOPAY DoB field.
 *
 * @since 1.0.0
 * @author Haris Zulfiqar <haris@hariszulfiqar.com>
 */
function mangopay_woocommerce_hide_dob_field_styles() {
	if ( class_exists( 'WooCommerce' ) && is_checkout() ) :
	?>
		<style type="text/css">
			#user_birthday_field {
				display: none;
			}
		</style>
<?php
	endif;
}
add_action( 'wp_head', 'mangopay_woocommerce_hide_dob_field_styles' );

/**
 * Injects Javascript to add a dummy DOB field to the field.
 *
 * @since 1.0.0
 * @author Haris Zulfiqar <haris@hariszulfiqar.com>
 */
function mangopay_woocommerce_hide_dob_field_script() {
	if ( class_exists( 'WooCommerce' ) && is_checkout() ) :
	?>
		<script type="text/javascript">
			jQuery( document ).ready( function ( $ ) {
				$( '#user_birthday_field input' ).val( '<?php echo esc_html( date_i18n( get_option( 'date_format' ), '946684800' ) ); ?>' );
			} );
		</script>
<?php
	endif;
}
add_action( 'wp_head', 'mangopay_woocommerce_hide_dob_field_script' );
