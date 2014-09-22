<?php

    if ( isset( $_POST['checker'] ) ) {
    
    $inputUsername = sanitize_text_field( $_POST['inputUsername'] );
    $inputEmail = sanitize_text_field( $_POST['inputEmail'] );
    $inputPassword1 = sanitize_text_field( $_POST['inputPassword1'] );
    $inputPassword2 = sanitize_text_field( $_POST['inputPassword2'] );  
    $inputLocation = sanitize_text_field( $_POST['inputLocation'] );
    $inputDOB = sanitize_text_field( $_POST['inputDOB'] );
    $inputGender = sanitize_text_field( $_POST['inputGender'] );
    
    $requiredFields = array('inputUsername', 'inputEmail', 'inputPassword1', 'inputPassword2');
    
    $inputData = array(
        'inputUsername' => "$inputUsername", 
        'inputEmail' => "$inputEmail", 
        'inputPassword1' => "$inputPassword1", 
        'inputPassword2' => "$inputPassword2",
        'inputLocation' => "$inputLocation",
        'inputDOB' => "$inputDOB",
        'inputGender' => "$inputGender",
    );
 
    $validator = new Validate(); 
    
    $validator->valdateRequired($inputData, $requiredFields);
    


        if ( $validator->success == TRUE ) {
            echo 'We are all good';
        } else {
            echo 'NOOT';
        }

    }