<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
	<i class="fa fa-bars" aria-hidden="true"></i><br>
	<span><?php esc_html_e( 'Menu', 'webnika_theme' ); ?></span>
</button>

<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'top-menu' ) ); ?>
</nav>
