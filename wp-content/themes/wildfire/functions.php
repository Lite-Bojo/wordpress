<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


// Post Thumbnails
add_theme_support('post-thumbnails');



/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since progression 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}


if ( ! function_exists( 'progression_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
function progression_setup() {
	
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Custom template tags for this theme.  Blog Comments Found Here
	 */
	require( get_template_directory() . '/inc/template-tags.php' );


	/**
	 * Registering Custom Meta Boxes 
	 * https://github.com/tammyhart/Reusable-Custom-WordPress-Meta-Boxes
	 * Include the file that creates the class and a file that instantiates the class
	 */
	require( get_template_directory() . '/metaboxes/meta_box.php' );
	require( get_template_directory() . '/inc/custom_meta_boxes.php' );
	
	
	// Include widgets
	require( get_template_directory() . '/widgets/widgets.php' );
	
	
	// Shortcodes
	include_once('shortcodes.php');
	

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on progression, use a find and replace
	 * to change 'progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'progression', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );



	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'progression' ),
	) );
	


}
endif; // progression_setup
add_action( 'after_setup_theme', 'progression_setup' );





/**
 * Recommended Plugins require( get_template_directory() . '/inc/recommended-plugins.php' );
 */





/**
 * Registering Custom Post Type
 */
add_action('init', 'pyre_init');
function pyre_init() {
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio-type'),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'can_export' => true,
		)
	);

	register_taxonomy('portfolio_type', 'portfolio', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
}




/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since progression 1.0
 */
function progression_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'progression' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="sidebar-spacer"></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'progression' ),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
}
add_action( 'widgets_init', 'progression_widgets_init' );




// Pagination
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><span class='arrows'>&lsaquo;</span></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a href='#' class='selected'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'><span class='arrows'>&rsaquo;</span></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><span class='arrows'>&raquo;</span></a>";
         echo "</div>\n";
     }
}





// Pagination
function infinite_kriesi_pagination($pages = '', $range = 1)
{  
     $showitems = ($range);  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }

     }   

     if(1 != $pages)
     {
         echo "";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "";

         if($paged > 1 && $showitems < $pages) echo "";


         for ($i=1; $i <= $pages; $i++)
         {
	
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range+1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "":"<nav id='page-nav'><a href='".get_pagenum_link($i)."'>".__('Load More', 'progression')."</a></nav>";
             }
			
         }
        
         echo "\n";
     }

	
}








/**
 * Enqueue scripts and styles
 */
function progression_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array( 'style' ) );
	wp_enqueue_style( 'shortcodes', get_template_directory_uri() . '/css/shortcodes.css', array( 'style' ) );
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Dosis:300|PT+Sans:400,700|PT+Sans+Narrow', array( 'style' ) );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.0.6.min.js', false, '20120206', false );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', false );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', false );
	wp_enqueue_script( 'shortcodes', get_template_directory_uri() . '/js/progression-shortcodes-lib.js', array( 'jquery' ), '20120206', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_page_template('page-contact.php' && 'page-contact-full.php')  ) {
		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=true', false, '20120206', false );
		wp_enqueue_script( 'go-mapsapi', get_template_directory_uri() . '/js/jquery.gomap-1.3.2.min.js', array( 'google-maps' ), '20120206', false );
	}
}
add_action( 'wp_enqueue_scripts', 'progression_scripts' );
















