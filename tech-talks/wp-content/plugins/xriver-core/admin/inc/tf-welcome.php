<?php
function xriver_let_to_num( $size ) {
    $l = substr( $size, -1 );
    $ret = substr( $size, 0, -1 );
    switch ( strtoupper( $l ) ) {
    case 'P':
        $ret *= 1024;
    case 'T':
        $ret *= 1024;
    case 'G':
        $ret *= 1024;
    case 'M':
        $ret *= 1024;
    case 'K':
        $ret *= 1024;
    }
    return $ret;
}
$ssl_check = 'https' === substr( get_home_url(), 0, 5 );
$green_mark = '<mark class="green"><span class="dashicons dashicons-yes"></span></mark>';

$tatheme = wp_get_theme();

$plugins_counts = (array) get_option( 'active_plugins', [] );

if ( is_multisite() ) {
    $network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', [] ) );
    $plugins_counts = array_merge( $plugins_counts, $network_activated_plugins );
}


?>





<div class="wrap about-wrap xriver-wrap">
    <h1><?php _e( 'Welcome to '.ta_theme_name().'', XRIVER_CORE_TEXT_DOMAIN );?></h1>

    <div class="about-text"><?php echo esc_html__( ''.ta_theme_name().' theme is now installed and ready to use!', XRIVER_CORE_TEXT_DOMAIN ); ?></div>
<div class="xriver-badge">
    <p><?php echo esc_html( $tatheme->get( 'Version' ) ); ?></p>
