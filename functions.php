<?php
/**
 * Mardi Gras functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mardi Gras
 */

if ( ! function_exists( 'mardi_gras_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features.
	 */
	function mardi_gras_setup() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_editor_style();

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 60,
				'width'       => 60,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support(
			'custom-header',
			apply_filters(
				'mardi_gras_custom_header_args',
				array(
					'default-text-color' => 'fdd023',
					'uploads'            => true,
					'flex-width'         => true,
					'width'              => 1900,
					'height'             => 400,
				)
			)
		);

		register_nav_menus(
			array(
				'bar'    => esc_html__( 'Navigation Bar', 'mardi-gras' ),
				'social' => esc_html__( 'Social Menu', 'mardi-gras' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'woocommerce' );

		add_post_type_support( 'page', 'excerpt' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'starter-content',
			array(
				'posts'     => array(
					'about',
					'contact',
					'blog',
					'news',
				),
				'nav_menus' => array(
					'bar'    => array(
						'name'  => __( 'Navigation Bar', 'mardi-gras' ),
						'items' => array(
							'page_about',
							'page_blog',
							'page_contact',
							'page_news',
						),
					),
					'social' => array(
						'name'  => __( 'Social Menu', 'mardi-gras' ),
						'items' => array(
							'link_facebook',
							'link_twitter',
							'link_instagram',
						),
					),
				),

				'widgets'   => array(
					'sidebar-1' => array(
						'text_business_info',
						'search',
						'tag-cloud',
					),
					'frontpage-widget-area-1' => array(
						'text_about',
					),
					'frontpage-widget-area-2' => array(
						'recent-comments',
					),
				),
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'responsive-embeds' );

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Green', 'mardi-gras' ),
					'slug'  => 'green',
					'color' => '#0cd931',
				),
				array(
					'name'  => __( 'Purple', 'mardi-gras' ),
					'slug'  => 'purple',
					'color' => '#461D7C',
				),
				array(
					'name'  => __( 'Yellow', 'mardi-gras' ),
					'slug'  => 'yellow',
					'color' => '#ffeb24',
				),
			)
		);
	}
} // End if().

add_action( 'after_setup_theme', 'mardi_gras_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mardi_gras_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mardi_gras_content_width', 800 );
}
add_action( 'after_setup_theme', 'mardi_gras_content_width', 0 );


if ( ! function_exists( 'mardi_gras_widgets_init' ) ) {
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function mardi_gras_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Front Page Widget Area 1: Below the header', 'mardi-gras' ),
				'id'            => 'frontpage-widget-area-1',
				'description'   => esc_html__( 'Widgets in this section will be shown on the front page below your header.', 'mardi-gras' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="inner">',
				'after_widget'  => '</div></section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Front Page Widget Area 2: Below the content', 'mardi-gras' ),
				'id'            => 'frontpage-widget-area-2',
				'description'   => esc_html__( 'Widgets in this section will be shown on the front page below your content.', 'mardi-gras' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widgets', 'mardi-gras' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Widgets in this section will be shown in the footer.', 'mardi-gras' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Copyright', 'mardi-gras' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Please place a single text widget with your copyright information here. It will then be shown in the footer.', 'mardi-gras' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
	add_action( 'widgets_init', 'mardi_gras_widgets_init' );
}


if ( ! function_exists( 'mardi_gras_fonts_url' ) ) {
	/**
	 * Helper function for enqueueing google fonts.
	 */
	function mardi_gras_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		if ( get_theme_mod( 'mardi_gras_title_font' ) !== 'system' ) {
			$fonts[] = get_theme_mod( 'mardi_gras_title_font', 'Grand Hotel' );
		}
		if ( get_theme_mod( 'mardi_gras_description_font' ) !== 'system' ) {
			$fonts[] = get_theme_mod( 'mardi_gras_description_font', 'Pacifico' );
		}
		if ( get_theme_mod( 'mardi_gras_post_title_font' ) !== 'system' ) {
			$fonts[] = get_theme_mod( 'mardi_gras_post_title_font', 'Pacifico' );
		}
		if ( get_theme_mod( 'mardi_gras_widget_title_font' ) !== 'system' ) {
			$fonts[] = get_theme_mod( 'mardi_gras_widget_title_font', 'Pacifico' );
		}

		$fonts = array_unique( $fonts );

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'mardi-gras' );

		if ( 'cyrillic' === $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' === $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' === $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' === $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => rawurlencode( implode( '|', $fonts ) ),
					'subset' => rawurlencode( $subsets ),
				),
				'//fonts.googleapis.com/css'
			);
		}
		return $fonts_url;
	}
}

/**
 * Enqueue scripts and styles.
 */
