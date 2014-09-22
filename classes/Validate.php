<?php

/*
 * Class that handles validation of user input
 */

class Validate {
    public $errors = array();
    public $success = FALSE;    
           
    
    /*
     * Check If Required Fields Are Filled In
     */
    public function validateRequired($input, $requiredFields) {
        foreach ($input as $key => $value) {
            if ( in_array($key, $requiredFields) && empty($value)) {
                $this->errors[] =  $key . ' is required';
            }        
        }
        if ( !empty( $this->errors ) ) {
            $this->success = FALSE;
        } else {
            $this->success = TRUE;
        }
        
        return $this->success;
    }
    
    /*
     * Check If Passwords Match
     */
    public function validatePassword($password1, $password2) {
        if ( $password1 != $password2 ) {            
            $this->errors[] =  'passwords must match';
            $this->success = FALSE;
        } else {
            $this->success = TRUE;
        }
        
        return $this->success;
    }
    
}