</div>
    <h2 class="nav-tab-wrapper">
        <?php
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( 'Welcome', XRIVER_CORE_TEXT_DOMAIN ) );
		?>
    </h2>


    <div class="xriver-section nav-tab-active" id="welcome">
        <p class="about-description">
            <?php printf( __( 'Prior to commencing, we kindly request you to thoroughly consult the documentation, which is included in the theme folder or accessible from our <a href="https://themexriver.com/wp/'.strtolower(ta_theme_name()).'/'.strtolower(ta_theme_name()).'-doc" target="_blank">Website</a>. This comprehensive resource provides a wealth of valuable information and detailed instructions for utilizing '.ta_theme_name().'.', XRIVER_CORE_TEXT_DOMAIN ) );?>
        </p>
        <p class="about-description">
            <?php printf( __( 'In the event that you are unable to locate the desired information within our documentation, we encourage you to reach out to us via <a href="https://themexriver.ticksy.com/" target="_blank">Support</a> including your purchase code, site CPanel credentials, and admin login information.', XRIVER_CORE_TEXT_DOMAIN ), 'https://themexriver.ticksy.com/' );?>
        </p>
        <p class="about-description">
            <?php printf( __( 'Rest assured, we are delighted to assist you and anticipate providing you with a prompt response exceeding your expectations.', XRIVER_CORE_TEXT_DOMAIN ), 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'/'.strtolower(ta_theme_name()).'-doc' );?>
        </p>

        <p class="about-description">
		<mark class="error"><?php printf( __( 'Note: Please Install All Required Plugins Before Install Demo !', XRIVER_CORE_TEXT_DOMAIN ), 'https://themexriver.com/wp/'.strtolower(ta_theme_name()).'/'.strtolower(ta_theme_name()).'-doc' );?>
			</mark>
        </p>
    </div>
    <div class="xriver-thanks">
        <p class="description">Thank you for using <strong><?php ta_theme_name(); ?></strong> theme! Powered by <a href="https://themeforest.net/user/ThemeXriver" target="_blank">ThemeXriver</a></p>
    </div>


    <div class="xriver-system-stats">
        <h3>System Status</h3>

    <table class="system-status-table">
        <tbody>
                     <tr>
							<td><?php esc_html_e( 'WP Version', XRIVER_CORE_TEXT_DOMAIN );?></td>
							<td>
                                <?php bloginfo( 'version' );?> <mark class="green">- We recommend using WordPress version 5.1 or above for greater performance and security.</mark>
                            </td>
						</tr>

						<tr>
							<td><?php esc_html_e( 'Language', XRIVER_CORE_TEXT_DOMAIN );?></td>
							<td><?php echo get_locale() ?></td>
						</tr>

						<tr>
							<td><?php esc_html_e( 'WP Memory Limit', XRIVER_CORE_TEXT_DOMAIN );?></td>
							<td>
								<?php
									$memory = xriver_let_to_num( WP_MEMORY_LIMIT );
									if ( $memory < 100663296 ) {
										echo '<mark class="error">' . sprintf( esc_html__( '%s - We recommend setting memory to at least 96MB. %s.', XRIVER_CORE_TEXT_DOMAIN ), size_format( $memory ), '<a href="' . esc_url( '//www.wpbeginner.com/wp-tutorials/fix-wordpress-memory-exhausted-error-increase-php-memory/' ) . '" target="_blank">' . esc_html__( 'More info', XRIVER_CORE_TEXT_DOMAIN ) . '</a>' ) . '</mark>';
									} else {
										echo '<mark class="green">' . size_format( $memory ) . '</mark>';
									}
								?>
							</td>
						</tr>



						<tr>
							<td><?php esc_html_e( 'PHP Max Input Vars', XRIVER_CORE_TEXT_DOMAIN );?></td>
							<td>
								<?php
									$max_input = ini_get( 'max_input_vars' );
									if ( $max_input < 3000 ) {
										echo '<mark class="error">' . sprintf( wp_kses( __( '%s - We recommend setting PHP max_input_vars to at least 3000. See: <a href="%s" target="_blank">Increasing the PHP max vars limit</a>', XRIVER_CORE_TEXT_DOMAIN ), [ 'a' => [ 'href' => [], 'target' => [] ] ] ), $max_input, '//teconce.com/support/2018/12/05/increasing-max-input-vars/' ) . '</mark>';
									} else {
										echo '<mark class="green">' . $max_input . '</mark>';
									}
								?>
						</td>
						</tr>
						<tr>
						  <td>
						     <?php esc_html_e( 'PHP Version', XRIVER_CORE_TEXT_DOMAIN );?>
						  </td>

						  <td>
						 <?php

								$mayo_php = phpversion();

								if ( version_compare( $mayo_php, '7.2', '<' ) ) {
									echo sprintf( '<mark class="error"> %s </mark> - We recommend using PHP version 7.2 or above for greater performance and security.', esc_html( $mayo_php ), '' );
								} else {
									echo '<mark class="green">' . esc_html( $mayo_php ) . '</mark>';
								}

							?>
						</td>
						</tr>

						<tr>
						    <td>
						     <?php esc_html_e( 'Server Info', XRIVER_CORE_TEXT_DOMAIN );?>
						  </td>

						  <td>
						<?php echo esc_html( $_SERVER['SERVER_SOFTWARE'] ); ?>
					     </td>
						</tr>

						<tr>
						    <td>
						        <?php esc_html_e( 'Secure Connection(HTTPS)', XRIVER_CORE_TEXT_DOMAIN );?>
						    </td>
						    <td>
						        <?php
									echo esc_attr( $ssl_check ) ? $green_mark : '<mark class="error">Your site is not using secure connection (HTTPS).</mark>'; ?>
						    </td>
						</tr>

				</tbody>
    </table>
        </div>

         <div class="xriver-system-stats">
        <h3>Theme Information</h3>

    <table class="system-status-table">
        <tbody>
            <tr>
                <td><?php esc_html_e( 'Theme Name', XRIVER_CORE_TEXT_DOMAIN );?></td>
                <td><?php echo wp_get_theme(); ?></td>
            </tr>

             <tr>
                <td><?php esc_html_e( 'Author Name', XRIVER_CORE_TEXT_DOMAIN );?></td>
                <td><?php echo esc_html( $tatheme->get( 'Author' ) ); ?></td>
            </tr>

            <tr>
					<td><?php esc_html_e( 'Current Version', XRIVER_CORE_TEXT_DOMAIN );?></td>
					<td><?php echo esc_html( $tatheme->get( 'Version' ) ); ?></td>
				</tr>

				  <tr>
					<td><?php esc_html_e( 'Text Domain', XRIVER_CORE_TEXT_DOMAIN );?></td>
					<td><?php echo esc_html( $tatheme->get( 'TextDomain' ) ); ?></td>
				</tr>

				<tr>
				    <td><?php esc_html_e( 'Child Theme', XRIVER_CORE_TEXT_DOMAIN );?></td>
					<td><?php echo is_child_theme() ? $green_mark : 'No'; ?></td>
				</tr>
				</tbody>
				</table>
	</div>

        <div class="xriver-system-stats">
            <h3>Active Plugins (<?php echo count( $plugins_counts ); ?>)</h3>
        <table class="system-status-table">
			<tbody>
			<?php
					foreach ( $plugins_counts as $plugin ) {

						$plugin_info = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
						$dirname = dirname( $plugin );
						$version_string = '';
						$network_string = '';

						if ( !empty( $plugin_info['Name'] ) ) {

							// Link the plugin name to the plugin url if available.
							$plugin_name = esc_html( $plugin_info['Name'] );

							if ( !empty( $plugin_info['PluginURI'] ) ) {
								$plugin_name = '<a href="' . esc_url( $plugin_info['PluginURI'] ) . '" target="_blank">' . $plugin_name . '</a>';
							}

							?>
						<tr>
							<?php
					$allowed_html = [
				'a'      => [
					'href'  => [],
					'title' => [],
				],
				'br'     => [],
				'em'     => [],
				'strong' => [],
				];
			?>
							<td><?php echo wp_kses( $plugin_name, $allowed_html ); ?></td>
							<td><?php echo sprintf( 'by %s', $plugin_info['Author'] ) . ' &ndash; ' . esc_html( $plugin_info['Version'] ) . $version_string . $network_string; ?></td>
						</tr>
					<?php
					}
					}
					?>
			</tbody>
		</table>

		</div>
</div>
