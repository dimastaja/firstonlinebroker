<?php

/**
 * Inbound_Promote Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */

class Inbound_Promote {

	/**
	 * initiate class
	 */
	public function __construct() {
		self::load_hooks();
	}

	/**
	 * Load hooks and filters
	 */
	public static function load_hooks() {
		/* add hooks only available if pro not activated */
		if (!defined('INBOUND_PRO_PATH')) {
			add_filter( 'plugin_row_meta', array( __CLASS__ , 'filter_quick_links' ), 10, 2 );

			/* help us translate the plugin */
			add_action('admin_notices', array(__CLASS__, 'help_us_translate'));

			/* help us translate the plugin */
			add_action('admin_notices', array(__CLASS__, 'download_leads'));

			/* help us translate the plugin */
			add_action('admin_notices', array( __CLASS__, 'upgrade_to_pro' ));

			/* Add ajax listeners for switching templates */
			add_action( 'wp_ajax_inbound_dismiss_ajax', array(__CLASS__, 'dismiss_notice'));

		}

	}


	/**
	 * displays pro upgrade cta for non pro users
	 */
	public static function filter_quick_links( $links, $file ) {

		$plugins = array(
				'landing-pages/landing-pages.php',
				'cta/calls-to-action.php',
				'leads/leads.php',
		);

		if ( in_array( $file , $plugins ) ) {
			return array_merge(
					$links,
					array( '<a href="http://www.inboundnow.com/upgrade">'.__( 'UPGRADE TO PRO (FREE)' , INBOUNDNOW_TEXT_DOMAIN ) .'</a>' )
			);
		}
		return $links;
	}

