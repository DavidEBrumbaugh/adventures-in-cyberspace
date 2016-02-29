<?php

function register_the_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
			'secondary-menu' => __( 'Secondary Menu' )
		)
	);
}
add_action( 'init', 'register_the_menus' );



/**
 * Class AdvInCyberspace_Walker_Nav_Menu
 * Credit: http://shinraholdings.com/62/custom-nav-menu-walker-function/
 */
class AdvInCyberspace_Walker_Nav_Menu extends Walker_Nav_Menu {

// add classes to ul sub-menus

	function start_lvl( &$output, $depth=0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
				'sub-menu',
				( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
				'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

// add main/sub classes to li's and links

	function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function show_tags() {
	$posttags = get_the_tags();
	if ($posttags) {
		foreach($posttags as $tag) {
			echo '&nbsp;&nbsp;<span class="a-tag"><a href="'.get_tag_link($tag->term_id ).'">[' . $tag->name . ']</a></span>';
		}
	}
}

function show_side_menu() {
	?>
	<div class="menu-outer-container">
		<?php
		 wp_nav_menu( array(
				'theme_location'    => 'main-menu',
				'container'         => 'div',
				'container_id'      => 'top-navigation-primary',
				'conatiner_class'   => 'top-navigation',
				'menu_class'        => 'menu main-menu menu-depth-0 menu-even',
				'echo'              => true,
				'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'             => 10,
				'walker'            => new AdvInCyberspace_Walker_Nav_Menu
		) );
		?>
	</div>

<?php
}

if ( ! function_exists( 'comment_nav' ) ) :
	/**
	 * Display navigation to next/previous comments when applicable.
	 *
	 * Lifted and Modified from 2015 theme
	 */
	function comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php _e( 'Comments Navigation', 'adventures-in-cyberspace' ); ?></h2>
				<div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( __( '&lt;&lt;Older Comments', 'adventures-in-cyberspace' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( __( 'Newer Comments&gt;&gt;', 'adventures-in-cyberspace' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
				</div><!-- .nav-links -->
			</nav><!-- .comment-navigation -->
			<?php
		endif;
	}
endif;
