<?php

    class JWT{

        
        public static function encode($header, $payload){

            $key = "simple";
            
            $json_header = json_encode($header);
            $json_payload = json_encode($payload);

            $b64_header = base64_encode($json_header);
            $b64_payload = base64_encode($json_payload);

            $signature = hash_hmac('sha256', $b64_header.".".$b64_payload, $key, true);
            $b64_signature = base64_encode($signature);

            $token = implode(".", [$b64_header, $b64_payload, $b64_signature]);

            return $token;
        }

        public static function decode($token){
            $splitted_token = explode(".", $token);

            $json_header = base64_decode($splitted_token[0]);
            $json_payload = base64_decode($splitted_token[1]);
            $signature = base64_decode($splitted_token[2]);

            return [$json_header, $json_payload, $signature];
        }

        public static function validate_hash($header, $payload, $test_signature){

        }
    }


?>