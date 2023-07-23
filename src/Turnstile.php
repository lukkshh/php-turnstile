<?php

class Turnstile  {

    private string $cf_token;
    private string $secret_key;

    function __construct($secret_key,$cf_token) {
        $this->secret_key = $secret_key;
        $this->cf_token = $cf_token;
    }

    function exec(){
        $ch = curl_init();

        $secret_key = $this->secret_key;
  
        $api = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
        
        $cf_token = $this->cf_token;

        curl_setopt($ch, CURLOPT_URL,$api);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "secret=$secret_key&response=$cf_token");
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        
        curl_close($ch);

        $result = json_decode($response,TRUE);

        if($result['success'] == true){
            return true;
        } else {
            return false;
        }

    }

    function f_response(){
        $ch = curl_init();

        $secret_key = $this->secret_key;

        $api = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
        
        $cf_token = $this->cf_token;

        curl_setopt($ch, CURLOPT_URL,$api);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "secret=$secret_key&response=$cf_token");
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        
        curl_close($ch);
      
        return $response;
    }
}

?>