function wildfire_customize_register($wp_customize)
{
	
	$wp_customize->add_section( 'wildfire_text_scheme' , array(
	    'title'      => __('Font Colors','progression'),
	    'priority'   => 35,
	) );
	
	$wp_customize->add_setting('body_text', array(
	    'default'     => '#777777'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_text', array(
		'label'        => __( 'Body Default Font Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'body_text',
		'priority'   => 10,
	)));
	
	
	$wp_customize->add_setting('navigation_text', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navigation_text', array(
		'label'        => __( 'Navigation Font Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'navigation_text',
		'priority'   => 20,
	)));
	
	
	$wp_customize->add_setting('page_title_text', array(
	    'default'     => '#2f2f2f'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_title_text', array(
		'label'        => __( 'Page Title Font Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'page_title_text',
		'priority'   => 30,
	)));
	
	
	$wp_customize->add_setting('link_color', array(
	    'default'     => '#f46553'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
		'label'        => __( 'Link and Post Hover Font Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'link_color',
		'priority'   => 40,
	)));
	
	
	$wp_customize->add_setting('link_hover_color', array(
	    'default'     => '#484f61'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_hover_color', array(
		'label'        => __( 'Default Link Hover Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'link_hover_color',
		'priority'   => 50,
	)));
	
	
	
	$wp_customize->add_setting('headings_default_color', array(
	    'default'     => '#2f2f2f'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'headings_default_color', array(
		'label'        => __( 'Headings Text Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'headings_default_color',
		'priority'   => 60,
	)));
	
	
	$wp_customize->add_setting('sidebar_headings_default', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_headings_default', array(
		'label'        => __( 'Sidebar Headings Text Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'sidebar_headings_default',
		'priority'   => 70,
	)));
	
	
	$wp_customize->add_setting('footer_text_color', array(
	    'default'     => '#cbcbcb'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
		'label'        => __( 'Footer Text Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'footer_text_color',
		'priority'   => 80,
	)));
	
	$wp_customize->add_setting('footer_link_color', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_link_color', array(
		'label'        => __( 'Footer Heading and Link Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'footer_link_color',
		'priority'   => 90,
	)));
	
	
	$wp_customize->add_setting('footer_link_hover', array(
	    'default'     => '#d3d3d3'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_link_hover', array(
		'label'        => __( 'Footer Link Hover Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'footer_link_hover',
		'priority'   => 100,
	)));
	
	
	$wp_customize->add_setting('button_text_color', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_text_color', array(
		'label'        => __( 'Button Text Link Color', 'progression' ),
		'section'    => 'wildfire_text_scheme',
		'settings'   => 'button_text_color',
		'priority'   => 75,
	)));
	
	
	$wp_customize->add_section( 'wildfire_color_scheme' , array(
	    'title'      => __('Background Colors','progression'),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting('header_bg', array(
	    'default'     => '#f46553'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg', array(
		'label'        => __( 'Header Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'header_bg',
		'priority'   => 1,
	)));
	
	
	
	
	$wp_customize->add_setting('page_title_background', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_title_background', array(
		'label'        => __( 'Page Title Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'page_title_background',
		'priority'   => 10,
	)));
	
	
	$wp_customize->add_setting('body_bg', array(
	    'default'     => '#f1f1f1'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_bg', array(
		'label'        => __( 'Body Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'body_bg',
		'priority'   => 20,
	)));
	
	
	$wp_customize->add_setting('content_bg', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content_bg', array(
		'label'        => __( 'Content Container Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'content_bg',
		'priority'   => 30,
	)));
	
	
	
	$wp_customize->add_setting('footer_bg', array(
	    'default'     => '#3d4352'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg', array(
		'label'        => __( 'Footer Base Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'footer_bg',
		'priority'   => 50,
	)));
	
	
	$wp_customize->add_setting('footer_top_bg', array(
	    'default'     => '#4c5365'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_top_bg', array(
		'label'        => __( 'Footer Widget Area Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'footer_top_bg',
		'priority'   => 40,
	)));
	
	
	$wp_customize->add_setting('button_bg', array(
	    'default'     => '#f46553'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_bg', array(
		'label'        => __( 'Button Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'button_bg',
		'priority'   => 60,
	)));
	
	
	
	$wp_customize->add_setting('button_hover_bg', array(
	    'default'     => '#484f61'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_hover_bg', array(
		'label'        => __( 'Button Hover Background Color', 'progression' ),
		'section'    => 'wildfire_color_scheme',
		'settings'   => 'button_hover_bg',
		'priority'   => 70,
	)));
	
}
add_action('customize_register', 'wildfire_customize_register');


