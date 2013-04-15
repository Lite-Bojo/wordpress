
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
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/realman.js'></script>
<script type='text/javascript' src='<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/chosen.jquery.min.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/jquery.jqzoom.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_url("/"); ?>wp-content/themes/wildfire/js/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">


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
  <img style="position:absolute;" src="<?php echo home_url("/"); ?>images/choose-case-medium.png" alt="">
</div>
<div class='custom_images'>
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

<div class="options_pc_right">
<div class="alert alert-error">
</div>

<div class="alert alert-block">
  <div>
    <p style="margin-top:28px; float:left;">Cena:</p>
    <div class="product_totals custom_total_price">
    <label class="gfield_label"></label>
      <div class="ginput_container">
        <span class="formattedTotalPrice ginput_total"></span>
      </div>
    </div>
    <div class="pasik_orange_1px"></div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
</div>


</div>
<div class="options_pc"><?php do_action( 'woocommerce_single_product_summary' );?></div>
<div class="clearfix"></div>
<div class="product_tooltip">
  <div class="product_tooltip_image"><img src="http://content.hwigroup.net/images/products/xl/152868/asus_gtx670dc22gd5.jpg" alt=""></div>
  <div class="product_tooltip_popis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
</div>


<!-- chbaju otazniky
<php if(of_get_option('homepage_sidebar', '0')): ></div>
<php get_sidebar(); ><php// endif; ?>
<php get_footer(); >
-->
