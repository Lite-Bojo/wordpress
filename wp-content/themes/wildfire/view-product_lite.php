<?php
// Template Name: View_Product
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/jquery.jqzoom-core.js'></script>
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/trapko.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/jquery.jqzoom.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/bootstrap.min.css">

<ul class="cases_overflow">
    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => 'computercase', 'orderby' => 'rand');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();  ?>
                <?php //echo wp_get_attachment_image( 1 ); ?>
                <li class="cases_overflow_li" data-id="<?php echo $loop->post->ID; ?>">    
                   <a href="#"><?php the_post_thumbnail( thumbnail ); ?> </a>               
                </li>
    <?php endwhile; ?>
</ul><!--/.products-->
<?php wp_reset_query(); ?>
<div class='product_images'>
<div class='main_image'>
<?php
    $product = ($_GET['pc']) ? $_GET['pc'] : 0 ;
    $args = array(
      'post_type' => 'product',
      'product' => $product,
      'posts_per_page' => 1
      );
    $loop2 = new WP_Query( $args );
    while ( $loop2->have_posts() ) : $loop2->the_post(); 
     the_post_thumbnail( medium );
    endwhile;
?>
  <?php wp_reset_query(); ?>
</div>
<div class='custom_images'>
<?php
$argumenty = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' =>'any', 'post_parent' => $loop2->post->ID ); 
            $attachments = get_posts($argumenty);
            if ($attachments) {
                 foreach ( $attachments as $attachment ) {
           echo wp_get_attachment_image( $attachment->ID, thumbnail, false, array('data-id'=> $attachment->ID) );
                 }
            };

?>
</div>
</div>

 <div class="accordion accordion_bojo" id="accordion">
   <div class="accordion-group">
     <div class="accordion-heading">
       <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
         <div class="bojo_arrow"></div>Filter pre skrinky
       </a>
     </div>
     <div id="collapseOne" class="accordion-body collapse in">
       <div class="accordion-inner">
         <div class="tabbable tabs-left">
           <ul class="nav nav-tabs">
             <li class="active"><a href="#1" data-toggle="tab">Určenie a Veľkosť</a></li>
             <li><a href="#2" data-toggle="tab">Farba</a></li>
             <li><a href="#3" data-toggle="tab">Vnútorné usporiadanie</a></li>
             <li><a href="#4" data-toggle="tab">Vonkajšie usporiadanie</a></li>
           </ul>
           <div class="tab-content">
             <div class="tab-pane active" id="1">
              <div>
               <form>
               <table class="case_filter_table_1">
                <tr>
                <td><label class="case_filter_label">Veľkosť </label></td>
                <td><label class="case_filter_label">Určenie</label></td>
                </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Big Tower</td>
                    <td><input id="filter" type="checkbox" name="vehicle" value="Car">Kancelárske PC</td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Midi Tower</td>
                    <td><input id="filter" type="checkbox" name="vehicle" value="Car">Tiché PC</td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Mini Tower</td>
                    <td><input id="filter" type="checkbox" name="vehicle" value="Car">Herný PC</td>
                  </tr>
                </table>
               </form>
              </div>
             </div>
             <div class="tab-pane" id="2">
               <form>
               <table class="case_filter_table_1">
                <tr>
                <td><label class="case_filter_label">Farba</label></td>
                </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Biela</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/white.png" alt=""></td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Čierna</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/black.png" alt=""></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Červená</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/red.png" alt=""></td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Oranžová</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/orange.png" alt=""></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Šedá</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/grey.png" alt=""></td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Strieborná</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/silver.png" alt=""></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Zelená</td>
                    <td><img src="<?php echo home_url("/"); ?>wp-content/themes/wildfire/images/farby/green.png" alt=""></td>
                    <td><!-- imput checkbox --></td>
                    <td><!-- obr farby --></td>
                  </tr>
                </table>
               </form>
             </div>
             <div class="tab-pane" id="3">
               <form>
               <table class="case_filter_table_1">
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Formát základnej dosky <div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">eATX</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">ATX</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">mATX</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">mITX</td>
                  </tr>
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Počet interných 3,5" slotov <div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td colspan="3">Slider ktory nemam</td>
                  </tr>
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Pozícia zdroja <div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Hore</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Dole</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Iná</td>
                  </tr>
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Ďalšie vybavenie <div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input id="filter" type="checkbox" name="Red" value="pa_color">Manažment Káblov</td>
                    <td colspan="2"><input id="filter" type="checkbox" name="Red" value="pa_color">Zvuková Izolácia</td>
                  </tr>
                  <tr>
                    <td colspan="2"><input id="filter" type="checkbox" name="Red" value="pa_color">Zvuková Izolácia</td>
                    <td colspan="2"><input id="filter" type="checkbox" name="Red" value="pa_color">Prachové Filtre</td>
                  </tr>
                  <tr>
                    <td colspan="2"><input id="filter" type="checkbox" name="Red" value="pa_color">Podpora SSD (2,5")</td>
                  </tr>
               </table>
               </form>
             </div>
              <div class="tab-pane" id="4">
               <form>
               <table class="case_filter_table_1">
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Externá 5,25" pozícia<div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr><td>nemam slider</td></tr>
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Konektory predného panelu<div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">USB 2.0</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">USB 3.0</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">eSATA</td>
                  </tr>
                  <tr>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">FireWire</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Slúchadlá</td>
                    <td><input id="filter" type="checkbox" name="Red" value="pa_color">Mikrofón</td>
                  </tr>
                  <tr>
                    <td colspan="4"><label class="case_filter_label">Ďalšie vybavenie<div class="pasik_orange_1px"></div></label></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input id="filter" type="checkbox" name="Red" value="pa_color">Osvetlenie</td>
                  </tr>
                  <tr><td colspan="3"><input id="filter" type="checkbox" name="Red" value="pa_color">Podpora vodného chladenia</td></td>
                  <tr><td colspan="3"><input id="filter" type="checkbox" name="Red" value="pa_color">Regulácia ventilátorov</td></td>
                  <tr><td colspan="3"><input id="filter" type="checkbox" name="Red" value="pa_color">Priehľadná bočnica</td></td>
               </table>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
<div class="clearfix"></div>
</div>
<div class="pasik_orange_out_of_wrapper"></div>
<div class="width-container">
  <?php
    $argsll = array(
      'post_type' => 'product'
      );
    $loopll = new WP_Query( $argsll );
    if ( $loop->have_posts() ) {
      while ( $loopll->have_posts() ) : $loopll->the_post();
      print_r($loopll->ID);
      endwhile;
    } else {
      echo __( 'No products found' );
    }
  ?>
<?php  

 do_action( 'woocommerce_before_single_product_summary' );
do_action( 'woocommerce_single_product_summary' );
do_action( 'woocommerce_after_single_product_summary' );



?>

<?php if(of_get_option('homepage_sidebar', '0')): ?></div><!-- close #container-sidebar -->
<?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>