function wildfire_customize_css()
{
    ?>
 
<style type="text/css">
header, .sf-menu ul, .sf-menu ul ul, .sf-menu ul ul ul { background-color:<?php echo get_theme_mod('header_bg', '#f46553'); ?>; }
#highlight-container { background-color:<?php echo get_theme_mod('page_title_background', '#ffffff'); ?>; }
#main, body #main {background-color:<?php echo get_theme_mod('body_bg', '#f1f1f1'); ?>; }
.content-container { background-color:<?php echo get_theme_mod('content_bg', '#ffffff'); ?>; }
body, footer {background-color:<?php echo get_theme_mod('footer_bg', '#3d4352'); ?>;}
#footer-widgets {background-color:<?php echo get_theme_mod('footer_top_bg', '#4c5365'); ?>; }
.button, input.submit, input.wpcf7-submit, #respond input#submit {background-color:<?php echo get_theme_mod('button_bg', '#f46553'); ?>}
a.progression-red {background:<?php echo get_theme_mod('button_bg', '#f46553'); ?>}
#sidebar .social-icons a {background-color: <?php echo get_theme_mod('button_bg', '#f46553'); ?>; }
#sidebar .social-icons a:before { border-color: transparent transparent <?php echo get_theme_mod('button_bg', '#f46553'); ?>;}
#sidebar .social-icons a:after {border-color:  <?php echo get_theme_mod('button_bg', '#f46553'); ?> transparent transparent;}
.button:hover, input.submit:hover, input.wpcf7-submit:hover, #respond input#submit:hover { background:<?php echo get_theme_mod('button_hover_bg', '#484f61'); ?>;  }
a.progression-red:hover {background:<?php echo get_theme_mod('button_hover_bg', '#484f61'); ?>;}
#sidebar .social-icons a:hover {background-color: <?php echo get_theme_mod('button_hover_bg', '#484f61'); ?>; }
#sidebar .social-icons a:hover:before { border-color: transparent transparent <?php echo get_theme_mod('button_hover_bg', '#484f61'); ?>;}
#sidebar .social-icons a:hover:after {border-color:  <?php echo get_theme_mod('button_hover_bg', '#484f61'); ?> transparent transparent;}
body {color:<?php echo get_theme_mod('body_text', '#777777'); ?>;}
.sf-menu a, .sf-menu a:hover, .sf-menu a:visited, header .social-icons a  {color:<?php echo get_theme_mod('navigation_text', '#ffffff'); ?>; }
h1.page-title { color:<?php echo get_theme_mod('page_title_text', '#2f2f2f'); ?>; }
a, h3 a:hover, .content-container a:hover h4, .content-container a:hover h6.post-type-header {color:<?php echo get_theme_mod('link_color', '#f46553'); ?>; }
a:hover {color:<?php echo get_theme_mod('link_hover_color', '#484f61'); ?>;}
h1, h2, h3, h4, h5, h6, h3 a {color:<?php echo get_theme_mod('headings_default_color', '#2f2f2f'); ?>; }
#sidebar h5 {color:<?php echo get_theme_mod('sidebar_headings_default', '#444444'); ?>; }
footer {color:<?php echo get_theme_mod('footer_text_color', '#cbcbcb'); ?>; }
footer h1, footer h2, footer h3, footer h4, footer h5, footer h6, footer a {color:<?php echo get_theme_mod('footer_link_color', '#ffffff'); ?>;}
footer a:hover {color:<?php echo get_theme_mod('footer_link_hover', '#d3d3d3'); ?>;}
body .button, body a.button, input.submit, input.wpcf7-submit, #respond input#submit {color:<?php echo get_theme_mod('button_text_color', '#ffffff'); ?>;  }
</style>
    <?php
}
//// print array
function print_array($array){
		echo '<pre>';
  		print_r($array);
  		echo '</pre>';;
}




 // get taxonomies terms links
function custom_taxonomies_terms_links() {
	global $post, $post_id;
	// get post by post id
	$post = &get_post($post->ID);
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies($post_type);
	foreach ($taxonomies as $taxonomy) {
		// get the terms related to post
		$terms = get_the_terms( $post->ID, $taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term )
				$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
			$return = join( ', ', $out );
		}
	}
	return $return;
} 


