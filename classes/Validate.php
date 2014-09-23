<?php

/*
 * Class that handles validation of user input
 */

class Validate {
    public $custom_messages = array();
    public $success = array(
        'requiredCheck' => FALSE,
        'passCheck' => FALSE,
        
    );
            
    /*
     * Check If Required Fields Are Filled In
     */
    public function validateRequired($input, $requiredFields) {
        foreach ($input as $key => $value) {
            if ( in_array($key, $requiredFields) && empty($value)) {
                $this->custom_messages[] =  $key . ' is required';           
            }        
        }
        if ( ! empty( $this->errors ) ) {
            $this->success['requiredCheck'] = FALSE;
        } else {
            $this->success['requiredCheck'] = TRUE;
        }
        
        return $this->success;
    }
    
    /*
     * Check If Passwords Match
     */
    public function validatePassword($password1, $password2) {
        if ( $password1 != $password2 ) {            
            $this->custom_messages[] =  'passwords must match';
            $this->success['passCheck'] = FALSE;
        } else {
            $this->success['passCheck'] = TRUE;
        }
        
        return $this->success;
    }
    
}