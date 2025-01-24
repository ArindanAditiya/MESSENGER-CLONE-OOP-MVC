<div class="container">
      <div class="main">
        <form action="" method="post">
          <h3>Masukkan kode ke email anda</h3>
          <p>Beri tahu kami bahwa akun ini milik anda. Masukkan kode yang dikirim ke <b>whatsapp anda</b>
            (<?= $data["whatsapp_send"] ;?>)</p>
          <div class="input-text">
            <span>FB-</span>
            <input name="otpInp" id="input" type="text" />
          </div>
          <a href="<?= BASEURL . "login/sendNewOtp" ;?>">Kirim otp lagi</a>
          <div class="button">
            <button name="otpSubmit" type="submit" id="lanjutkan" class="none" href="#">Lanjutkan</button>
          </div>
        </form>
      </div>
    </div>