<?php
function my_login_logo() {

	$bg = array(
		"balt_05.jpg",
		"balt_12.jpg",
		"chk_1.png",
		"dc_13.jpg",
		"dc_14.jpg",
		"dc_24.jpg",
		"dc_41.jpg",
		"fll_28.jpg",
		"iroc_12.jpg",
		"iroc_15.jpg",
		"iroc_68.jpg",
		"iroc_116.jpg",
		"seaperch_12.jpg",
		"stl_16.jpg",
		"stl_31.jpg",
		"stl_51.jpg",
		"stl_78.jpg",
		"stl_121.jpg"
	); // array of filenames

  	$i = rand(0, count($bg)-1); // generate random number size of the array
  	$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen

	?>
    <style type="text/css">
        .login h1 a {
            background-image: url(/apple-touch-icon-144-precomposed.png);
			background-size: 120px 120px;
			height: 120px;
			width: 120px;
			margin: -50px auto 25px;
        }
        body.login {
        	background: url(/wp-content/feather/loginitems/<?php echo $selectedBg; ?>) no-repeat;
        	background-size: cover;
        }
        .login #nav, .login #backtoblog, .login #nav a, .login #backtoblog a {
        	text-shadow: 0 0 2px black;
        	color: white;
        	text-align: center;
        }
    </style>
	<script>
    </script>
	<?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/* Modern Social Media Fields
 * Add Twitter, Facebook and Google+ field to contact methods, remove AIM, YIM and Jabber
 * http://wp.me/p1Ehkq-fX
 */
add_filter( 'user_contactmethods', 'ts_add_contact_fields' );
function ts_add_contact_fields( $contactmethods ) {
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['googleplus'] = 'Google+';
	$contactmethods['instagram'] = 'Instagram';
	$contactmethods['github'] = 'GitHub';

	unset( $contactmethods['yim'] );
	unset( $contactmethods['aim'] );
	unset( $contactmethods['jabber'] );

	return $contactmethods;
}

/* Custom Signup Functions
 * Add Password, Repeat Password and Are You Human fields to WordPress registration form
 * http://wp.me/p1Ehkq-gn
 */

add_action( 'register_form', 'ts_show_extra_register_fields' );
function ts_show_extra_register_fields(){
?>
	<p>
		<label for="password">Password<br/>
		<input id="password" class="input" type="password" tabindex="30" size="25" value="" name="password" />
		</label>
	</p>
	<p>
		<label for="repeat_password">Repeat password<br/>
		<input id="repeat_password" class="input" type="password" tabindex="40" size="25" value="" name="repeat_password" />
		</label>
	</p>
	<p>
		<label for="are_you_human">Invite code?<br/>
		<input id="are_you_human" class="input" type="text" tabindex="40" size="25" value="" name="are_you_human" />
		</label>
	</p>
<?php
}
 
// Check the form for errors
add_action( 'register_post', 'ts_check_extra_register_fields', 10, 3 );
function ts_check_extra_register_fields($login, $email, $errors) {
	if ( $_POST['password'] !== $_POST['repeat_password'] ) {
		$errors->add( 'passwords_not_matched', "<strong>ERROR</strong>: Passwords must match" );
	}
	if ( strlen( $_POST['password'] ) < 8 ) {
		$errors->add( 'password_too_short', "<strong>ERROR</strong>: Passwords must be at least eight characters long" );
	}
	if ( $_POST['are_you_human'] !== get_bloginfo( 'name' ) ) {
		$errors->add( 'not_human', "<strong>ERROR</strong>: NO robots allowed beyond this point! Check the corners, there's a Back to [sitename] link." );
	}
}

// Storing WordPress user-selected password into database on registration
add_action( 'user_register', 'ts_register_extra_fields', 100 );
function ts_register_extra_fields( $user_id ){
	$userdata = array();
 
	$userdata['ID'] = $user_id;
	if ( $_POST['password'] !== '' ) {
		$userdata['user_pass'] = $_POST['password'];
	}
	$new_user_id = wp_update_user( $userdata );
}

add_filter( 'gettext', 'ts_edit_password_email_text' );
function ts_edit_password_email_text ( $text ) {
	if ( $text == 'A password will be e-mailed to you.' ) {
		$text = 'If you leave password fields empty one will be generated for you. Password must be at least eight characters long.';
	}
	return $text;
}

?>