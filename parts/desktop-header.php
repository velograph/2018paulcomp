<header class="desktop-header">

	<div class="site-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="/wp-content/uploads/2020/03/paul_logo.svg" />
		</a>
	</div>

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'desktop-navigation' ) ); ?>

	<div class="utility-navigation">
		<div class="site-search-container">
			<div class="search-icon">
				<svg version="1.1" id="Magnifying_glass" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
					 y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
				<path fill="#e6e7e8" d="M17.545,15.467l-3.779-3.779c0.57-0.935,0.898-2.035,0.898-3.21c0-3.417-2.961-6.377-6.378-6.377
					C4.869,2.1,2.1,4.87,2.1,8.287c0,3.416,2.961,6.377,6.377,6.377c1.137,0,2.2-0.309,3.115-0.844l3.799,3.801
					c0.372,0.371,0.975,0.371,1.346,0l0.943-0.943C18.051,16.307,17.916,15.838,17.545,15.467z M4.004,8.287
					c0-2.366,1.917-4.283,4.282-4.283c2.366,0,4.474,2.107,4.474,4.474c0,2.365-1.918,4.283-4.283,4.283
					C6.111,12.76,4.004,10.652,4.004,8.287z"/>
				</svg>
			</div>
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input class="site-search-input" name="s" type="search" value="<?php echo get_search_query() ?>" >
				<?php /*</span>*/?>
				<button type="submit" class="search-submit" style="visibility: hidden; position: absolute"></button>
			</form>
		</div>
		<div class="account-and-cart">
			<a class="account-link" href="/my-account">
				<span class="account-title">Account</span>
			</a>
			<a class="cart-link" href="/cart">
				<span class="account-title">Cart</span>
				<span class="cart-count">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?>)</span>
			</a>
		</div>
	</div>

</header>
