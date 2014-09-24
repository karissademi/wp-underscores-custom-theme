<?php
/**
 * Check if registration form is submitted
 */
if ( isset( $_POST['registerForm'] ) ) {
    /**
     * Make the Object Global to be Accessible from Anywhere
     */
    global $validator;

    /**
     * Sanitize User Input
     */
    $inputUsername = sanitize_text_field( $_POST['inputUsername'] );
    $inputEmail = sanitize_text_field( $_POST['inputEmail'] );
    $inputPassword1 = sanitize_text_field( $_POST['inputPassword1'] );
    $inputPassword2 = sanitize_text_field( $_POST['inputPassword2'] );  
    $inputLocation = sanitize_text_field( $_POST['inputLocation'] );
    $inputDOB = sanitize_text_field( $_POST['inputDOB'] );
    $inputGender = sanitize_text_field( $_POST['inputGender'] );

    /**
     * Define Required Fields
     */
    $requiredFields = array('inputUsername', 'inputEmail', 'inputPassword1', 'inputPassword2');

    /**
     * Place User Input in an Array
     */
    $inputData = array(
        'inputUsername' => "$inputUsername", 
        'inputEmail' => "$inputEmail", 
        'inputPassword1' => "$inputPassword1", 
        'inputPassword2' => "$inputPassword2",
        'inputLocation' => "$inputLocation",
        'inputDOB' => "$inputDOB",
        'inputGender' => "$inputGender",
    );

    
    /**
     * Declate the Validator Object
     */
    $validator = new User();

    $validator->validateRequired($inputData, $requiredFields);
    
    $validator->validatePassword($inputPassword1, $inputPassword2);
    
    /**
     * Insert New User If Validation Successful
     */
    if ( ! in_array(false, $validator->success) ) {
        $userData = array(
            'user_login' => $inputUsername,
            'user_email' => $inputEmail,
            'user_pass' => $inputPassword1,
        );     
        
        if ( wp_insert_user($userData) ) {
            
            $newUser = get_user_by('email', $inputEmail);    
            
            $newUser->remove_role( 'subscriber' );
            
            $newUser->add_role( 'editor' );
        
            update_user_meta($newUser->ID, 'Location', $inputLocation);
            update_user_meta($newUser->ID, 'DOB', $inputDOB);
            update_user_meta($newUser->ID, 'Gender', $inputGender);
            
            $validator->custom_messages[] = 'User created';
        }
    }     
}

/**
 * Check if login form is submitted
 */
if ( isset($_POST['login_form']) ) {
    if ( isset($_POST['user_login']) && isset($_POST['user_password']) ) {
        $user_login = sanitize_text_field($_POST['user_login']);
        $user_password = esc_attr($_POST['user_password']);

        $creds = array(
            'user_login'  =>  $user_login,
            'user_password' => $user_password,
            'remember'  => false,
        );

        $user = wp_signon( $creds, false );

        $userID = $user->ID;

        wp_set_current_user( $userID, $user_login );
        wp_set_auth_cookie( $userID, true, false );
        do_action('wp_login', $user_login);     

        if ( is_user_logged_in() ) {
            $validator->custom_messages[] = 'You have successfully logged in';
        } else {
            $validator->custom_messages[] = 'Please try again';
        }
    }       
}