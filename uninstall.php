<?php
/**
 *  WP-SpamShield - uninstall.php
 *  Version: 1.9.20
 *
 *  This script uninstalls WP-SpamShield and removes all options and traces of its existence.
 */

if( !defined( 'ABSPATH' ) || !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	if( !headers_sent() ) { @header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden',TRUE,403); @header('X-Robots-Tag: noindex',TRUE); }
	die( 'ERROR: This plugin requires WordPress and will not function if called directly.' );
}

function rs_wpss_uninstall_plugin() {
	/* Delete Options */
	$del_options = array( 'wp_spamshield_version', 'spamshield_options', 'spamshield_widget_settings', 'spamshield_last_admin', 'spamshield_admins', 'spamshield_admin_notices', 'spamshield_count', 'spamshield_reg_count', 'spamshield_procdat', 'spamshield_install_status', 'spamshield_warning_status', 'spamshield_regalert_status', 'spamshield_nonces', 'spamshield_wpssmid_cache', 'spamshield_ubl_cache', 'spamshield_ubl_cache_disable', 'spamshield_ip_ban_disable', 'spamshield_ip_ban', 'spamshield_whitelist_keys', 'spamshield_comment_blacklist', 'spamshield_init_user_approve_run' );
	foreach( $del_options as $i => $option ) { delete_option( $option ); } /* TO DO: When Network Activation enabled, add Multisite - delete_site_option() */
	/* Unregister Widgets */
	$unreg_widgets = array( 'WP_SpamShield_Counter_LG', 'WP_SpamShield_Counter_CG', 'WP_SpamShield_End_Blog_Spam' );
	foreach( $unreg_widgets as $i => $widget ) { unregister_widget( $widget ); }
	/* Clean Up Widget Options */
	$all_widgets = get_option('sidebars_widgets');
	foreach( $all_widgets as $i => $s ) {
		if( is_array( $s ) ) {
			foreach( $s as $k => $v ) {
				if( is_string( $v ) && preg_match( '/^(wp_spamshield_counter_css|spamshield_widget_counter_sm|wp_spamshield_end_blog_spam)-[0-9]+$/', $v ) ) { unset( $all_widgets[$i][$k] ); }
			}
			$all_widgets[$i] = array_values( $all_widgets[$i] );
		}
	}
	update_option( 'sidebars_widgets', $all_widgets );
	/* Delete User Meta */
	$del_user_meta = array( 'wpss_user_ip', 'wpss_admin_status', 'wpss_new_user_approved', 'wpss_new_user_email_sent', 'wpss_cpn_status', 'wpss_cpn_notices', 'wpss_nag_status', 'wpss_nag_notices', );
	$user_ids = get_users( array( 'blog_id' => '', 'fields' => 'ID' ) );
	foreach ( $user_ids as $user_id ) { foreach( $del_user_meta as $i => $key ) { delete_user_meta( $user_id, $key ); } }
}

rs_wpss_uninstall_plugin();

/**
 *  "...Then it's time I disappear..."
 */
