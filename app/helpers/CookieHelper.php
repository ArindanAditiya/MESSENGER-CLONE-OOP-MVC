<?php

class CookieHelper{
    public static function generateRandomToken($length = 100)
    {
        // Define character pool for token generation
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomToken = '';

        // Generate the random token
        for ($i = 0; $i < $length; $i++) {
            $randomToken .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomToken;
    }
}