	/**
	 * Translation cta
	 */
	public static function help_us_translate() {
		global $pagenow;
		global $current_user;

		$message_id = 'translate';

		/* check if current page is target post type */
		$post_types = array('landing-page', 'wp-call-to-action', 'wp-lead');
		$type = get_post_type(get_the_ID());
		if ( !in_array($type, $post_types)) {
			return;
		}

		/* check if user viewed message already */
		if (self::check_if_viewed($message_id)) {
			return;
		}

		echo '<div class="updated" id="inbound_notice_'.$message_id.'">
				<h2>' . __('Help Translate Inbound Now Marketing Plugins', INBOUNDNOW_TEXT_DOMAIN) . '</h2>
				 <p style="width:80%;">' . sprintf(__('Help translate Inbound Now\'s marketing plugins to your %s native langauge %s!', INBOUNDNOW_TEXT_DOMAIN), '<a href="http://docs.inboundnow.com/guide/inbound-translations-project/" target="_blank">', '</a>') . '</p>
				 <a class="button button-primary button-large" href="http://www.inboundnow.com/translate-inbound-now/" target="_blank">' . __('Help Translate the plugins', INBOUNDNOW_TEXT_DOMAIN) . '</a>
				 <a class="button button-large inbound_dismiss" href="#" id="'.$message_id.'"  data-notification-id="'.$message_id.'" >' . __('No Thanks', INBOUNDNOW_TEXT_DOMAIN) . '</a>
				 <br><br>
			  </div>';

		/* echo javascript used to listen for notice closing */
		self::javascript_dismiss_notice();


	}

	/**
	 * call to action to upgrade to pro
	 */
	public static function upgrade_to_pro() {

		$message_id = 'upgrade_to_pro';

		/* check if current page is target post type */
		$post_types = array('landing-page', 'wp-call-to-action', 'wp-lead');
		$type = get_post_type(get_the_ID());
		if ( !in_array($type, $post_types)) {
			return;
		}

		/* check if user viewed message already */
		if (self::check_if_viewed($message_id)) {
			return;
		}

		echo '<div class="updated" id="inbound_notice_'.$message_id.'">
                    <h1>A friendly message from Inbound Now</h1>
                     <p style="width:80%;">
						'.__('Hello there!' , INBOUNDNOW_TEXT_DOMAIN ) .'
					</p>
					<p style="width:80%;">
					 ' . __('We noticed you are using a stand alone version of an Inbound Now plugin. Did you know we provide a more powerful free plugin that includes this one and offers a lot more? ' , INBOUNDNOW_TEXT_DOMAIN ) .'
                    </p>
					<p style="width:80%;">
					 ' . __('It\'s free, and we invite you to try it.' , INBOUNDNOW_TEXT_DOMAIN ) .'
                    </p>
					<br>
	                 <a class="button button-primary button-large" href="http://www.inboundnow.com/upgrade/" target="_blank">' . __('Upgrade', INBOUNDNOW_TEXT_DOMAIN) . '</a>
                     <a class="button button-default button-large inbound_dismiss" href="#" id="'.$message_id.'" data-notification-id="'.$message_id.'" >' . __('Dismiss this message', INBOUNDNOW_TEXT_DOMAIN) . '</a>
                     <br>
                     <br>
                  </div>';

		/* echo javascript used to listen for notice closing */
		self::javascript_dismiss_notice();
	}

	/**
	 * call to action to upgrade to pro
	 */
	public static function download_leads() {
		$screen = get_current_screen();

		if (!isset($screen) || $screen->id !='edit-inbound-forms' || class_exists('Inbound_Leads_Plugin') ) {
			return;
		}

		$message_id = 'download_leads';

		/* check if user viewed message already */
		if (self::check_if_viewed($message_id)) {
			return;
		}

		echo '<div class="updated" id="inbound_notice_'.$message_id.'">
                    <h1>'.__('Want to view collected data?' , INBOUNDNOW_TEXT_DOMAIN ) .'</h1>

					<p style="width:80%;">
					 ' . __('You are collecting data, why not review it? Our Leads plugin helps you mange the data you collect with these forms. Leads plugin is available via the WordPress plugin\'s directory as well as included in our free Inbound Pro plugin. We recommend Inbound Pro because it provides better settings management and additional free features. ' , INBOUNDNOW_TEXT_DOMAIN ) .'
                    </p>
					<p style="width:80%;">
					 ' . __('Both are free, and we invite you to try them!' , INBOUNDNOW_TEXT_DOMAIN ) .'
                    </p>
					<br>
	                 <a class="button button-primary button-large" href="http://wordpress.org/plugins/leads" target="_blank">' . __('Download Leads Plugin', INBOUNDNOW_TEXT_DOMAIN) . '</a>
	                 <a class="button button-primary button-large" href="http://www.inboundnow.com/upgrade/" target="_blank">' . __('Download Inbound Pro (recommended)', INBOUNDNOW_TEXT_DOMAIN) . '</a>
                     <a class="button button-default button-large inbound_dismiss" href="#" id="'.$message_id.'" data-notification-id="'.$message_id.'" >' . __('Dismiss this message', INBOUNDNOW_TEXT_DOMAIN) . '</a>
                     <br>
                     <br>
                  </div>';

		/* echo javascript used to listen for notice closing */
		self::javascript_dismiss_notice();
	}


	/**
	 * check if user has viewed and dismissed cta
	 * @param $notificaiton_id
	 */
	public static function check_if_viewed( $notificaiton_id ) {
		global $current_user;

		$user_id = $current_user->ID;

		return get_user_meta($user_id, 'inbound_notification_' . $notificaiton_id ) ;
	}


	public static function javascript_dismiss_notice() {
		global $current_user;

		$user_id = $current_user->ID;
		?>
		<script type="text/javascript">
			jQuery( document ).ready(function() {

				jQuery('body').on('click' , '.inbound_dismiss' , function() {

					var notification_id = jQuery( this ).data('notification-id');

					jQuery('#inbound_notice_' + notification_id).hide();

					jQuery.ajax({
						type: 'POST',
						url: ajaxurl,
						context: this,
						data: {
							action: 'inbound_dismiss_ajax',
							notification_id: notification_id,
							user_id: '<?php echo $user_id; ?>'
						},

						success: function (data) {
						},

						error: function (MLHttpRequest, textStatus, errorThrown) {
							alert("Ajax not enabled");
						}
					});
				})

			});
		</script>
		<?php
	}

	public static function dismiss_notice() {
		update_user_meta($_REQUEST['user_id'], 'inbound_notification_' . $_REQUEST['notification_id'] ) ;
		exit;
	}

}

new Inbound_Promote;