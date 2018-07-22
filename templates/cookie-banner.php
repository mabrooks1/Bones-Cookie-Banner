<?php
/**
 * Cookie Banner Template
 *
 * @category Templates
 * @package  Bones_Cookie_Banner
 * @author   Level Up Digital
 */

?>
<div class="bones-cookie-banner bones-cookie-banner-<?php echo get_theme_mod( 'cookie_banner_position', 'bottom' ); ?>" style="background-color: <?php echo get_theme_mod( 'cookie_banner_background_color', '#000000' ); ?>; color: <?php echo get_theme_mod( 'cookie_banner_text_color', '#ffffff' ); ?>;">
	<div class="bones-cookie-banner-wrapper">
		<p class="bones-cookie-banner-content"><?php echo get_theme_mod( 'cookie_banner_content', 'We use cookies on this site to enhance your experience with us, please confirm you are happy with this.' ); ?></p>
		<a id="bones-cookie-banner-button" class="bones-cookie-banner-button"><?php echo get_theme_mod( 'cookie_banner_button_text', 'Accept and Continue' ); ?></a>
	</div>
</div>
