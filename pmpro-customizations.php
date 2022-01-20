<?php
/**
 * Plugin Name: PMPro Customizations
 * Plugin URI: https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
 * Description: Bigger, betterer plugin customizations for Paid Memberships Pro
 * Version: .2
 * Author: Andrew Lavelle
 * Author URI: //andrew.lavelle.rocks
 */

require( plugin_dir_path( __FILE__ ) . '/shortcodes/pmpro_custom_account.php' );

/**
 * customizations_pmprorh_init Custom Register Helper fields
 *
 * @return [type] [description]
 */
function customizations_pmprorh_init() {
	if ( ! function_exists( 'pmprorh_add_registration_field' ) ) {
		return false;
	}

	$fields = array();

	$fields[] = new PMProRH_Field(
		'institution_title',
		'text',
		array(
			'label' => 'Institution',
			'size' => 40,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'department',
		'text',
		array(
			'label' => 'Department',
			'size' => 40,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'address_1',
		'text',
		array(
			'label' => '<i class="fas fa-map-marker-alt"></i> Address',
			'size' => 40,
			'profile' => true,
			'required' => true,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'address_2',
		'text',
		array(
			'label' => 'Address',
			'size' => 40,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'city',
		'text',
		array(
			'label' => 'City',
			'size' => 40,
			'profile' => true,
			'required' => true,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'state',
		'text',
		array(
			'label' => 'State/Province/Region',
			'size' => 6,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'postal_code',
		'text',
		array(
			'label' => 'Zip Code/Postal Code',
			'size' => 10,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'country',
		'text',
		array(
			'label' => 'Country',
			'size' => 40,
			'profile' => true,
			'required' => true,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

/*	$fields[] = new PMProRH_Field(
		'photoid',
		'file',
		array(
			'label' => 'Proof of Full-Time Student/Resident Status',
			'accept' => 'image/*',
			'levels' => array( 4, 11, 12, 18 ),
			'required' => false,
			'showrequired' => false,
			'hint' => '<em>Not required at this time.</em>',
		)
	);*/

	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'checkout_boxes', // location on checkout page
			$field            // PMProRH_Field object
		);
	}

	$fields = array();

	$fields[] = new PMProRH_Field(
		'prefix',
		'text',
		array(
			'label' => 'Salutation (Prof., Dr., etc.)',
			'size' => 15,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'suffix',
		'text',
		array(
			'label' => 'Title (MD, PhD, MPH, RN, etc.)',
			'size' => 15,
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	$fields[] = new PMProRH_Field(
		'profession',
		'select',
		array(
			'label' => 'Profession',
			'options' => array(
				'Emergency Manager' => 'Emergency Manager',
				'Engineer' => 'Engineer',
				'Field Health Specialist' => 'Field Health Specialist',
				'Nurse' => 'Nurse',
				'Nurse Practitioner' => 'Nurse Practitioner',
				'Paramedic/EMT' => 'Paramedic/EMT',
				'Pharmacist' => 'Pharmacist',
				'Physician' => 'Physician',
				'Physician Assistant' => 'Physician Assistant',
				'Psychologist/Sociologist' => 'Psychologist/Sociologist',
				'Social Worker' => 'Social Worker',
				'Student' => 'Student',
				'Veterinarian' => 'Veterinarian',

				'Other' => 'Other',
			),
			'profile' => true,
			'required' => false,
			'addmember' => true,
			'memberslistcsv' => true,
		)
	);

	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'after_password', // location on checkout page
			$field            // PMProRH_Field object
		);
	}

	// add member number as profile only
	$field = new PMProRH_Field(
		'member_number',
		'text',
		array(
			'label' => 'Member Number',
			'size' => 40,
			'profile' => true,
			'required' => false,
			'only_admin' => true,
			'addmember' => true,
			'memberslistcsv' => true,
			'readonly' => true,
		)
	);

	pmprorh_add_registration_field(
		'just_profile', // location on checkout page
		$field            // PMProRH_Field object
	);
}

add_action( 'init', 'customizations_pmprorh_init' );



/*function pmpro_customizations_gettext( $translated_text, $text, $domain ) {

	if ( $domain == 'pmpro' || $domain == 'fep' ) {
		$translated_text = str_replace( 'E-mail', 'Email', $translated_text );
		$translated_text = str_replace( 'E-Mail', 'Email', $translated_text );
		$translated_text = str_replace( 'e-mail', 'email', $translated_text );
		$translated_text = str_replace( 'If you would like to change the password type a new one. Otherwise leave this blank.', '<p><span id="my-autorenew-message">If you would like to update your password, please enter a new one.</span></p> <p><span id="my-autorenew-message">Otherwise, leave these fields blank.</span></p>', $translated_text );
	}

	return $translated_text;
}

add_filter( 'gettext', 'pmpro_customizations_gettext', 10, 3 );



/**
 * Update checkout page to remove the username, and
 * use email as the username for WordPress


function grlf_init_email_as_username() {
	// check for level as well to make sure we're on checkout page
	if ( empty( $_REQUEST['level'] ) ) {
		return;
	}

	if ( ! empty( $_REQUEST['bemail'] ) ) {
		$_REQUEST['username'] = $_REQUEST['bemail'];
	}

	if ( ! empty( $_POST['bemail'] ) ) {
		$_POST['username'] = $_POST['bemail'];
	}

	if ( ! empty( $_GET['bemail'] ) ) {
		$_GET['username'] = $_GET['bemail'];
	}
}

add_action( 'init', 'grlf_init_email_as_username' );

/*function pmpro_customizations_pages_shortcode_checkout( $content ) {
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'templates/checkout.php' );
	$temp_content = ob_get_contents();
	ob_end_clean();
	return $temp_content;
}
add_filter( 'pmpro_pages_shortcode_checkout', 'pmpro_customizations_pages_shortcode_checkout' );


// Manually run cron tasks
	/* Plugin Nam Sample Cron Immediate Execution  */

	add_action( 'admin_menu', 'pmpro_customizations_admin_menu' );
function pmpro_customizations_admin_menu() {
	add_options_page(
		'PMPro Execute Actions',
		'PMPro Customizations',
		'manage_options',
		'pmpro_customizations',
		'sample_cron_immediate_execution_admin'
	);
}
function sample_cron_immediate_execution_admin() {
	?>
	<div class="wrap">
		<p>Click the Expire members cron to run the PMPro expire members functionality manually</p>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=pmpro_customizations&custom_cron=expire_members" class="button button-secondary">Expire Members Cron</a>
	 
				 
	 
		 
	<?php
	/*
	$cron_url = site_url( '?custom_cron=myeventfunc1');
	wp_remote_post( $cron_url, array( 'timeout' => 0.01, 'blocking' => false, 'sslverify' => apply_filters( 'https_local_ssl_verify', true ) ) );
	$cron_url = site_url( '?custom_cron=myeventfunc2');
	wp_remote_post( $cron_url, array( 'timeout' => 0.01, 'blocking' => false, 'sslverify' => apply_filters( 'https_local_ssl_verify', true ) ) );
	echo 'cron tasks should be executed by now.';*/
	?>
		</div>
		<?php
}

add_action( 'init', 'run_customcron' );
function run_customcron() {
	if ( isset( $_GET['custom_cron'] ) ) {
		call_user_func( $_GET['custom_cron'] );
	}
}

function expire_members() {
	do_action( 'pmpro_cron_expire_memberships' );
	sample_log( date( 'l jS \of F Y h:i:s A' ), __DIR__ . '/expire_members.html' );
}

function myeventfunc2() {
	sleep( 10 ); // assuming it's a heavy task
	sample_log( date( 'l jS \of F Y h:i:s A' ), __DIR__ . '/myevent2_log.html' );
}

function sample_log( $time, $file ) {
	file_put_contents( $file, $time . '<br />', FILE_APPEND );
}


/* Not really a modification of the PMPro plugin, but just modifying the lost password message to replace the < > with ( )
function pmpro_customizations_update_password_link( $message ) {

	$message = str_replace( '<', '(', $message );
	$message = str_replace( '>', ')', $message );

	return $message;
}
add_filter( 'retrieve_password_message', 'pmpro_customizations_update_password_link' );*/


/*function pmpro_customizations_login_url( $login_url ) {

	return site_url( '/login', 'login' );
}
add_filter( 'login_url', 'pmpro_customizations_login_url' );*/

function pmpro_customizations_change_password_hint( $hint ) {

	return 'Password should be a minimum of <strong>eight</strong> characters and contain a combination of upper and lower case letters, one number, and one symbols such as: <strong>! " ? % ^ &</strong>.';
}
add_filter( 'password_hint', 'pmpro_customizations_change_password_hint' );


function my_pmpro_invoice_address() {
	?>
	<li><strong>Paid To:</strong><br />WADEM<br />3330 University Avenue, Suite 130<br />Madison, WI 53705 USA</li>
	<li><strong>Federal Employer Identification Number:</strong> 33-0553898</li>
	<?php
}
add_action( 'pmpro_invoice_bullets_bottom', 'my_pmpro_invoice_address' );


// enqueue additional stylesheet
function pmproc_preheader() {
	if ( ! is_admin() ) {
		wp_enqueue_style(
			'pmproc_stylesheet',
			plugins_url( 'css/pmpro-customizations.css', __FILE__ ),
			array(),
			'1.0',
			'all'
		);
	}
}
add_action( 'wp', 'pmproc_preheader', 1 );

/*
	Member Numbers

	* Change the generate_member_number function if your member number needs to be in a certain format.
	* Member numbers are generated when users are registered or when the membership account page is accessed for the first time.
*/
// Generate member_number when a user is registered.
function generate_member_number( $user_id ) {
	$member_number = get_user_meta( $user_id, 'member_number', true );

	// if no member number, create one
	if ( empty( $member_number ) ) {
		global $wpdb;

		$char = 'A';

		// this code generates a string 10 characters long of numbers and letters
		while ( empty( $member_number ) ) {
			$member_number = current_time( 'ny' ) . $char;

			$check = $wpdb->get_var( "SELECT meta_value FROM $wpdb->usermeta WHERE meta_value = '" . esc_sql( $member_number ) . "' LIMIT 1" );

			if ( $check || is_numeric( $member_number ) ) {
				$char++;
				$member_number = null;
			}
		}

		// save to user meta
		update_user_meta( $user_id, 'member_number', $member_number );

		return $member_number;
	}
}
add_action( 'user_register', 'generate_member_number' );

// Show it on the membership account page.
function pmpromn_pmpro_account_bullets_bottom() {
	if ( is_user_logged_in() ) {
		global $current_user;

		// get member number
		$member_number = get_user_meta( $current_user->ID, 'member_number', true );

		// if no number, generate one
		if ( empty( $member_number ) ) {
			$member_number = generate_member_number( $current_user->ID );
		}
 
		// show it
		if ( ! empty( $member_number ) ) {
			?>
		<li><strong><?php _e( 'Member Number', 'pmpro' ); ?>:</strong> <?php echo $member_number; ?></li>
			<?php
		}
	}
}    


add_action( 'pmpro_account_bullets_bottom', 'pmpromn_pmpro_account_bullets_bottom' );
add_action( 'pmpro_invoice_bullets_bottom', 'pmpromn_pmpro_account_bullets_bottom' );

// show member_number in confirmation emails
function pmpromn_pmpro_email_filter( $email ) {
	global $wpdb;

	 // only update admin confirmation emails
	if ( strpos( $email->template, 'checkout' ) !== false ) {
		if ( ! empty( $email->data ) && ! empty( $email->data['user_login'] ) ) {
			$user = get_user_by( 'login', $email->data['user_login'] );
			if ( ! empty( $user ) && ! empty( $user->ID ) ) {
				$member_number = get_user_meta( $user->ID, 'member_number', true );

				if ( ! empty( $member_number ) ) {
					$email->body = str_replace( '<p>Membership Level', '<p>Member Number: ' . $member_number . '</p><p>Membership Level', $email->body );
				}
			}
		}
	}

	return $email;  
}
// add_filter( 'pmpro_email_filter', 'pmpromn_pmpro_email_filter', 30, 2 );
/*
	Add a "How did you hear about us?" field Membership Checkout for new members only.
	Display the field for admins-only in the profile and in the Members List CSV export.
*/
function my_pmpro_how_hear_fields() {
	global $current_user;
	if ( class_exists( 'PMProRH_Field' ) && ( ! pmpro_hasMembershipLevel() || current_user_can( 'edit_users' ) ) ) {
		pmprorh_add_checkout_box( 'additional', 'Additional Information' );

		$fields = array();

		// how_hear field
		$fields[] = new PMProRH_Field(
			'how_hear',
			'select',
			array(
				'label'         => 'How did you hear about WADEM?',
				'options'       => array(
					''              => 'Choose an option', // add this option as the first one
					'facebook'  => 'Facebook',
					'twitter'   => 'Twitter',
					'eblast'    => 'e-blast',
					'congress2'  => 'Brisbane Congress',
					'congress'  => 'Toronto Congress',
					'webinar'    => 'Webinar Series',
					'member'    => 'I am already a Member :)',
					'other'     => 'Colleague',
				),
				'profile'       => 'admins',
				'memberslistcsv'    => true,
				'required'      => true,
			)
		);
		$fields[] = new PMProRH_Field(
			'how_hear_referrer',
			'text',
			array(
				'label'         => 'Referred by',
				'profile'       => 'admins',
				'memberslistcsv'    => true,
				'depends'       => array(
					array(
						'id' => 'how_hear',
						'value' => 'other',
					),
				),
			)
		);
		foreach ( $fields as $field ) {
			pmprorh_add_registration_field( 'additional', $field );
		}
	}
}
add_action( 'init', 'my_pmpro_how_hear_fields' );

/* Customize text for the autorenewal checkbox. The box needs to be selected for automatic renewals with Stripe or PayPal Express. */

function translate_pmpro_auto_renew_text( $translated_text, $text, $domain ) {
	if ( $domain == 'pmpro-auto-renewal-checkbox' ) {
		if ( $text == 'Would you like to set up automatic renewals?' ) {
			$translated_text = 'Set your Membership up for Automatic Renewals (Optional)';
		}

		if ( $text == 'Yes, renew at %s' ) {
			$translated_text = '<span id="my-autorenew-message">Select the box & your credit card/PayPal account will be annually billed</span> at %s.';
		}
	}
	return $translated_text;
}

add_filter( 'gettext', 'translate_pmpro_auto_renew_text', 10, 3 );


// Add links to the top of the list
function my_pmpro_member_links_top() {
	// Add the level IDs here
	if ( pmpro_hasMembershipLevel( array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ) ) ) {
		// Add the links in <li> format here
		?>
		<li><a href="https://www.cambridge.org/core/autologin/8a94020f5c7c8f6a015c7cbbf8720012" target="_blank" referrerpolicy="no-referrer-when-downgrade">Access <em>Prehospital and Disaster Medicine</em> on Cambridge Core</a></li>
		<?php
	}
}
add_filter( 'pmpro_member_links_top', 'my_pmpro_member_links_top' );

// Add links to the bottom of the list
function my_pmpro_member_links_bottom() {
	// Add the level IDs here
	if ( pmpro_hasMembershipLevel( array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ) ) ) {
		// Add the links in <li> format here
		?>
		<li><a href="https://wadem.org/resources/webinar/" target="_blank">Access Webinar Recordings</a></li>
		<?php
	}
}
add_filter( 'pmpro_member_links_bottom', 'my_pmpro_member_links_bottom' );


/*
Bcc admin on PMPro member only emails
You can change the conditional to check for a certain $email->template or some other condition before adding the BCC.
*/
function my_pmpro_email_headers( $headers, $email ) {
	// bcc emails not already going to admin_email
	if ( $email->email != get_bloginfo( 'admin_email' ) ) {
		// add bcc
		$headers[] = 'Bcc:alavelle@wadem.org';
	}

	return $headers;
}
add_filter( 'pmpro_email_headers', 'my_pmpro_email_headers', 10, 2 );


/* Add SSL Seal to PMPro Checkout Page */

function my_option_pmpro_sslseal( $seal ) {
	if ( ! is_admin() ) {
		$seal = '<p><script language="JavaScript" type="text/javascript">
TrustLogo("https://sectigo.com/uploads/files/sectigo_trust_seal_lg_2x.png", "CL1", "none");
</script><a href="https://stripe.com/" target="_blank"><img src="https://wadem.org/wp-content/uploads/2021/10/Powered-by-Stripe.svg"></a></p>' . $seal;
	}

	return $seal;
}
add_filter( 'option_pmpro_sslseal', 'my_option_pmpro_sslseal' );

/**
 * This will show the renewal date link within the number of days or less than the members expiration that you set in the code gist below.
 */
function show_renewal_link_after_X_days( $r, $level ) {
	if ( empty( $level->enddate ) ) {
		return false;
	}
	$days = 120; // Change this to value.
	// Are we within the days until expiration?
	$now = current_time( 'timestamp' );
	if ( $now + ( $days * 3600 * 24 ) >= $level->enddate ) {
		$r = true;
	} else {
		$r = false;
	}
	return $r;
}
add_filter( 'pmpro_is_level_expiring_soon', 'show_renewal_link_after_X_days', 10, 2 );

/**
 * This code will display a renewal reminder notification banner at the top of your website for members whose membership
 * level will expire within 7 days of the date they visit your site.
 * Add this code to your PMPro Customizations Plugin - https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
 * Note: When adding to your Customizations Plugin, be careful not to include the opening php tag on line 1 above.
 */
function pmpro_show_banner_renewal_message() {
	global $pmpro_pages;

	// Bail early if the current user does not have a membership level.
	if ( ! pmpro_hasMembershipLevel() ) {
		return;
	}
	// Load custom CSS for banner.
	?>
	<style>
		.pmpro_banner_renewal_wrapper {
			background-color: #ff4646;
		}
		.pmpro_banner_renewal_wrapper h4 {
			color: white;
			margin: 0;
			padding: 1rem;
			text-align: center;
		}
		.pmpro_banner_renewal_wrapper a {
			color: white;
			text-decoration: underline;
		}
		.pmpro_banner_renewal_wrapper a:hover {
			color: rgba(255,255,255,0.8);
		}
	</style>
	<?php
	$user_id = get_current_user_id();
	$level = pmpro_getMembershipLevelForUser( $user_id );
	// Bail if this is the checkout page.
	if ( is_page( $pmpro_pages['checkout'] ) ) {
		return;
	}

	// Bail if the user does not have an enddate set.
	if ( empty( $level->enddate ) ) {
		return;
	}

	$today = time();
	// Bail if today is more than 7 days before enddate.
	if ( $today <= strtotime( '- 7 days', $level->enddate ) ) {
		return;
	}
	$message = "Your $level->name membership will expire soon. <a href=" . pmpro_url( 'checkout', '?level=' . $level->id ) . '> Click here to renew your membership.</a>';

	echo '<div class="pmpro_banner_renewal_wrapper"><h4> ' . $message . ' </h4></div>';
}
add_action( 'wp_head', 'pmpro_show_banner_renewal_message' );

/*
	Pulls next payment date from Stripe with webhook
*/

add_filter( 'pmpro_next_payment', array( 'PMProGateway_stripe', 'pmpro_next_payment' ), 10, 3 );

/**
 * Show next payment date under 'Expiration' field in PMPro account page for members with recurring subscriptions. */
// Change the expiration text to show the next payment date instead of the expiration date
// This hook is setup in the wp_renewal_dates_setup function below
function my_pmpro_expiration_text($expiration_text) {
    global $current_user;
    $next_payment = pmpro_next_payment();
        
    if( $next_payment ){
        $expiration_text = date_i18n( get_option( 'date_format' ), $next_payment );
    }
    
    return $expiration_text;
}

// Change "expiration date" to "renewal date"
// This hook is setup in the wp_renewal_dates_setup function below
function change_expiration_date_to_renewal_date($translated_text, $original_text, $domain) {
    if($domain === 'paid-memberships-pro' && $original_text === 'Expiration')
        $translated_text = 'Renewal Date';
    
    return $translated_text;
}

// Logic to figure out if the user has a renewal date and to setup the hooks to show that instead
function wp_renewal_dates_setup() {
    global $current_user, $pmpro_pages;
    
    // in case PMPro is not active
    if(!function_exists('pmpro_getMembershipLevelForUser'))
        return;
    
    // If the user has an expiration date, tell PMPro it is expiring "soon" so the renewal link is shown
    $membership_level = pmpro_getMembershipLevelForUser($current_user->ID);            
    if(!empty($membership_level) && !pmpro_isLevelRecurring($membership_level))
        add_filter('pmpro_is_level_expiring_soon', '__return_true');    
    
    if( is_page( $pmpro_pages[ 'account' ] ) ) {
        // If the user has no expiration date, add filter to change "expiration date" to "renewal date"        
        if(!empty($membership_level) && (empty($membership_level->enddate) || $membership_level->enddate == '0000-00-00 00:00:00'))
            add_filter('gettext', 'change_expiration_date_to_renewal_date', 10, 3);        
        
        // Check to see if the user's last order was with PayPal Express, else assume it was with Stripe.
        // These filters make the next payment calculation more accurate by hitting the gateway
        $order = new MemberOrder();
        $order->getLastMemberOrder( $current_user->ID );
        if( !empty($order) && $order->gateway == 'paypalexpress') {
            add_filter('pmpro_next_payment', array('PMProGateway_paypalexpress', 'pmpro_next_payment'), 10, 3);    
        }else{
            add_filter('pmpro_next_payment', array('PMProGateway_stripe', 'pmpro_next_payment'), 10, 3);    
        }
    }
    add_filter('pmpro_account_membership_expiration_text', 'my_pmpro_expiration_text');    
}
add_action('wp', 'wp_renewal_dates_setup', 11);

/* Change words on the PMP Membership Account page */

add_filter( 'gettext', 'change_my_pmpro_account_text', 20, 3 );

function change_my_pmpro_account_text( $translated_text, $text, $domain ) {

	switch ( $translated_text ) {

		case 'My Memberships':
			$translated_text = __( 'Membership Information', 'paid-memberships-pro' );
			break;

		case 'My Account':
			$translated_text = __( 'Account Details', 'paid-memberships-pro' );
			break;

		case 'Past Invoices':
			$translated_text = __( 'Previous Invoices & Payments', 'paid-memberships-pro' );
			break;

		case 'Change':
			$translated_text = __( 'Change Level', 'paid-memberships-pro' );
			break;

		case 'Renew':
			$translated_text = __( 'Renew Membership', 'paid-memberships-pro' );
			break;

		case 'View all Membership Options':
			$translated_text = __( 'View all Membership Levels', 'paid-memberships-pro' );
			break;

		case 'Expiration':
			$translated_text = __( 'Expiration Date', 'paid-memberships-pro' );
			break;

		case 'Billing':
			$translated_text = __( 'Amount', 'paid-memberships-pro' );
			break;
	}

	return $translated_text;
}

/*
	Change the PayPal Checkout Button on the checkout page.
*/
function my_pmpro_paypal_button_image( $url ) {
	return 'https://wadem.org/wp-content/uploads/2018/09/paypal-checkout-logo.png';
}
add_filter( 'pmpro_paypal_button_image', 'my_pmpro_paypal_button_image' );

/*
	Move MailChimp Checkbox below the PayPal Checkout Button.


function change_location_pmpro_mailchimp_checkbox() {
	remove_action( 'pmpro_checkout_after_tos_fields', 'pmpromc_additional_lists_on_checkout' );
	add_action( 'pmpro_checkout_after_form', 'pmpromc_additional_lists_on_checkout' );
}
add_action( 'init', 'change_location_pmpro_mailchimp_checkbox' );

*/

/**
 * Hide widgets by widget area ID for protected members only contnet.
 * Update the $hide_sidebars_array with the array of sidebar IDs you want to filter.
 */

function my_pmpro_widget_display_callback( $instance, $widget, $args ) {
	// Set an array of widget areas by ID to filter.
	$hide_sidebars_array = array( 'custom_html-4' );
	// Get the current queried object to check access.
	$queried_object = get_queried_object();
	// Check if this widget area should be filtered.
	if ( in_array( $args['id'], $hide_sidebars_array ) && ! empty( $queried_object ) ) {
		// Hide the widget if user doesn't have access to view the queried object.
		if ( function_exists( 'pmpro_has_membership_access' ) && ! pmpro_has_membership_access( $queried_object->ID ) ) {
			return false;
		}
	}
	return $instance;
}
add_filter( 'widget_display_callback', 'my_pmpro_widget_display_callback', 10, 3 );

/**
 * Hide widgets by widget instance ID for protected members only content.
 * Update the $hide_widget_instances_array with the array of widget instance IDs you want to filter.
 * Update the pmpro_hasMembershipLevel check for your membership level IDs.
 */
function pmpro_hide_empty_video_box_non_members( $instance, $widget, $args ) {
	// Set an array of widget areas by ID to filter.
	$hide_widget_instances_array = array( 'custom_html-4' );
	// Check if this widget instance should be filtered.
	if ( in_array( $widget->id, $hide_widget_instances_array ) && ! pmpro_hasMembershipLevel(  ) ) {
		return false;
	}
	return $instance;
}
add_filter( 'widget_display_callback', 'pmpro_hide_empty_video_box_non_members', 10, 3 );

/*
	Shortcode to show a member's expiration date. Add this code to your active theme's functions.php or a custom plugin. Then add the shortcode [pmpro_expiration_date] where you want the current user's expiration date to appear (page, post, etc.)
	
	If the user is logged out or doesn't have an expiration date, then --- is shown.
*/
function pmpro_expiration_date_shortcode( $atts ) {
	//make sure PMPro is active
	if(!function_exists('pmpro_getMembershipLevelForUser'))
		return;
	
	//get attributes
	$a = shortcode_atts( array(
	    'user' => '',
	), $atts );
	
	//find user
	if(!empty($a['user']) && is_numeric($a['user'])) {
		$user_id = $a['user'];
	} elseif(!empty($a['user']) && strpos($a['user'], '@') !== false) {
		$user = get_user_by('email', $a['user']);
		$user_id = $user->ID;
	} elseif(!empty($a['user'])) {
		$user = get_user_by('login', $a['user']);
		$user_id = $user->ID;
	} else {
		$user_id = false;
	}
	
	//no user ID? bail
	if(!isset($user_id))
		return;

	//get the user's level
	$level = pmpro_getMembershipLevelForUser($user_id);

	if(!empty($level) && !empty($level->enddate))
		$content = date(get_option('date_format'), $level->enddate);
	else
		$content = "---";

	return $content;
}
add_shortcode('pmpro_expiration_date', 'pmpro_expiration_date_shortcode');

// customize the HTML/styling of links in PMPro-generated emails
function my_pmpro_change_email_link_styling( $data, $email ){

  /*--- An array of variable names. Change or add to this to style different links.
      default options: 'invoice_url', 'levels_link', 'login_url' ---*/
  $links_to_change = array( 'invoice_url', 'login_url' );

  $newdata = [];
  foreach( $data as $variable => $value ) {
    if( in_array( $variable, $links_to_change) && strpos( $value, "http" ) !== false ) {

      /*--- Make the link color green. change this line to change the styling of the link ---*/
      $newdata[$variable] = '<a href="' . $data[$variable] . '" style="color:#005717" !important>'.$data[$variable].'</a>';

    } else {
      $newdata[$variable] = $data[$variable];
    }
  }
  return $newdata;
}
add_filter( 'pmpro_email_data', 'my_pmpro_change_email_link_styling', 30, 2 );


/* Add membership number to any page with a shortcode  */

function pmpromn_member_number_shortcode()
{
	global $current_user;
	$member_number = get_user_meta($current_user->ID, 'member_number', true);
	
	if(!empty($member_number))
		return "<strong>Member Number:</strong> ".$member_number;
}

add_shortcode( 'pmpro_member_number', 'pmpromn_member_number_shortcode' );

/**
 * Display messages of the Original Price, Discounted Price and Amount Saved when discount code is applied to PMPro order.
 * Add this code recipe to a PMPro Customization Plugin - Display messages of the Original Price, Discounted Price and Amount Saved when discount code is applied to PMPro order
 * Various classes added to strings to allow for styling - ".pmpro-discorig-message", ".pmpro-orginal-price", ".pmpro-discount-price", ".pmpro-save-price"
*/

function my_pmpro_applydiscountcode_return_js( $discount_code, $discount_code_id, $level_id, $code_level ) {
    // Only continue if code is valid.
    if( false == $code_level ) return;
    // Get the original level.
    $level = pmpro_getLevel( $level_id );
    // Format prices.
    $original_price   = pmpro_formatPrice( $level->initial_payment );
    $discounted_price = pmpro_formatPrice( $code_level->initial_payment );
    $discount         = $level->initial_payment - $code_level->initial_payment;
    $discount         = pmpro_formatPrice( $discount );
    // Build HTML.
    $html  = "'<div class=\"pmpro-discorig-message pmpro-original-price\">The regular membership price is {$original_price}. </div>";
    $html .= "<div class=\"pmpro-discorig-message pmpro-discount-price\">The promotional membership rate is {$discounted_price}. </div>";
    $html .= "<div class=\"pmpro-discorig-message pmpro-save-price\">It’s your lucky day, you are saving {$discount}! </div>'";
    ?>

    	jQuery("#pmpro_level_cost").html(<?php echo $html; ?>);

    <?php
}
add_action( 'pmpro_applydiscountcode_return_js', 'my_pmpro_applydiscountcode_return_js', 10, 4);

/*
 * The Code Recipe will add a 5-day grace period to a membership once the membership expires.
 */

function my_pmpro_membership_post_membership_expiry( $user_id, $level_id ) {
	// Make sure we aren't already in a grace period for this level
	$grace_level = get_user_meta( $user_id, 'grace_level', true );
	if ( empty( $grace_level ) || $grace_level !== $level_id ) {
		// Give them their level back with 5 day expiration
		$grace_level                  = array();
		$grace_level['user_id'] = $user_id;
		$grace_level['membership_id'] = $level_id;
		$grace_level['enddate']       = date( 'Y-m-d H:i:s', strtotime( '+5 days', current_time( 'timestamp' ) ) );
		$changed = pmpro_changeMembershipLevel( $grace_level, $user_id );
		update_user_meta( $user_id, 'grace_level', $level_id );
	}
	else
		delete_user_meta($user_id, 'grace_level');
}

add_action('pmpro_membership_post_membership_expiry', 'my_pmpro_membership_post_membership_expiry', 10, 2);

/* Add the following custom shortcode to the PMP email templates: First Name - !!first_name!!, Last Name - !!last_name!!, Promotion Message - !!promo_message!! This shortcode (!!promo_message!! can be edited to reflect dates changes done in the WP Admin panel.*/

function my_pmpro_email_custom_data($data, $email)
{
	global $current_user, $wpdb;
	$user = get_user_by( 'email', $email->email );
	$enddate = $wpdb->get_var("SELECT UNIX_TIMESTAMP(enddate) FROM $wpdb->pmpro_memberships_users WHERE user_id = '" . $user->ID . "' AND status = 'active' LIMIT 1");

	$data["promo_message"] =  sprintf(__("Your membership will now expire on <strong>%s</strong>.", 'paid-memberships-pro' ), date_i18n(get_option('date_format'), $enddate));
	

	return $data;
}
add_filter("pmpro_email_data", "my_pmpro_email_custom_data", 10, 2);

function my_pmpro_email_data($data, $email) {
if(!empty($data['user_login'])) {
$user = get_user_by("login", $data['user_login']);

if(!empty($user) && !empty($user->ID))
$data['first_name'] = get_user_meta($user->ID, "first_name", true);

if(!empty($user) && !empty($user->ID))
$data['last_name'] = get_user_meta($user->ID, "last_name", true);
}

return $data;
}
add_filter("pmpro_email_data", "my_pmpro_email_data", 10, 2);

/* Add the !!membership_fee!! shortcode to checkout emails. 

function add_membership_cost_to_emails($data, $email)
{
	global $current_user;
	
    if (!isset($data['membership_fee'])) 
    {
    $data['membership_fee'] = pmpro_formatPrice( $current_user->membership_level->initial_payment );
        
}

	return $data;
}	

add_filter('pmpro_email_data', 'add_membership_cost_to_emails', 10, 2); */

/* Set levels as "all access levels" so members of these levels will be able to view all Addon Packages. */

function my_pmproap_all_access_levels($levels, $user_id, $post_id)
{
	//I'm just adding the level, but I could do some calculation based on the user and post id to programatically give access to content
	$levels = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);	
	return $levels;
}
add_filter("pmproap_all_access_levels", "my_pmproap_all_access_levels", 10, 3);

/*
Removes the First Name and Last Name fields on the Member Profile Edit page.
You need to be using the native PMP Profile profiles pages.Renames the "Display Name" field to just "Name".*/

function my_pmpro_member_profile_edit_user_object_fields( $user_fields ) {
	unset( $user_fields['first_name'] );
	unset( $user_fields['last_name'] );
	unset( $user_fields['nickname'] );
	$user_fields['display_name'] = 'Name';
	return $user_fields;
}
add_filter( 'pmpro_member_profile_edit_user_object_fields', 'my_pmpro_member_profile_edit_user_object_fields' );

/* Change the frequency of emails sent when using the Extra Expiration Warning Emails Add On, this combines with the 7-day default email message 

function custom_pmproeewe_email_frequency( $settings = array() ) {
	$settings = array(
		1 => '',
		21 => '',
		42 => '',
	);
	return $settings;
}
add_filter( 'pmproeewe_email_frequency_and_templates', 'custom_pmproeewe_email_frequency', 10, 1 );
*/

/* Change from using google.com for reCAPTCHA to recaptcha.net for countries (e.g. China) where Google is banned. 

add_action( 'init', function() {
	remove_action( 'wp', 'pmpro_init_recaptcha', 5 );
	remove_action( 'init', 'pmpro_init_recaptcha', 20);
}, 5 );
function pmpro_init_recaptcha_action_override() {
	//don't load if setting is off
	global $recaptcha, $recaptcha_validated;
	$recaptcha = pmpro_getOption( 'recaptcha' );
	if ( empty( $recaptcha ) ) {
		return;
	}
	
	//don't load unless we're on the checkout page
	if ( ! pmpro_is_checkout() ) {
		return;
	}
	
	//check for validation
	$recaptcha_validated = pmpro_get_session_var( 'pmpro_recaptcha_validated' );
	if ( ! empty( $recaptcha_validated ) ) {
	    $recaptcha = false;
    }

	//captcha is needed. set up functions to output
	if($recaptcha) {
		global $recaptcha_publickey, $recaptcha_privatekey;
		
		require_once(PMPRO_DIR . '/includes/lib/recaptchalib.php' );
		
		function pmpro_recaptcha_get_html ($pubkey, $error = null, $use_ssl = false) {

			// Figure out language.
			$locale = get_locale();
			if(!empty($locale)) {
				$parts = explode("_", $locale);
				$lang = $parts[0];
			} else {
				$lang = "en";	
			}
			$lang = apply_filters( 'pmpro_recaptcha_lang', $lang );

			// Check which version of ReCAPTCHA we are using.
			$recaptcha_version = pmpro_getOption( 'recaptcha_version' ); 

			if( $recaptcha_version == '3_invisible' ) { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo $pubkey;?>" data-size="invisible" data-callback="onSubmit"></div>
				<script type="text/javascript">															
					var pmpro_recaptcha_validated = false;
					var pmpro_recaptcha_onSubmit = function(token) {
						if ( pmpro_recaptcha_validated ) {
							jQuery('#pmpro_form').submit();
							return;
						} else {
							jQuery.ajax({
							url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
							type: 'GET',
							timeout: 30000,
							dataType: 'html',
							data: {
								'action': 'pmpro_validate_recaptcha',
								'g-recaptcha-response': token,
							},
							error: function(xml){
								alert('Error validating ReCAPTCHA.');
							},
							success: function(response){
								if ( response == '1' ) {
									pmpro_recaptcha_validated = true;
									
									//get a new token to be submitted with the form
									grecaptcha.execute();
								} else {
									pmpro_recaptcha_validated = false;
									
									//warn user validation failed
									alert( 'ReCAPTCHA validation failed. Try again.' );
									
									//get a new token to be submitted with the form
									grecaptcha.execute();
								}
							}
							});
						}						
	        		};

					var pmpro_recaptcha_onloadCallback = function() {
						// Render on main submit button.
						grecaptcha.render('pmpro_btn-submit', {
	            		'sitekey' : '<?php echo $pubkey;?>',
	            		'callback' : pmpro_recaptcha_onSubmit
	          			});
						
						// Update other submit buttons.
						var submit_buttons = jQuery('.pmpro_btn-submit-checkout');
						submit_buttons.each(function() {
							if(jQuery(this).attr('id') != 'pmpro_btn-submit') {
								jQuery(this).click(function(event) {
									event.preventDefault();
									grecaptcha.execute();
								});
							}
						});
	        		};
	    		 </script>
				 <script type="text/javascript"
	 				src="https://www.recaptcha.net/recaptcha/api.js?onload=pmpro_recaptcha_onloadCallback&hl=<?php echo $lang;?>&render=explicit" async defer>
	 			</script>
			<?php } else { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo $pubkey;?>"></div>
				<script type="text/javascript"
					src="https://www.recaptcha.net/recaptcha/api.js?hl=<?php echo $lang;?>">
				</script>
			<?php }				
		}
		
		$recaptcha_publickey = pmpro_getOption( 'recaptcha_publickey' );
		$recaptcha_privatekey = pmpro_getOption( 'recaptcha_privatekey' );
	}
}
add_action( 'wp', 'pmpro_init_recaptcha_action_override', 5 );*/

/* Use the shortcode [pmpro_renew_button] to display the button anywhere on your site where shortcodes are recognized.
 *
 * @return string A link containing the URL string to renew.
 */
 

function my_pmpro_renew_membership_shortcode() {
	global $current_user, $pmpro_pages;
	// Current user empty (i.e. not logged in)
	if ( empty( $current_user ) ) {
		return;
	}
	
	$level = pmpro_getMembershipLevelForUser( $current_user->ID );
	// If the user does not have a membership level, don't display anything.
	if( empty( $level ) ) {
		return;
	}
	
	$level_id = $level->id;
	$url = add_query_arg( 'level', $level_id, get_permalink( $pmpro_pages['checkout'] ) );
	return '<a class="pmpro-renew-button" href="' . esc_url( $url ) . '">Renew Membership</a>';
	
}
add_shortcode( 'pmpro_renew_button', 'my_pmpro_renew_membership_shortcode' );

/* Show Legacy API Keys for Stripe (alternative to Stripe Connect) */

add_filter( 'pmpro_stripe_show_legacy_keys_settings', '__return_true' );

/* Show a link to Gravatar and an avatar preview on the Profile section of the Membership Account page.

function show_gravatar_pmpro_account_bullets_top() {
	global $current_user;
	echo '<li class="alignright" style="display: inline-block; list-style: none; margin: -5rem 0 0 0;">' . get_avatar( $current_user->ID, 160 ) . '</li>';
}
add_action( 'pmpro_account_bullets_top', 'show_gravatar_pmpro_account_bullets_top' );

function show_gravatar_pmpro_account_bullets_bottom() {
	echo '<li><strong>' . __( 'Profile Photo', 'my-textdomain' ) . ':</strong> <a href="http://gravatar.com/" target="_blank">' . __('Add your profile photo using Gravatar.', 'my-textdomain') . '</a></li>';
}
add_action( 'pmpro_account_bullets_bottom', 'show_gravatar_pmpro_account_bullets_bottom');*/

/* Remove the profile action links - Edit Profile, Change Password, and Logout - on the Membership Account page. Uncomment the relative line by removing the comment ("//" double forward slash before the variable) if you would like to remove the links for password reset or logout. */

function my_pmpro_account_profile_action_links_removal( $pmpro_profile_action_links ) {

	unset( $pmpro_profile_action_links['edit-profile'] ); // Remove Edit Profile

	unset( $pmpro_profile_action_links['change-password'] ); // Remove change password
	unset( $pmpro_profile_action_links['logout'] ); // Remove logout link

	return $pmpro_profile_action_links;
}
add_filter( 'pmpro_account_profile_action_links', 'my_pmpro_account_profile_action_links_removal', 15, 1 );

/*
 * Add Biographical Info to the front end user Edit Profile page.
 *
 * This field is set to only display on the Edit Profile page.
 * To display this field at checkout also change the field location in
 * the pmprorh_add_rgistration_field function call from 'profile' to
 * 'checkout_boxes'.*/

function my_pmprorh_user_bio_on_profile_edit() {
	if ( class_exists( 'PMProRH_Field' ) ) {

		// Show on the front end Edit Profile page and hide on user edit profile page in the administrative page.
		$your_profile = false;
		if ( ! is_admin() ) {
			$your_profile = true;
		}

		// create array.
		$fields = array();

		// user_description field
		$fields[] = new PMProRH_Field(
			'description',
			'textarea',
			array(
				'label'    => '<i class="fas fa-id-badge"></i> Brief Profile', // Change label here
				'profile'  => $your_profile, // Hide on administrative user profile edit page
				'required' => false, // Make field optional (set to true to make required)
				'hint'      => 'Please provide a <strong>brief</strong> profile.',
			)
		);

		foreach ( $fields as $field ) {
			pmprorh_add_registration_field(
				'profile', // change to checkout_boxes to also display the field at checkout
				$field
			);
		}
	}
}
add_action( 'init', 'my_pmprorh_user_bio_on_profile_edit' );

/* Add custom registration fields to capture social network URLs. These fields only appear on the Profile page*/

function my_pmprorh_init_custom_registration_fields_for_social_urls() {
	// don't break if Register Helper is not loaded
	if ( ! function_exists( 'pmprorh_add_registration_field' ) ) {
		return false;
	}

	// define the fields
	$fields   = array();
			    $fields[] = new PMProRH_Field(
		'interests', // input field name, used as meta key
		'text',         // field type
		array(
			'label'          => 'Area(s) of Interest', // display custom label, if not used field name will be used
			'size' => 81,
			'hint'      => 'List some of your areas of interest (ex. Mass Gathering Medicine, Emergency Medicine, Public Health, Nursing, etc.).',
			'profile'        => true, // show on profile
			'memberslistcsv' => true, // include when using export members to csv
			'addmember'      => true, // include when using add member from admin
		)
	);
	
	$fields[] = new PMProRH_Field(
		'linkedin_url', // input field name, used as meta key
		'text',         // field type
		array(
			'label'          => '<i class="fab fa-linkedin"></i> - LinkedIn Page', // display custom label, if not used field name will be used
			'profile'        => true, // show on profile
			'memberslistcsv' => true, // include when using export members to csv
			'addmember'      => true, // include when using add member from admin
		)
	);
		$fields[] = new PMProRH_Field(
		'researchgate_url', // input field name, used as meta key
		'text',         // field type
		array(
			'label'          => '<i class="fab fa-researchgate"></i> - ResearchGate Page', // display custom label, if not used field name will be used
			'profile'        => true, // show on profile
			'memberslistcsv' => true, // include when using export members to csv
			'addmember'      => true, // include when using add member from admin
		)
	);
		$fields[] = new PMProRH_Field(
		'youtube_url', // input field name, used as meta key
		'text',         // field type
		array(
			'label'          => '<i class="fab fa-youtube"></i> - YouTube Page', // display custom label, if not used field name will be used
			'profile'        => true, // show on profile
			'memberslistcsv' => true, // include when using export members to csv
			'addmember'      => true, // include when using add member from admin
		)
	);
	    $fields[] = new PMProRH_Field(
		'twitter_url', // input field name, used as meta key
		'text',         // field type
		array(
			'label'          => '<i class="fab fa-twitter"></i> - Twitter Page', // display custom label, if not used field name will be used
			'hint'      => 'Please include the web address (URL) to your Twitter page, not your Twitter handle.',
			'profile'        => true, // show on profile
			'memberslistcsv' => true, // include when using export members to csv
			'addmember'      => true, // include when using add member from admin
		)
	);

	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'checkout_boxes ', // location on checkout page
			$field     // PMProRH_Field object
		);
	}
	unset( $field );

	// that's it. see the PMPro Register Helper readme for more information and examples.
}
add_action( 'init', 'my_pmprorh_init_custom_registration_fields_for_social_urls' );

 /* Allow members to upload their avatar using a Register Helper field during checkout on the Member Profile Edit page.*/

// Filter the saved or updated User Avatar meta field value and add the image to the Media Library.
function my_updated_user_avatar_user_meta( $meta_id, $user_id, $meta_key, $meta_value ) {
	// Change user_avatar to your Register Helper file upload name.
	if ( 'user_avatar' === $meta_key ) {
		$user_info	   = get_userdata( $user_id );
		$filename      = $meta_value['fullpath'];
		$filetype      = wp_check_filetype( basename( $filename ), null );
		$wp_upload_dir = wp_upload_dir();
		$attachment    = array(
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_status'    => 'inherit',
		);
		$attach_id     = wp_insert_attachment( $attachment, $filename );
		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once ABSPATH . 'wp-admin/includes/image.php';
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		update_user_meta( $user_id, 'wp_user_avatar', $attach_id );
	}
}
add_action( 'added_user_meta', 'my_updated_user_avatar_user_meta', 10, 4 );
add_action( 'updated_user_meta', 'my_updated_user_avatar_user_meta', 10, 4 );

// Filter the display of the the get_avatar function to use our local avatar.
function my_user_avatar_filter( $avatar, $id_or_email, $size, $default, $alt ) {
	$my_user = get_userdata( $id_or_email );
	if ( ! empty( $my_user ) ) {
		$avatar_id = get_user_meta( $my_user->ID, 'wp_user_avatar', true );
		if ( ! empty( $avatar_id ) ) {
			$avatar = wp_get_attachment_image_src( $avatar_id, array( $size, $size) );
			$avatar = "<img alt='{$alt}' src='{$avatar[0]}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
		}
	}
	return $avatar;
}
add_filter( 'get_avatar', 'my_user_avatar_filter', 20, 5 );

// Add the User Avatar field at checkout and on the profile edit forms.
function my_pmprorh_init_user_avatar() {
	//don't break if Register Helper is not loaded
	if ( ! function_exists( 'pmprorh_add_registration_field' ) ) {
		return false;
	}
	//define the fields
	$fields   = array();
	$fields[] = new PMProRH_Field(
		'user_avatar',              // input name, will also be used as meta key
		'file',                 // type of field
		array(
			'label'     => '<i class="fas fa-camera"></i> Profile Photo',
			'hint'      => 'Recommended size is 200px x 200px. If you already have a <a href="http://en.gravatar.com/" target="_blank">Gravatar</a>, you do not need to upload a profile photo. It will automatically display in your profile.',
			'profile'   => 'only',    // show in user profile
			'preview'   => true,    // show a preview-sized version of the image
			'addmember' => true,
			'allow_delete' => true,
		)
	);

	//add the fields into a new checkout_boxes are of the checkout page
	foreach ( $fields as $field ) {
		pmprorh_add_registration_field(
			'checkout_boxes', // location on checkout page
			$field            // PMProRH_Field object
		);
	}
}
add_action( 'init', 'my_pmprorh_init_user_avatar' );

/*
 * Prevent oembeds from running on a particular page. For example, this prevents the Twitter feed being embedded on the Member Profile page */
 
function my_pmpro_prevent_oembed($result, $url, $args) {
	if ( strpos( $_SERVER['REQUEST_URI'] , '/profile/') !== false ) {
		$clickable = make_clickable($url);
		$result = str_ireplace( '<a href=', '<a target="_blank" href=', $clickable );
	}
	return $result;
	
		if ( strpos( $_SERVER['REQUEST_URI'] , '/directory/') !== false ) {
		$clickable = make_clickable($url);
		$result = str_ireplace( '<a href=', '<a target="_blank" href=', $clickable );
	}
	return $result;
}
add_filter('pre_oembed_result', 'my_pmpro_prevent_oembed', 10, 3);

/* This recipe will change the "Username or Email Address" text string on the PMP frontend login page.

function my_pmpro_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Username or Email Address':
			$translated_text = __( 'Email Address', 'paid-memberships-pro' );
			break;
		case 'Please enter your username or email address. You will receive a link to create a new password via email':
			$translated_text = __( 'Please enter your email address. You will receive a link to update your password by email', 'paid-memberships-pro' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_pmpro_text_strings', 20, 3 );

/* Adjust the size of the QR code on Membership Card. */

function custom_pmpro_membership_card_qr_code_size( $size ) {
	$size = '90x90';
	return $size;
}
add_filter( 'pmpro_membership_card_qr_code_size', 'custom_pmpro_membership_card_qr_code_size' );

/* This recipe will display the member's number to the bottom of their membership card. */

function my_pmpro_add_member_numb_after_member_card( $pmpro_membership_card_user, $print_sizes, $qr_code, $qr_data ){

	$member_number = get_user_meta( $pmpro_membership_card_user->ID, 'member_number', true );

	if( $member_number !== "" ){
		echo "<p>".__("<strong>Member Number</strong>", "pmpro").": ".$member_number."</p>"; 
		//Wrapping content in <p> tags will help with consistent spacing
	}

}
add_action( 'pmpro_membership_card_after_card', 'my_pmpro_add_member_numb_after_member_card', 10, 4 );

/* The recipe will use custom address fields for the Membership Maps Add On instead of the billing address fields. WADEM doesn't collect billing address information during checkout using Stripe. */

function mypmpromm_custom_address_fields( $member_address, $user_id, $morder ){

	$member_address = array(
		'street' => ( !empty( $_REQUEST['address_1'] ) ) ? $_REQUEST['address_1'] : get_user_meta( $user_id, 'address_1', true ),
		'city' => ( !empty( $_REQUEST['city'] ) ) ? $_REQUEST['city'] : get_user_meta( $user_id, 'city', true ),
		'zip' => ( !empty( $_REQUEST['postal_code'] ) ) ? $_REQUEST['postal_code'] : get_user_meta( $user_id, 'postal_code', true ),
		'country' => ( !empty( $_REQUEST['country'] ) ) ? $_REQUEST['country'] : get_user_meta( $user_id, 'country', true )
	);

	return $member_address;
}
add_filter( 'pmpromm_member_address_after_checkout', 'mypmpromm_custom_address_fields', 10, 3 );

/* Add custom fields to PMP Invoice Template */

function my_custom_pmpro_pdf_variable( $data_array, $user, $order_data ) {
	$data_array['{{first_name}}'] = get_user_meta( $user->ID, 'first_name', true );
	$data_array['{{last_name}}'] = get_user_meta( $user->ID, 'last_name', true );
	$data_array['{{address_1}}'] = get_user_meta( $user->ID, 'address_1', true );
	$data_array['{{city}}'] = get_user_meta( $user->ID, 'city', true );
    $data_array['{{country}}'] = get_user_meta( $user->ID, 'country', true );
	
	return $data_array;
}
add_filter( 'pmpro_pdf_invoice_custom_variables', 'my_custom_pmpro_pdf_variable', 10, 3 );

/**
 * Disables the `pmpro_send_200_http_response()` function.
 *
 * That function was implemented in PMPro v2.6.4 to allow IPN/webhook
 * handlers to adknowledge the receipt of a webhook before processing
 * it in order to avoid timeout issues at the gateway.
 *
 * This code recipe should be used in cases where gateways are showing that
 * PMPro returned an error for a webhook, even though the webhook was processed properly.

 */
add_filter( 'pmpro_send_200_http_response', '__return_false' );