<?php

/*
 * Class that handles validation of user input
 */
class Validation {
    public $custom_messages = array();
    public $success = array(
        'requiredCheck' => false,
        'passCheck' => false,
        
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
        if ( ! empty( $this->custom_messages ) ) {
            $this->success['requiredCheck'] = false;
        } else {
            $this->success['requiredCheck'] = true;
        }
        
        return $this->success;
    }
    
    /*
     * Check If Passwords Match
     */
    public function validatePassword($password1, $password2) {
        if ( $password1 != $password2 ) {            
            $this->custom_messages[] =  'passwords must match';
            $this->success['passCheck'] = false;
        } else {
            $this->success['passCheck'] = true;
        }
        
        return $this->success;
    }
    
}