register_new_royalslider_files(1);
/*BOJO SHIIIIIIT*/
    function thumbnail_obr_function(){
        $post_parent= isset( $_POST['post_parent']) ? $_POST['post_parent'] : 0;
        if ( $post_parent > 0) {    
            $argumenty = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' =>'any', 'post_parent' => $post_parent ); 
            $attachments = get_posts($argumenty);
            if ($attachments) {
                 foreach ( $attachments as $attachment ) {
                     //the_attachment_link( $attachment->ID , false );
					 $images[] = wp_get_attachment_image( $attachment->ID, thumbnail, false, array('data-id'=> $attachment->ID) );
                 }
            };
        };
        $nazov  = get_the_title( $post_parent );
        $cena = get_post_meta( $post_parent, '_regular_price', true);
        $images_a_cena_a_nazov = array('obr' => $images, 'cena' => $cena, 'nazov' => $nazov );
        echo json_encode($images_a_cena_a_nazov);
        die();
    }

add_action('wp_ajax_thumbnail_obr', 'thumbnail_obr_function');
add_action('wp_ajax_nopriv_thumbnail_obr', 'thumbnail_obr_function');

	function custom_pc_filter_function(){
		$string = $_POST ['sended_string'];
		$string = str_replace(",","&",$string);
		parse_str( $string, $custom_arg_array);
		$adition = array('post_type' => 'product');
		$argsc = array_merge($adition, $custom_arg_array);
		$the_query = new WP_Query( $argsc );
		while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <li class="cases_overflow_li" data-id="<?php echo $the_query->post->ID; ?>">    
                   <a href="#"><?php the_post_thumbnail( thumbnail ); ?></a>               
                </li>
    <?php endwhile; 
    die();
	}

add_action('wp_ajax_custom_pc_filter', 'custom_pc_filter_function');
add_action('wp_ajax_nopriv_custom_pc_filter', 'custom_pc_filter_function');



/*ked selectnem tak na otazniku vidim description*/
function description_part_function(){
	global $wpdb;
	$id_productu = $_POST['selected_id'];
	$table = $_POST['selected_table'];
	if (!is_numeric ($id_productu)){
		$informacie = array('Imagelink' => '', 'LongDesc' => '', 'ShortDesc' => 'Nič ste si nezvolili');
		echo json_encode($informacie);
		die();
	};
		$informacie = $wpdb->get_results("SELECT * FROM " . $table . " WHERE ID=" . $id_productu . "", ARRAY_A);
			foreach($informacie as $v) {
    		$informacie2 = $v;
		}

		echo json_encode($informacie2);
		die();
}		
add_action('wp_ajax_description_part', 'description_part_function');
add_action('wp_ajax_nopriv_description_part', 'description_part_function');



/*choises pre gravity form*/

add_filter("gform_predefined_choices", "add_predefined_choice");
function vydoluj ($colum, $id, $pricee){global $wpdb;
	$part_meno = $wpdb->get_results("SELECT CONCAT($colum,'|',$id, '|:', $pricee) FROM gpu", ARRAY_N);
		foreach($part_meno as $k=>$v) {
    		$new[$k] = $v['0'];
		}
		return $new;}
function add_predefined_choice($choices){
	$choices["Gpu"] = vydoluj('Chipset','ID','Price');
   return $choices;
}



// update the '51' to the ID of your form
add_filter('gform_pre_render_1', 'populate_posts');
function populate_posts($form){
    
    foreach($form['fields'] as &$field){
    	global $wpdb;
        $part = $wpdb->get_results("SELECT Chipset, Price, ID, Name FROM gpu ORDER BY Chipset", ARRAY_N);

        if($field['cssClass'] != 'grafina')
            continue;

        $choices = array(array('text' => 'Žiadna Graficka karta', 'value' => ' ', 'price' =>'0', 'ID' => ' ', 'Type'=>' '));
        
        foreach($part as $testing){
      	$choices[] = array('text' => $testing['3'], 'value' => $testing['3'],  'price' => $testing['1'], 'ID' => $testing['2'], 'Type'=>$testing['0']);
        }

       	$field['choices'] = $choices;
        
    }

    	return $form;  
}


/*Fking do Checkout Firmu ICO a DIC */
add_action('woocommerce_after_checkout_billing_form', 'my_custom_checkout_field');
 

