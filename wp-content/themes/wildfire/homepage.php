<?php
// Template Name: HomePage
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
	</div><!-- closing wight_container from header -->
	<?php echo get_new_royalslider(1); ?>
		<div class="pasik_orange"></div>
		<div class="shadow-effect">
	<div class="box2">
		<div class="line"></div>
			<div class="shadow"></div>
			<div class="square">
				<div class="squarein">
					<br><img src="images/wordpress.png" alt=""><br><span class="white">Počitačové zostavy</span><br><h4 class="h4_homepage">Naše zostavy vytvorené nami,<br>pre vás.</h4>
					<div class="squareRollover" style="display: none;"><a href="#"><br><img src="images/wordpress2.png" alt=""><br><span class="white">Počitačové zostavy</span><br><h4 class="h4_homepage_hover">Naše zostavy vytvorené nami,<br>pre vás.</h4></a></div>
				</div>
				<div class="squarein">
					<br><img src="images/joomla.png" alt=""><br><span class="white">Pomoc s výberom</span><br><h4 class="h4_homepage">Potrebujete pomôct s výberom <br>vášho počítača?</h4>
					<div class="squareRollover"><a href="#"><br><img src="images/joomla2.png" alt=""><br><span class="white">Pomoc s výberom</span><br><h4 class="h4_homepage_hover">Potrebujete pomôct s výberom <br>vášho počítača?</h4></a></div>
				</div>
				<div class="squarein squarein_right">
					<br><img src="images/html.png" alt=""><br><span class="white">Postav si sám!</span><br><h4 class="h4_homepage">Vyber si sám svoje časti počítača<br>len u nás.</h4>
					<div class="squareRollover"><a href="#"><br><img src="images/html2.png" alt=""><br><span class="white">Postav si sám!</span><br><h4 class="h4_homepage_hover">Vyber si sám svoje časti počítača<br>len u nás.</h4></a></div>
				</div>
				<div class="squarein">
					<br><img src="images/photoshop.png" alt=""><br><span class="white">Novinky</span><br><h4 class="h4_homepage">Novinky zo sveta pc techniky<br>a pc hier.</h4>
					<div class="squareRollover" style="display: none;"><a href="#"><br><img src="images/photoshop2.png" alt=""><br><span class="white">Novinky</span><br><h4 class="h4_homepage_hover">Novinky zo sveta pc techniky<br>a pc hier.</h4></a></div>
				</div>
				<div class="squarein">
					<br><img src="images/freebies.png" alt=""><br><span class="white">Doprava</span><br><h4 class="h4_homepage">Informácie o spôsoboch distribúcie<br>Lite počítačov.</h4>
					<div class="squareRollover"><a href="#"><br><img src="images/freebies2.png" alt=""><br><span class="white">Doprava</span><br><h4 class="h4_homepage_hover">Informácie o spôsoboch distribúcie<br>Lite počítačov.</h4></a></div>
				</div>
				<div class="squarein squarein_right">
					<br><img src="images/support.png" alt=""><br><span class="white">Informácie</span><br><h4 class="h4_homepage">Dodatočné informácie o spôsoboch platby<br>a predaji.</h4>
					<div class="squareRollover"><a href="#"><br><img src="images/support2.png" alt=""><br><span class="white">Informácie</span><br><h4 class="h4_homepage_hover">Dodatočné informácie o spôsoboch platby<br>a predaji.</h4></a></div>
				</div>
			</div>
		</div>
		</div>
<style type="text/css">
.header{position: absolute;}
div.site-main > div.clearfix{
height: 0px;
}
</style>

<?php if(of_get_option('homepage_sidebar', '0')): ?></div><!-- close #container-sidebar -->
<?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>