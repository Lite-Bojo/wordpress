<!DOCTYPE html>
<html class="<?php echo wcdn_get_template_type(); ?>">
<head>
	<meta charset="utf-8">
	<title><?php wcdn_template_title(); ?></title>
	<?php wcdn_head(); ?>
	<link rel="stylesheet" href="<?php wcdn_stylesheet_url( 'style.css' ); ?>" type="text/css" media="screen,print" />
</head>
<body>
	<div id="container">
		<?php wcdn_navigation(); ?>
		<div id="content">
			<div id="page">
				<div id="letter-header">
					<div class="heading"><?php if( wcdn_get_company_logo_id() ) : ?><?php wcdn_company_logo(); ?><?php else : ?><?php wcdn_template_title(); ?><?php endif; ?>
					<h1 class="order-number-label"><?php wcdn_template_title(); ?></h1>
					</div>



	<div class="celok">


				<div class="adressy">
					<h4>Predávajúci:</h4>
						<div class="company">
							<div class="bold"><?php wcdn_company_name(); ?></div>
							<div class="companyinfo"><?php wcdn_company_info(); ?></div>
						</div>
					<h4><?php _e( 'Recipient', 'woocommerce-delivery-notes' ); ?></h4>
						<div class="shipping-info">							
						<?php if( wcdn_get_template_type() == 'invoice' ) : ?>
							<?php wcdn_billing_address(); ?></br>
							Tel:<?php wcdn_billing_phone(); ?>

						<?php else : ?>
							<?php wcdn_shipping_address(); ?></br>	
							Tel:<?php wcdn_billing_phone(); ?>
													
						<?php endif ?></br>

							



						<?php echo wcdn_get_order_custom_field('Meno Firmy');?></br>
<?php if (wcdn_get_order_custom_field('IČO')): echo "IČO: ".wcdn_get_order_custom_field('IČO')." </br>";?>
	<?php endif ?>
<?php if (wcdn_get_order_custom_field('DIČ')): echo "DIČ: ".wcdn_get_order_custom_field('DIČ')." </br>";?>
	<?php endif ?>
<?php if (wcdn_get_order_custom_field('IČ DPH')): echo "IČ DPH: ".wcdn_get_order_custom_field('IČ DPH');?>
	<?php endif ?>

						</div>
				</div>
	<!-- Wao nejaky if statement tu bol -->			



<table id="finfo">
<tr>
<th colspan="2">Fakturačné údaje</th>
</tr>
<tr>
<td><h3 class="order-date-label"><?php _e( 'Order Date', 'woocommerce-delivery-notes' ); ?></h3></td>
<td><span class="order-date"><?php wcdn_order_date(); ?></span></td>
</tr>

</tr>
<tr>
<td><h3 class="order-number-label"><?php _e( 'Order Number', 'woocommerce-delivery-notes' ); ?></h3></td>
<td><span class="order-number"><?php wcdn_order_number(); ?></span></td>
</tr>

</tr>
<tr>
<td><h3 class="order-payment-label"><?php _e( 'Payment Method', 'woocommerce-delivery-notes' ); ?></h3></td>
<td><span class="order-payment"><?php wcdn_payment_method(); ?></span></td>
</tr>
</table>

<div style="clear:both;"></div>
	</div>




















				<div id="order-items">
					<table>
						<thead>
							<tr>
								<th class="product-label"><?php _e('Product', 'woocommerce'); ?></th>
								<th class="quantity-label"><?php _e('Quantity', 'woocommerce'); ?></th>
								<th class="totals-label"><?php _e('Totals', 'woocommerce'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $items = wcdn_get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item ) : ?><tr>
								<td class="description"><?php echo $item['name']; ?></br>
									<span><?php echo $item['meta']; ?></span>
									<dl class="meta">
										<?php if( $item['sku'] ) : ?><dt><?php _e( 'SKU:', 'woocommerce-delivery-notes' ); ?></dt><dd><?php echo $item['sku']; ?></dd><?php endif; ?>
										<?php if( $item['weight'] ) : ?><dt><?php _e( 'Weight:', 'woocommerce-delivery-notes' ); ?></dt><dd><?php echo $item['weight']; ?><?php echo get_option('woocommerce_weight_unit'); ?></dd><?php endif; ?>
										<?php if( $item['download_url'] ) : ?><dt><?php _e( 'Download:', 'woocommerce-delivery-notes' ); ?></dt><dd><?php echo $item['download_url']; ?></dd><?php endif; ?>
									</dl>
								</td>
								<td class="quantity"><?php echo $item['quantity']; ?></td>
								<td class="price"><?php echo $item['price']; ?></td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div><!-- #order-items -->
				
				<div id="order-summary">
					<table>
						<tfoot>
							<?php foreach( wcdn_get_order_totals() as $total ) : ?>
							<tr>
								<th class="description"><?php echo $total['label']; ?></th>
								<td class="price"><?php echo $total['value']; ?></td>
							</tr>
							<?php endforeach; ?>
							<?php 
							global $wcdn;
							global $woocommerce;						
							$total_string = $wcdn->print->get_order()->get_order_total();
							$total_float = (float)$total_string;
							$precent_total = ($total_float/100) * 30;
							?>
							<tr>
								<th class="description"><?php echo 'Záloha' ?></th>
								<td class="price"><?php echo round($precent_total, 2) . ' €'; ?></td>
							</tr>
						</tfoot>
					</table>
				</div><!-- #order-summery -->
	
				<div id="order-notes">
					<div class="notes-shipping">
						<?php if ( wcdn_get_shipping_notes() ) : ?>
							<h3><?php _e( 'Customer Notes', 'woocommerce-delivery-notes' ); ?></h3>
							<?php wcdn_shipping_notes(); ?>
						<?php endif; ?>
					</div>
					<div class="notes-personal"><?php wcdn_personal_notes(); ?></div>
				</div><!-- #order-notes -->
					
				<?php if ( wcdn_get_policies_conditions() || wcdn_get_footer_imprint() ) : ?>
					<div id="letter-footer">
						<div class="policies"><?php wcdn_policies_conditions(); ?></div>
						<div class="imprint"><?php wcdn_footer_imprint(); ?></div>
					</div><!-- #letter-footer -->
				<?php endif; ?>
			</div><!-- #page -->
		</div><!-- #content -->
	</div><!-- #container -->
</body>
</html>