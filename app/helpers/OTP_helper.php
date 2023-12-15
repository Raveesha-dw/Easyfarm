<?php

    function generate_Otp(){

        // generate otp
        $characters = '0123456789';
        $length = 6;
        $otp = '';

        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $otp;
    }

?>