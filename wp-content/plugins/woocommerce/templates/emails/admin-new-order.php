<?php
/**
 * Admin new order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php echo __('You have received an order from', 'woocommerce') . ' ' . $order->billing_first_name . ' ' . $order->billing_last_name . __(". Their order is as follows:", 'woocommerce'); ?></p>

<?php do_action('woocommerce_email_before_order_table', $order, true); ?>

<h2><?php echo __('Order:', 'woocommerce') . ' ' . $order->get_order_number(); ?> (<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( __('jS F Y', 'woocommerce'), strtotime( $order->order_date ) ) ); ?>)</h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Product', 'woocommerce'); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Quantity', 'woocommerce'); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Price', 'woocommerce'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( false, true ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; $hello = $total['value'];?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>
<?php $total_int = (int)$hello;?>
<p>Z dôvodu že poskitujeme počitače presne podla požiadaviek zakaznika potrebujeme aby bola vopred zaplatená záloha vo výške 20% z celkovej sumi produktu.</p><br>
<p>Prosim pošlite <?php echo $total_int; ?> € pre potvrdenie objednávky.</p>
<ul class="order_details bacs_details"><li class="account_name">Názov účtu: <strong>Mbank</strong></li><li class="account_number">Číslo účtu: <strong>520700-4203411377</strong></li><li class="sort_code">Sort Code (len zahraničie): <strong>8360</strong></li><li class="bank_name">Názov banky: <strong>BRE Bank SA</strong></li><li class="iban">IBAN: <strong>SK10 8360 5207 0042 0341 1377</strong></li><li class="bic">BIC: <strong>BREXSKBX</strong></li></ul>

<br>


<?php do_action('woocommerce_email_after_order_table', $order, true); ?>

<h2><?php _e('Customer details', 'woocommerce'); ?></h2>

<?php if ($order->billing_email) : ?>
	<p><strong><?php _e('Email:', 'woocommerce'); ?></strong> <?php echo $order->billing_email; ?></p>
<?php endif; ?>
<?php if ($order->billing_phone) : ?>
	<p><strong><?php _e('Tel:', 'woocommerce'); ?></strong> <?php echo $order->billing_phone; ?></p>
<?php endif; ?>

<?php woocommerce_get_template('emails/email-addresses.php', array( 'order' => $order )); ?>

<?php do_action('woocommerce_email_footer'); ?>