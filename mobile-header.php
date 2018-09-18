<header class="mobile-header">

	<div class="site-branding">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo get_template_directory_uri(); ?>/images/paul_round.svg" />
		</a>
	</div><!-- .site-branding -->

	<div class="slide-out" style="display:none">

		<div class="mobile-navigation">

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="utility-header">

				<span class="account-link">
					<a href="/my-account">
						<svg viewBox="0 0 11 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
							<g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage">
								<path d="M11,9.68 C11,9.68 10.978,7.597 10.851,7.381 C10.662,7.06 10.221,6.839 9.402,6.497 C8.587,6.156 8.326,5.868 8.326,5.252 C8.326,4.882 8.575,5.003 8.684,4.326 C8.73,4.045 8.95,4.321 8.992,3.68 C8.992,3.425 8.872,3.361 8.872,3.361 C8.872,3.361 8.933,2.983 8.957,2.692 C8.986,2.329 8.774,1.392 7.642,1.392 C6.509,1.392 6.297,2.329 6.326,2.692 C6.35,2.983 6.411,3.361 6.411,3.361 C6.411,3.361 6.291,3.425 6.291,3.68 C6.333,4.321 6.553,4.045 6.599,4.326 C6.708,5.003 6.957,4.882 6.957,5.252 C6.957,5.671 6.836,5.938 6.502,6.173 C8.285,7.066 8.523,7.247 8.523,8.045 L8.523,9.68 L11,9.68 Z M5.623,6.806 C4.535,6.352 4.187,5.968 4.187,5.147 C4.187,4.654 4.52,4.815 4.665,3.912 C4.726,3.537 5.019,3.906 5.075,3.051 C5.075,2.71 4.915,2.625 4.915,2.625 C4.915,2.625 4.997,2.121 5.028,1.733 C5.068,1.249 4.785,0 3.275,0 C1.765,0 1.482,1.249 1.521,1.733 C1.553,2.121 1.635,2.625 1.635,2.625 C1.635,2.625 1.474,2.71 1.474,3.051 C1.531,3.906 1.824,3.537 1.885,3.912 C2.031,4.815 2.363,4.654 2.363,5.147 C2.363,5.968 2.015,6.352 0.927,6.806 C0.595,6.945 0,7.159 0,7.676 L0,9.68 L7.642,9.68 L7.642,8.178 C7.642,7.706 6.714,7.263 5.623,6.806 L5.623,6.806 Z" id="Fill-33" sketch:type="MSShapeGroup"></path>
							</g>
						</svg>
						<span class="account-title">Account</span>
					</a>
				</span>
				<span class="cart-link">
					<a href="/cart">
						<svg version="1.1" id="Shopping_cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
							 y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
						<path d="M13,17c0,1.104,0.894,2,2,2c1.104,0,2-0.896,2-2c0-1.106-0.896-2-2-2C13.894,15,13,15.894,13,17z M3,17c0,1.104,0.895,2,2,2
							c1.103,0,2-0.896,2-2c0-1.106-0.897-2-2-2C3.895,15,3,15.894,3,17z M6.547,12.172L17.615,9.01C17.826,8.949,18,8.721,18,8.5V3H4V1.4
							C4,1.18,3.819,1,3.601,1H0.399C0.18,1,0,1.18,0,1.4L0,3h2l1.91,8.957L4,12.9v1.649c0,0.219,0.18,0.4,0.4,0.4H17.6
							c0.22,0,0.4-0.182,0.4-0.4V13H6.752C5.602,13,5.578,12.449,6.547,12.172z"/>
						</svg>
						<span class="cart-title">Cart:</span>
						<span class="cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
					</a>
				</span>
			</div>
		</div>

		<form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>">
			<label>
				<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:" />
			</label>
		</form>

	</div>

	<div class="menu-hook-container">
		<span class="menu-hook">Menu</span>
	</div>

</header>
