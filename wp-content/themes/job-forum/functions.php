<?php
/**
 * Job Forum functions and definitions
 *
 * @link https://developer.WordPress.org/themes/basics/theme-functions/
 *
 * @package Job Forum
 */

/* Enqueue script and styles */

function job_forum_enqueue_google_fonts() {

	require_once get_theme_file_path( 'includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'Be-Vietnam-Pro',
		job_forum_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.2.3'
	);
}
add_action( 'wp_enqueue_scripts', 'job_forum_enqueue_google_fonts' );

if (!function_exists('job_forum_enqueue_scripts')) {

	function job_forum_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/assets/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/assets/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style('job-forum-style', get_stylesheet_uri(), array() );

		wp_enqueue_style(
			'job-forum-responsive-css',
			get_template_directory_uri() . '/assets/css/responsive.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'navigation',
			get_template_directory_uri() . '/assets/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'job-forum-script',
			get_template_directory_uri() . '/assets/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'job-forum-custom',
			get_template_directory_uri() . '/assets/js/custom.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		wp_enqueue_style( 'animate-css', esc_url(get_template_directory_uri()).'/assets/css/animate.css' );

		wp_enqueue_script( 'wow-js', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', array('jquery') );

		wp_enqueue_style('owl-carousel-css',
			esc_url(get_template_directory_uri()) . '/assets/css/owl.carousel.css',
			array()
		);

		wp_enqueue_script(
			'owl-carousel-js',
			esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js',
			array(),
			true
		);

		require get_parent_theme_file_path( '/includes/color-setting/custom-color-control.php' );
		wp_add_inline_style( 'job-forum-style',$job_forum_theme_custom_setting_css );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				.header-image-box{
					background-image: url('.esc_url(get_header_image()).') !important;
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
					height: 450px;
				    display: flex;
				    align-items: center;
				}';

		endif;

		wp_add_inline_style( 'job-forum-style', $css );

	}

	add_action( 'wp_enqueue_scripts', 'job_forum_enqueue_scripts' );

}

/* Setup theme */

if (!function_exists('job_forum_after_setup_theme')) {

	function job_forum_after_setup_theme() {

		load_theme_textdomain( 'job-forum', get_template_directory() . '/languages' );

		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'job-forum' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 400,
		) );
	
		add_theme_support( 'custom-header', array(
			'default-image' => get_parent_theme_file_uri( '/assets/images/default-header-image.png' ),
			'width' => 1920,
			'flex-width' => true,
			'height' => 400,
			'flex-height' => true,
			'header-text' => false,
		)); 

		register_default_headers( array(
			'default-image' => array(
				'url'           => '%s/assets/images/default-header-image.png',
				'thumbnail_url' => '%s/assets/images/default-header-image.png',
				'description'   => __( 'Default Header Image', 'job-forum' ),
			),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/assets/css/editor-style.css' ) );
	
		global $pagenow;
		
		if ( is_admin() && ( ! isset( $_GET['page'] ) || $_GET['page'] !== 'job_forum_about' ) ) {
			add_action( 'admin_notices', 'job_forum_activation_notice' );
		}	

	}

	add_action( 'after_setup_theme', 'job_forum_after_setup_theme', 999 );

}

function job_forum_activation_notice() {
	$job_forum_meta = get_option( 'job_forum_admin_notice' );
	if (!$job_forum_meta) {
			echo '<div id="job-forum-welcome-notice" class="notice notice-info wpele-activation-notice is-dismissible">';
			echo '<div class="notice-body">';
				echo '<div class="notice-content">';
					echo '<h2>'. esc_html__( 'Welcome to WPElemento', 'job-forum' ) .'</h2>';
					echo '<p>'. esc_html__( 'Thank you for choosing Job Forum theme .To setup the theme, please visit the get started page.', 'job-forum' ) .'</p>';
					echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=job_forum_about' ) ) .'" class="button button-notice">'. esc_html__( 'GET STARTED', 'job-forum' ) .'</a></span>';
					echo '<span><a href="'. esc_url( JOB_FORUM_BUY_NOW ) .'" class="button button-notice" target="_blank" >'. esc_html__( 'BUY NOW', 'job-forum' ) .'</a></span>';
					echo '<span><a href="'. esc_url( JOB_FORUM_LIVE_DEMO ) .'" class="button button-notice" target="_blank" >'. esc_html__( 'DEMO', 'job-forum' ) .'</a></span>';
				echo '</div>';
				echo '<div class="notice-icon">';
					echo '<img src="'.esc_url(get_template_directory_uri()).'/includes/getstart/images/get-logo.png ">';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}

/* Get post comments */

if (!function_exists('job_forum_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function job_forum_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'job-forum');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'job-forum'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_html__('%1$s at %2$s','job-forum'), esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'job-forum' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'job-forum'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for job_forum_comment()

if (!function_exists('job_forum_widgets_init')) {

	function job_forum_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','job-forum'),
			'id'   => 'job-forum-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'job-forum'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Page Sidebar','job-forum'),
			'id'   => 'sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'job-forum'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar three','job-forum'),
			'id'   => 'sidebar-3',
			'description'   => esc_html__('This sidebar will be shown on blog pages.', 'job-forum'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 1','job-forum'),
			'id'   => 'footer1-sidebar',
			'description'   => esc_html__('It appears in the footer 1.', 'job-forum'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 2','job-forum'),
			'id'   => 'footer2-sidebar',
			'description'   => esc_html__('It appears in the footer 2.', 'job-forum'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 3','job-forum'),
			'id'   => 'footer3-sidebar',
			'description'   => esc_html__('It appears in the footer 3.', 'job-forum'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 4','job-forum'),
			'id'   => 'footer4-sidebar',
			'description'   => esc_html__('It appears in the footer 4.', 'job-forum'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		));

	}

	add_action( 'widgets_init', 'job_forum_widgets_init' );

}

function job_forum_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo esc_url( home_url() );
		echo '">';
		bloginfo('name');
		echo "</a> >> ";
		if (is_category() || is_single()) {
			the_category(' , ');
			if (is_single()) {
				echo " >> ";
				the_title();
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/**
 * Change number or products per row to 4
 */
add_filter('loop_shop_columns', 'job_forum_loop_columns', 999);
if (!function_exists('job_forum_loop_columns')) {
	function job_forum_loop_columns() {
		return get_theme_mod( 'job_forum_products_per_row', '4' ); 
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'job_forum_products_per_page' );
function job_forum_products_per_page( $cols ) {
  	return  get_theme_mod( 'job_forum_products_per_page',8);
}

function job_forum_enqueue_setting() {

define('JOB_FORUM_FREE_THEME_DOC',__('https://preview.wpelemento.com/theme-documentation/job-forum/','job-forum'));
define('JOB_FORUM_SUPPORT',__('https://WordPress.org/support/theme/job-forum/','job-forum'));
define('JOB_FORUM_REVIEW',__('https://WordPress.org/support/theme/job-forum/reviews/','job-forum'));
define('JOB_FORUM_BUY_NOW',__('https://www.wpelemento.com/products/job-board-WordPress-theme','job-forum'));
define('JOB_FORUM_LIVE_DEMO',__('https://preview.wpelemento.com/job-forum/','job-forum'));
define('JOB_FORUM_THEME_BUNDLE',__('https://www.wpelemento.com/products/WordPress-theme-bundle','job-forum'));

require get_template_directory() . '/includes/post-create.php';

if( class_exists( 'Whizzie' ) ) {
	$Whizzie = new Whizzie();
}

require get_template_directory() .'/includes/tgm/tgm.php';
require get_template_directory() . '/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/includes/go-pro/class-upgrade-pro.php' );

/* Plugin Activation */
require get_template_directory() . '/includes/getstart/plugin-activation.php';

/* Implement the About theme page */
require get_template_directory() . '/includes/getstart/getstart.php';

}
add_action('after_setup_theme', 'job_forum_enqueue_setting');

function job_forum_dismissed_notice() {
	update_option( 'job_forum_admin_notice', true );
}
add_action( 'wp_ajax_job_forum_dismissed_notice', 'job_forum_dismissed_notice' );

add_action('after_switch_theme', 'job_forum_getstart_setup_options');
function job_forum_getstart_setup_options () {
    update_option('job_forum_admin_notice', false );
}

?>