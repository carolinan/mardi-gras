<?php
/**
 * Documentation for Mardi Gras WordPress theme.
 *
 * @package Mardi Gras
 */

/**
 * Add the menu item under Appearance, themes.
 */
function mardi_gras_docs_menu() {
	add_theme_page(
		__( 'Mardi Gras Setup Help', 'mardi-gras' ),
		__( 'Mardi Gras Setup Help', 'mardi-gras' ),
		'edit_theme_options',
		'mardi-gras-theme',
		'mardi_gras_docs'
	);
}
add_action( 'admin_menu', 'mardi_gras_docs_menu' );

/**
 * Create the doucmentation page.
 */
function mardi_gras_docs() {
	?>
	<div class="wrap">
	<div class="welcome-panel">
	<div class="welcome-panel-content">
	<h1><?php esc_html_e( 'Mardi Gras Setup Help', 'mardi-gras' ); ?></h1>
	<br>
	<p class="about-description">
	<?php
	esc_html_e( 'Thank you for downloading and trying out Mardi Gras.', 'mardi-gras' );
	echo '<br>';
	printf(
		/* translators: %s: A link to the themes support page on WordPress.org  */
		__( 'If you like the theme, please review it on <a href="%s">WordPress.org</a>', 'mardi-gras' ),
		esc_url( 'https://wordpress.org/support/view/theme-reviews/mardi-gras' )
	);
	?>
	</p><br>
	<div class="welcome-panel-column-container">
	<div>
	<h2><?php esc_html_e( 'Personalize your theme:', 'mardi-gras' ); ?></h2>
	<a class="button button-primary button-hero load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>">
	<?php esc_html_e( 'Add a logo', 'mardi-gras' ); ?></a>
	<a class="button button-primary button-hero load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_topbar_bgcolor' ) ); ?>">
	<?php esc_html_e( 'Mix your favorite colors', 'mardi-gras' ); ?></a>
	<a class="button button-primary button-hero load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_title_font' ) ); ?>">
	<?php esc_html_e( 'Choose your fonts', 'mardi-gras' ); ?></a>
	<a class="button button-medium button-hero load-customize" href="<?php echo esc_url( '#support' ); ?>"><?php esc_html_e( 'Support & Customization', 'mardi-gras' ); ?></a>
	<br><br>
	</div>
	</div>
	</div>
	</div>

	<div class="welcome-panel">
	<div class="welcome-panel-content">
	<h2><?php esc_html_e( 'Theme Documentation & Setup', 'mardi-gras' ); ?></h2>
		<nav>
		<ul class="subsubsub">
			<li><a href="#header"><?php esc_html_e( 'Header', 'mardi-gras' ); ?></a></li>
			<li><a href="#menus"><?php esc_html_e( 'Menus', 'mardi-gras' ); ?></a></li>
			<li><a href="#typography"><?php esc_html_e( 'Typography', 'mardi-gras' ); ?></a></li>
			<li><a href="#widgets"><?php esc_html_e( 'Widgets', 'mardi-gras' ); ?></a></li>
			<li><a href="#blog"><?php esc_html_e( 'Blog, Archve and Search', 'mardi-gras' ); ?></a></li>
			<li><a href="#posts"><?php esc_html_e( 'Posts and Pages', 'mardi-gras' ); ?></a></li>
			<li><a href="#footer"><?php esc_html_e( 'Footer', 'mardi-gras' ); ?></a></li>
		</ul>
	</nav>
	<br>
	<h3 id="header"><?php esc_html_e( 'Header', 'mardi-gras' ); ?></h3>
	<?php esc_html_e( 'The theme has several options where you can customize your header.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'The header image is optional. If you want to use a header image, the recommended size is 1900 X 400 pixels.', 'mardi-gras' ); ?>
	<br><a class="button button-medium load-customize"
	href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>">
	<?php esc_html_e( 'Add a header image', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'The theme uses two colors to create a gradient overlay over the header.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'You can adjust the colors, or hide them by reducing the opacity.', 'mardi-gras' ); ?>
	<?php esc_html_e( 'These are your current colors:', 'mardi-gras' ); ?><br>
	<div style=" width:180px; height:50px; margin-bottom:6px; border-radius:3px; color:#000; background-image:linear-gradient(
	<?php echo esc_attr( get_theme_mod( 'mardi_gras_overlay', '#461D7C' ) ) . ', ' . esc_attr( get_theme_mod( 'mardi_gras_overlay_two', '#621875' ) ) . '); opacity:' . esc_attr( get_theme_mod( 'mardi_gras_opacity', 1 ) ) . ';'; ?>">
	</div>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_overlay' ) ); ?>">
	<?php esc_html_e( 'Select your favorite colors', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'The logo is shown in the header area, centered below your Site title. The recommended size for the logo is 60 x 60 pixels.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>"><?php esc_html_e( 'Add a logo', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'You can strengthen your branding further by adding a Site icon (favicon).', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=site_icon' ) ); ?>"><?php esc_html_e( 'Add a site icon', 'mardi-gras' ); ?></a>
	&nbsp;
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_menu_site_icon' ) ); ?>"><?php esc_html_e( 'Add the site icon to the menu', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'By default, the header area is only visible on the front page. This is so that your visitors can focus on the content of your posts and pages.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_header_visibility' ) ); ?>"><?php esc_html_e( 'Show the header on all posts and pages', 'mardi-gras' ); ?></a>
	<h3 id="menus"><?php esc_html_e( 'Menus', 'mardi-gras' ); ?></h3>
	<?php esc_html_e( 'The theme has two menu locations: The navigation bar and a social menu.', 'mardi-gras' ); ?>
	<div class="welcome-icon welcome-widgets-menus" style="margin:6px 0;"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Manage menus', 'mardi-gras' ); ?></a>
	</div>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_menu_button' ) ); ?>">
	<?php esc_html_e( 'Select an icon for the menu button', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'When you activate the social menu, it is also visible in the site footer.', 'mardi-gras' ); ?>
	<br><a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_hide_footer_social_links' ) ); ?>">
	<?php esc_html_e( 'Hide the footer menu', 'mardi-gras' ); ?></a>
	<br>
	<h4 style="margin-bottom:6px;"><?php esc_html_e( '-How to add a social menu:', 'mardi-gras' ); ?></h4>
	<?php esc_html_e( 'The social menu uses svg icons to represent the social media links.', 'mardi-gras' ); ?>
	<?php echo esc_html_x( 'It does not display any text, but has additional information for screen readers.', 'the social menu', 'mardi-gras' ); ?><br>
	<?php esc_html_e( 'The icons will be added automatically, all you need to do is add a link to your menu.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'Create a new menu, then click on Custom links and add your URL.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'The Link Text that you provide is used as screen reader text.', 'mardi-gras' ); ?><br>
	<img style="margin:6px 0;" src="<?php echo esc_url( get_template_directory_uri() . '/images/doc-social2.jpg' ); ?>" 
		alt="<?php esc_attr_e( 'An image describing where to add URLS for the social menu.', 'mardi-gras' ); ?>"><br>
	<?php esc_html_e( 'Choose the theme location named Social Menu, and save.', 'mardi-gras' ); ?><br>
	<img style="margin:6px 0;" src="<?php echo esc_url( get_template_directory_uri() . '/images/doc-social3.jpg' ); ?>" 
		alt="<?php esc_attr_e( 'An image describing what the social menu will look like when a theme location has been picked.', 'mardi-gras' ); ?>">
	<br>
	<div class="notice notice-info inline"><?php esc_html_e( 'Troubleshooting: If your link or icon is not showing up, try using lower case letters.', 'mardi-gras' ); ?></div>
	<b><?php esc_html_e( 'Available icons:', 'mardi-gras' ); ?></b><br>
	<i style="display:block; max-width:340px;">
	<?php esc_html_e( '500px amazon apple bandcamp behance chain codepen deviantart digg dribbble dropbox etsy facebook feed flickr foursquare goodreads google-plus google github instagram lastfm linkedin mail meetup medium pinterest pocket reddit skype slideshare soundcloud spotify stumbleupon tumblr twitch twitter vimeo vk wordpress yelp youtube.', 'mardi-gras' ); ?>
	</i>
	<h3 id="typography"><?php esc_html_e( 'Typography', 'mardi-gras' ); ?></h3>
	<?php
	esc_html_e( 'The theme includes options to change the font for the Site title, tagline, post and page titles, and widget titles.', 'mardi-gras' );
	echo '<br>';
	esc_html_e( 'There are thirteen fonts to choose from:', 'mardi-gras' );
	echo '<br><i style="display:block; max-width:340px;">';
	esc_html_e( "'Pacifico', 'Oswald', 'Raleway', 'Poiret One', 'Lobster', 'Righteous', 'Luckiest Guy', 'Laila', 'Alegreya', 'Berkshire Swash', 'Griffy', 'Grand Hotel', plus the system fonts: BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;", 'mardi-gras' );
	echo '</i><br>';
	?>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_title_font' ) ); ?>"><?php esc_html_e( 'Update the fonts', 'mardi-gras' ); ?></a>
	<?php
	echo '<br><br>';
	esc_html_e( 'The Site Title is curved, and you may need to adjust the radius of the curve to better match the length of your site title, and your selected font.', 'mardi-gras' );
	?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_circletype_radius' ) ); ?>"><?php esc_html_e( 'Update the curve of the Site Title', 'mardi-gras' ); ?></a>
	<h3 id="widgets"><?php esc_html_e( 'Widgets', 'mardi-gras' ); ?></h3>
	<?php
	esc_html_e( 'The theme has four widget areas. All widget areas have room for any number of widgets. The widgets are shown in 3 column rows, which narrows down to 1 column rows on smaller screen widths.', 'mardi-gras' );
	echo '<br>';
	esc_html_e( 'The exception is the Footer Copyright widget area, where the content is always centered in one column.', 'mardi-gras' );
	?>
	<ul>
		<li><?php esc_html_e( 'Front Page Widget Area 1: Below the header.', 'mardi-gras' ); ?></li>
		<li><?php esc_html_e( 'Front Page Widget Area 2: Below the content.', 'mardi-gras' ); ?></li>
		<li><?php esc_html_e( 'Footer Widgets: -Visible on all pages.', 'mardi-gras' ); ?></li>
		<li><?php esc_html_e( 'Footer Copyright: -Visible on all pages.', 'mardi-gras' ); ?></li>
	</ul>
	<div class="welcome-icon welcome-widgets-menus">
	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add widgets', 'mardi-gras' ); ?></a>
	</div>
	<h3 id="blog"><?php esc_html_e( 'Blog, Archives and search', 'mardi-gras' ); ?></h3>
	<?php esc_html_e( 'Posts are listed in a responsive 3 column grid. On smaller screensizes like mobile phones, a one column grid is used.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_grid_size' ) ); ?>"><?php esc_html_e( 'Change the number of columns', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'You can also select wether you want to show the excerpts, full content or just post titles and meta information.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_blog_visibility' ) ); ?>"><?php esc_html_e( 'Change content visibilty', 'mardi-gras' ); ?></a>
	<br><br>
	<div class="notice notice-info inline"><?php esc_html_e( 'Troubleshooting: To show full width blocks in the blog listing, I recommend that you combine the one column setting with the full content setting.', 'mardi-gras' ); ?></div>
	<?php esc_html_e( 'In the customizer, you can change the style of the featured images used on the blog.', 'mardi-gras' ); ?>
	<br><?php esc_html_e( "You can show the image at it's regular size, or as a smaller, 60x60 circular miniature.", 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_thumbnail_visibility' ) ); ?>"><?php esc_html_e( 'Test the different image settings', 'mardi-gras' ); ?></a>
	<br><br>
	<?php esc_html_e( 'There are three different options to display the meta information on the blog, archive and search pages.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'You can show all the information, hide all the information, or show the date and author name, but hide categories and tags.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'The date and the author name are displayed above the content, and the category and tags are displayed below the content.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_archive_meta_visibility' ) ); ?>"><?php esc_html_e( 'Change meta visibility', 'mardi-gras' ); ?></a>
	<h3 id="posts"><?php esc_html_e( 'Posts and Pages', 'mardi-gras' ); ?></h3>
	<?php esc_html_e( 'The theme includes similar options for how to display the featured image and the meta information for single posts.', 'mardi-gras' ); ?>
	<br>
	<?php esc_html_e( 'By default, single posts and pages do not show the featured image.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_post_thumbnail_visibility' ) ); ?>"><?php esc_html_e( 'Change image settings', 'mardi-gras' ); ?></a>
	<br><br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_post_meta_visibility' ) ); ?>"><?php esc_html_e( 'Change meta visibility', 'mardi-gras' ); ?></a>

	<h3 id="footer"><?php esc_html_e( 'Footer', 'mardi-gras' ); ?></h3>
	<?php esc_html_e( 'In the footer panel in the customizer you can:', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_hide_credits' ) ); ?>"><?php esc_html_e( 'Hide the footer credit links', 'mardi-gras' ); ?></a>
	&nbsp;
	<a class="button button-medium load-customize" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=mardi_gras_hide_gototop' ) ); ?>"><?php esc_html_e( 'Hide the go to top link', 'mardi-gras' ); ?></a>
	<br><br>
	</div>
	</div>
	<div class="welcome-panel">
	<div class="welcome-panel-content" id="support">
	<h2><?php esc_html_e( 'Support & Customization', 'mardi-gras' ); ?></h2>
	<?php esc_html_e( 'If you have questions, if you wish to purchase customizations or if something is not working as expected, you can also email me to check my availability and I will reply as soon as I can.', 'mardi-gras' ); ?>
	<br>
	<a class="button button-medium button-hero load-customize" href="mailto:carolina@theme.tips"><?php esc_html_e( 'Contact', 'mardi-gras' ); ?></a>
	<br><br>
	<?php
	printf(
		/* translators: %s: A link to the themes support page on WordPress.org  */
		__( 'You can also visit the <a href="%s">official support forum</a>.', 'mardi-gras' ),
		esc_url( 'https://wordpress.org/support/theme/mardi-gras' )
	);
	?>
	<br><br>
	</div>
	</div>
	<?php
}
