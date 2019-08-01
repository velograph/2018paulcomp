<header class="mobile-header">

	<div class="site-branding">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="/wp-content/uploads/2019/07/30_paul_white.svg" />
		</a>
	</div>

	<div class="slide-out" style="display:none">

		<div class="mobile-navigation">

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>

			<div class="utility-header">

				<span class="account-link">
					<a href="/my-account">
						<span class="account-title">Account</span>
					</a>
				</span>
				<span class="cart-link">
					<a href="/cart">
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
