<?php

// ---------------------- PEMBERITAHUUAN PENDAFTRAN ----------------------
function kirim_wa_pendaftaran($username, $whatsapp, $email, $password){
    $params=array(

        'token' => 'ge9nmk7bpw6fylv8',
        'to' => "$whatsapp",
        'body' => "Selamat nomor Whatsapp anda berhasil terdaftar di projek Messenger Clone

        username : *$username*
        nomor wa : *$whatsapp*
        email : *$email*
        password : *$password*

        untuk login anda bisa menggunakan nomor wa/email");

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ultramsg.com/instance95223/messages/chat",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => http_build_query($params),
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
}

// ---------------------- OTP ----------------------
function kirim_wa_otp($whatsapp){
  $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
  $params=array(
      'token' => 'ge9nmk7bpw6fylv8',
      'to' => "$whatsapp",
      'body' => "$otp adalah kode kemanan Messengr Clone anda. Masukkan kode tersebut di Facebook untuk ferivikasi akun anda");

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.ultramsg.com/instance95223/messages/chat",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => http_build_query($params),
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded"
        ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // echo $response;
      }

      return $otp;
}





