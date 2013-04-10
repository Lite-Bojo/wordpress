<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php printf(__("Ďakujeme za vytvorenie účtu na %s. Vaše užívateľské meno je <strong>%s</strong>.", 'woocommerce'), $blogname, $user_login); ?></p>

<p><?php printf(__("Tu môžete pristupovať k svojmu účtu: %s.", 'woocommerce'), get_permalink(woocommerce_get_page_id('myaccount'))); ?></p>

<div style="clear:both;"></div>

<?php do_action('woocommerce_email_footer'); ?>