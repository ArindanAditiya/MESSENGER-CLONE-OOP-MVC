 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

function kirim_email_pendaftaran($penerima, $subjek, $username, $whatsapp, $email, $kata_sandi) {
    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'indangaming003@gmail.com';
        $mail->Password   = 'wbek emzd mpjk nrgr'; // Password Aplikasi Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Pengirim dan Penerima
        $mail->setFrom('indangaming003@gmail.com', 'Pendaftaran Akun');
        $mail->addAddress($penerima);

        // Menangkap output dari template PHP
        ob_start();
        $username = htmlspecialchars($username);
        $whatsapp = htmlspecialchars($whatsapp);
        $email = htmlspecialchars($email);
        $kata_sandi = htmlspecialchars($kata_sandi);
        include('ui_email_pendaftaran.php'); // Memasukkan template dan menangkap outputnya
        $mail->Body = ob_get_clean(); // Mengambil isi buffer dan membersihkannya

        // Kirim Email
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->send();
        // echo 'Pesan berhasil dikirim';
    } catch (Exception $e) {
        echo "Pesan tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}";
    }
}
// for try the code👇
// kirim_email_pendaftaran("indanaditiya@gmail.com", "tes", "indan", "08789078097", "indanaditiya@gmail.com", "indanfulstack2026");