function my_custom_checkout_field( $fields ) {
	
    echo '<p class="woocommerce_info"><a href="#" id="fir_udaje">Firemné údaje</a>(nepovinné)</p>       <div id="woocommerce-company" style="display: none;">';
    woocommerce_form_field( 'company-name', array(
        'type'          => 'text',
        'class'         => array('form-row-first'),
        'label'         => __('Firma'),
        'placeholder'       => __('Meno firmy'),
        ), $fields->get_value( 'company-name' ));
		woocommerce_form_field( 'ICO', array(
        'type'          => 'text',
        'class'         => array('form-row-last'),
        'label'         => __('IČO'),
        'clear'     => true
        ), $fields->get_value( 'ICO' ));
		woocommerce_form_field( 'ICDPH', array(
        'type'          => 'text',
        'class'         => array('form-row-first'),
        'label'         => __('IČ DPH'),
        ), $fields->get_value( 'ICDPH' ));
        woocommerce_form_field( 'DIC', array(
        'type'          => 'text',
        'class'         => array('form-row-last'),
        'label'         => __('DIČ'),
		'clear'     => true
        ), $fields->get_value( 'DIC' ));
 
    echo '</div>';
}



/**
 * Update the user meta with field value
 **/
add_action('woocommerce_checkout_update_user_meta', 'my_custom_checkout_field_update_user_meta');
 
function my_custom_checkout_field_update_user_meta( $user_id ) {
	if ($user_id && $_POST['company-name']) update_user_meta( $user_id, 'company-name', esc_attr($_POST['company-name']) );
	if ($user_id && $_POST['ICO']) update_user_meta( $user_id, 'ICO', esc_attr($_POST['ICO']) );
	if ($user_id && $_POST['ICDPH']) update_user_meta( $user_id, 'ICDPH', esc_attr($_POST['ICDPH']) );
	if ($user_id && $_POST['DIC']) update_user_meta( $user_id, 'DIC', esc_attr($_POST['DIC']) );
}

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
 
function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['company-name']) update_post_meta( $order_id, 'Meno Firmy', esc_attr($_POST['company-name']));
	if ($_POST['ICO']) update_post_meta( $order_id, 'IČO', esc_attr($_POST['ICO']));
	if ($_POST['ICDPH']) update_post_meta( $order_id, 'IČ DPH', esc_attr($_POST['ICDPH']));
	if ($_POST['DIC']) update_post_meta( $order_id, 'DIČ', esc_attr($_POST['DIC']));
	

}
 
/**
 * Add the field to order emails
 **/
add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys1');
 
function my_custom_checkout_field_order_meta_keys1( $keys ) {
	$keys[] = 'Meno Firmy';
	return $keys;
}

add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys2');
 
function my_custom_checkout_field_order_meta_keys2( $keys ) {
	$keys[] = 'IČO';
	return $keys;
}

add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys3');
 
function my_custom_checkout_field_order_meta_keys3( $keys ) {
	$keys[] = 'IČ DPH';
	return $keys;
}
add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys4');
 
function my_custom_checkout_field_order_meta_keys4( $keys ) {
	$keys[] = 'DIČ';
	return $keys;
}





/*Vymazanie "Nazov Spoločnosti" z chceckoutu aj editu*/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );
add_filter( 'woocommerce_shipping_fields' , 'custom_override_shipping_fields' );

function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_company']);
  return $fields;
}

function custom_override_billing_fields( $fields ) {
  unset($fields['billing_company']);
  return $fields;
}

function custom_override_shipping_fields( $fields ) {
  unset($fields['shipping_company']);
  return $fields;
}



/*Wao zmena title na meno when loged in */
function meno_the_title( $title ) {
	global $woocommerce;
	global $current_user;

if ( is_user_logged_in() && $title == 'Môj účet') {
    $title = $current_user->user_firstname . " " . $current_user->user_lastname;
} else {
   
}
return $title;
}
add_filter('the_title', 'meno_the_title');






/**
 * Add the field to order emails
 **/
add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys55');
 
function my_custom_checkout_field_order_meta_keys55( $keys ) {
	$keys[] = 'Číslo zásielky';
	return $keys;
}

