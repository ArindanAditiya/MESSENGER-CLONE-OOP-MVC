<?php
class PhoneHelper {

    public static function tes(){
        echo "tes";
    }

    public static function normalizePhoneNumber($input) {
        // Hapus semua karakter non-numerik
        $input = preg_replace('/[^0-9]/', '', $input);

        // Jika nomor dimulai dengan '0', ganti dengan '+62'
        if (strpos($input, '0') === 0) {
            $input = '+62' . substr($input, 1);
        } elseif (strpos($input, '62') === 0) {
            $input = '+' . $input;
        } elseif (!strpos($input, '+') === 0) {
            $input = '+62' . $input;
        }

        return $input;
    }
}
