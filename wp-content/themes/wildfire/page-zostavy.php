<?php
// Template Name: Zostavy
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/css/bootstrap.min.css">
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/js/bootstrap.min.js'></script>
<STYLE TYPE="text/css">
label, .progress{
margin-bottom: 0px;
}
</STYLE>
<?php while ( have_posts() ) : the_post(); ?>

</div><!-- close .width-container -->

<div style="padding:0px" id="highlight-container">
	<div class="width-container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="clearfix"></div>
	</div>
</div><!-- close #highlight-container -->
<div class="width-container">



<div class="content-container">

    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => 'gaming', 'orderby' => 'rand');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();  ?>
        <div class="zostavy_div_2">
          <h5><?php echo $loop->post->post_title; ?></h5>
         
          <a href="#"><?php the_post_thumbnail( thumbnail ); ?> </a>
        
          <div class="zostavy_div">

            <label>Hry</label>
            <div class="progress progress-striped active">
     <div class="bar" style="background-color: rgb(202, 55, 55); width: 20%;"></div>
    </div>
    <label>Programy</label>
    <div class="progress progress-striped active">
     <div class="bar" style="background-color: rgb(202, 143, 55); width: 73%;"></div>
    </div>
    <label>Spotreba</label>
    <div class="progress progress-striped active">
     <div class="bar" style="background-color: rgb(120, 202, 55); width: 62%;"></div>
    </div>
    <label>Hlučnosť</label>
    <div class="progress progress-striped active">
     <div class="bar" style="background-color: rgb(55, 202, 196); width: 73%;"></div>
    </div>
          </div>


          <div class="zostavy_cena_div">
              <label class="zostavy_div_3"><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?>€</label> 
          <div class="zostavy_kupit_btn btn-group">
  <button class="btn btn-warning">Kupiť</button>
  <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <a href="#"><li>Pridať do košika</li></a>
    <a href="#"><li>Konfigurovať</li></a>
  </ul>
</div>
</div>





</div>




    <?php endwhile; ?>

<?php wp_reset_query(); ?>


</div><!-- close .content-container -->

<?php endwhile; // end of the loop. ?>










<?php if(of_get_option('page_comments_default', '0')): ?><?php comments_template( '', true ); ?><?php endif; ?>
	

<?php get_footer(); ?>