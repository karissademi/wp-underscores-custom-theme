<?php

    
/*
 * Check If Form is Submitted by Checking the Hidden Field 'checker'
 */
if ( isset( $_POST['checker'] ) ) {
        
    /*
     * Make the Object Global to be Accessible from Anywhere
     */
    global $validator;

    /*
     * Sanitize User Input
     */
    $inputUsername = sanitize_text_field( $_POST['inputUsername'] );
    $inputEmail = sanitize_text_field( $_POST['inputEmail'] );
    $inputPassword1 = sanitize_text_field( $_POST['inputPassword1'] );
    $inputPassword2 = sanitize_text_field( $_POST['inputPassword2'] );  
    $inputLocation = sanitize_text_field( $_POST['inputLocation'] );
    $inputDOB = sanitize_text_field( $_POST['inputDOB'] );
    $inputGender = sanitize_text_field( $_POST['inputGender'] );

    /*
     * Define Required Fields
     */
    $requiredFields = array('inputUsername', 'inputEmail', 'inputPassword1', 'inputPassword2');

    /*
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

    
    /*
     * Declate the Validator Object
     */
    $validator = new Validate();

    $validator->validateRequired($inputData, $requiredFields);
    
    $validator->validatePassword($inputPassword1, $inputPassword2);
    
    /*
     * Insert New User If Validation Successful
     */
    if ( $validator->success == TRUE ) {
        $userData = array(
            'user_login' => $inputUsername,
            'user_email' => $inputEmail,
            'user_pass' => $inputPassword1,
        );
        
        wp_insert_user($userData);
        
        /*
         * Extract Data for Updating User Meta Data
         */
        $newUser = get_user_by('email', $inputEmail);    
        
        echo $newUser->ID;
    }

    /*
     * Render Template
     */
    get_template_part('page', 'register');
    

}