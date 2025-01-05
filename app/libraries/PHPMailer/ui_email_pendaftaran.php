<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Email Keren</title>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { width: 80%; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
            h1 { color: #007bff; }
            p { font-size: 16px; }
            .button { display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; }
    </style>
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Akun Anda Berhasil Terdaftar!! 🤗</h3>
            <p>Username: <?= htmlspecialchars($username); ?></p>
            <p>Nomor Whatsapp: <?= htmlspecialchars($whatsapp); ?></p>
            <p>Email: <?= htmlspecialchars($email); ?></p>
            <p>password: <?= htmlspecialchars($kata_sandi); ?></p>
            <p> untuk login anda bisa menggunakan nomor wa/email</p>
            <a href="#" class="button">Messenger Clone</a>
            <div class="footer">
                <p>&copy; 2024 Messenger Clone Project by : <a href="#">Arindan Aditiya</a></p>
            </div>
        </div>
    </body>
</html>