function mardi_gras_scripts() {
	wp_enqueue_style( 'mardi-gras-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'mardi-gras-style', 'rtl', 'replace' );

	wp_enqueue_style( 'mardi-gras-print-style', get_template_directory_uri() . '/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	wp_enqueue_style( 'mardi-gras-fonts', mardi_gras_fonts_url(), array(), null );

	if ( display_header_text() ) {
		wp_enqueue_script( 'circletype', get_template_directory_uri() . '/js/circletype.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	}

	wp_enqueue_script( 'mardi-gras-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'mardi-gras-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	if ( class_exists( 'EM_Events' ) ) {
		wp_enqueue_style( 'mardi-gras-events-manager', get_template_directory_uri() . '/css/event.css', array(), wp_get_theme()->get( 'Version' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'mardi_gras_scripts' );

if ( ! function_exists( 'mardi_gras_editor_fonts_url' ) ) {
	/**
	 * Helper function for enqueueing google fonts.
	 */
	function mardi_gras_editor_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		if ( get_theme_mod( 'mardi_gras_post_title_font' ) !== 'system' ) {
			$fonts[] = get_theme_mod( 'mardi_gras_post_title_font', 'Pacifico' );
		}

		$fonts = array_unique( $fonts );

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'mardi-gras' );

		if ( 'cyrillic' === $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' === $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' === $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' === $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => rawurlencode( implode( '|', $fonts ) ),
					'subset' => rawurlencode( $subsets ),
				),
				'//fonts.googleapis.com/css'
			);
		}
		return $fonts_url;
	}
}

if ( ! function_exists( 'mardi_gras_editor_assets' ) ) {
	/**
	 * Add styles for the block editor.
	 */
	function mardi_gras_editor_assets() {
		wp_enqueue_style( 'mardi-gras-editor', get_theme_file_uri( 'css/block-editor.css' ), array(), wp_get_theme()->get( 'Version' ), false );
		wp_enqueue_style( 'mardi-gras-editor-fonts', mardi_gras_editor_fonts_url(), array(), null );
	}
	add_action( 'enqueue_block_editor_assets', 'mardi_gras_editor_assets' );
}

if ( ! function_exists( 'mardi_gras_skip_link_focus_fix' ) ) {
	/**
	 * Fix skip link focus in IE11.
	 *
	 * This does not enqueue the script because it is tiny and because it is only for IE11,
	 * thus it does not warrant having an entire dedicated blocking script being loaded.
	 * The non minified version can be found in: js/skip-link-focus-fix.js
	 *
	 * @link https://git.io/vWdr2
	 */
	function mardi_gras_skip_link_focus_fix() {
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}
	add_action( 'wp_print_footer_scripts', 'mardi_gras_skip_link_focus_fix' );
}


if ( ! function_exists( 'mardi_gras_circletype_radius' ) ) {
	/**
	 * Helper function for CircleType.
	 */
	function mardi_gras_circletype_radius() {
		if ( display_header_text() && is_front_page() || display_header_text() && get_theme_mod( 'mardi_gras_header_visibility' ) ) {
			?>
			<script>
				new CircleType(document.getElementById('site-title'))
				.radius(<?php echo esc_html( get_theme_mod( 'mardi_gras_circletype_radius', 900 ) ); ?>);
			</script>
			<?php
		}
	}
	add_action( 'wp_print_footer_scripts', 'mardi_gras_circletype_radius' );
}


if ( class_exists( 'woocommerce' ) ) {
	/**
	 * Ensures that the WooCommerce pagination looks the same as the rest of the theme.
	 */
	function mardi_gras_woocommerce_pagination() {
		the_posts_pagination( array( 'type' => 'list' ) );
	}
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
	add_action( 'woocommerce_after_shop_loop', 'mardi_gras_woocommerce_pagination', 10 );

	/* Remove Breadcrumbs */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	add_filter( 'loop_shop_columns', 'mardi_gras_loop_columns' );
	if ( ! function_exists( 'mardi_gras_loop_columns' ) ) {
		/**
		 * Displays 3 products per row.
		 */
		function mardi_gras_loop_columns() {
			return 3;
		}
	}
}

/**
 * Custom CSS for this theme.
 */
require get_template_directory() . '/inc/custom-css.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extras
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/theme-info.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-customize.php';

/**
 * SVG icons
 */
require get_template_directory() . '/inc/icon-functions.php';
require get_template_directory() . '/inc/class-mardi-gras-svg-icons.php';


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'mardi_gras_register_plugins' );
/**
 * Register the recommended plugin for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 *
 * @Since 1.1.
 */
function mardi_gras_register_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		array(
			'name'     => 'Events Manager', // The plugin name.
			'slug'     => 'events-manager', // The plugin slug (typically the folder name).
			'required' => false, // If false, the plugin is only 'recommended' instead of required.
		),
	);

	/*
	 * Array of configuration settings.
	 */
	$config = array(
		'id'           => 'mardi-gras',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title' => __( 'Install Recommended Plugins', 'mardi-gras' ),
			'menu_title' => __( 'Install Plugins', 'mardi-gras' ),
			'return'     => __( 'Return to Recommended Plugins Installer', 'mardi-gras' ),
		),
	);
	tgmpa( $plugins, $config );
}

