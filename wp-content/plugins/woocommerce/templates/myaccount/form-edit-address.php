<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce, $current_user;

get_currentuserinfo();
?>

<?php $woocommerce->show_messages(); ?>




<?php if (!$load_address) : ?>

	<?php woocommerce_get_template('myaccount/my-address.php'); ?>

<?php else : ?>

	<form action="<?php echo esc_url( add_query_arg( 'address', $load_address, get_permalink( woocommerce_get_page_id('edit_address') ) ) ); ?>" method="post">

		<h3><?php if ($load_address=='billing') _e('Billing Address', 'woocommerce'); else _e('Shipping Address', 'woocommerce'); ?></h3>

		<?php




  $waofields = array(
    'company-name' => array(
    'label'         => __('Meno firmy'),
    'type'          => 'text',
    'class'   => array('form-row-first')
    ),
    'ICO' => array(
    'label'         => __('IČO'),
    'type'          => 'text',
    'class'   => array('form-row-last'),
    'clear'     => true
    ),
    'ICDPH' => array(
    'label'         => __('IČ DPH'),
    'type'          => 'text',
    'class'   => array('form-row-first'),
    ),
    'DIC' => array(
    'label'         => __('DIČ'),
    'type'          => 'text',
    'class'   => array('form-row-last'),
    'clear'     => true
    ));

$address = array_merge($address,$waofields);













		$updatecislo=1;
		//krajsie update zobraz
		$waoeeeer = 1;
		foreach ($address as $keyy => $field) {
			if (isset($_POST[$keyy])) {
			$field_valuee = $_POST[$keyy];
			
			if ($field_valuee!=get_user_meta( get_current_user_id(), $keyy, true ) && $waoeeeer == 1) {
				echo '<p class="woocommerce_info">Vaše údaje boli aktualizované</p>';
				$waoeeeer = 0;
			};
			update_user_meta( get_current_user_id(), $keyy, $field_valuee);
		};
		};
		
		foreach ($address as $key => $field) :
			$value = (isset($_POST[$key])) ? $_POST[$key] : get_user_meta( get_current_user_id(), $key, true );

			// Default values
			if (!$value && ($key=='billing_email' || $key=='shipping_email')) $value = $current_user->user_email;
			if (!$value && ($key=='billing_country' || $key=='shipping_country')) $value = $woocommerce->countries->get_base_country();
			if (!$value && ($key=='billing_state' || $key=='shipping_state')) $value = $woocommerce->countries->get_base_state();

			woocommerce_form_field( $key, $field, $value );
		endforeach;
		?>
		

<!--
		<p class="form-row form-row-first" id="billing_phone_field">
					<label for="billing_name_company" class="">Názov spoločnosti </label>
					<input type="text" class="input-text" name="billing_name_company" id="billing_name_company" value="<?php  echo get_user_meta( get_current_user_id(), 'company-name', true );?>">
		</p>

		<p class="form-row form-row-last" id="billing_phone_field">
					<label for="billing_ICO" class="">IČO </label>
					<input type="text" class="input-text" name="billing_ICO" id="billing_ICO" value="<?php  echo get_user_meta( get_current_user_id(), 'ICO', true );?>">
		</p>
		<p class="form-row form-row-first" id="billing_phone_field">
					<label for="billing_ICDPH" class="">IČ DPH </label>
					<input type="text" class="input-text" name="billing_ICDPH" id="billing_ICDPH" value="<?php  echo get_user_meta( get_current_user_id(), 'ICDPH', true );?>">
		</p>
		<p class="form-row form-row-last" id="billing_phone_field">
					<label for="billing_DIC" class="">DIČ </label>
					<input type="text" class="input-text" name="billing_DIC" id="billing_DIC" value="<?php  echo get_user_meta( get_current_user_id(), 'DIC', true );?>">
		</p>
-->
<input type="submit" class="button" name="save_address" value="<?php _e('Save Address', 'woocommerce'); ?>" />
<!-- Wao pridany button spet na edim my adress -->
<?php $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
  if ( $myaccount_page_id ) {
    $myaccount_page_url = get_permalink( $myaccount_page_id );
    echo "<a class='button' href='$myaccount_page_url'>
    				Späť
				</a>";
} ?>
		


	</form>
<?php endif; ?>
