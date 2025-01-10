<?php

class User{
    private $table = "pengguna";
    private $db;

    //User Data
    protected $nama_depan;
    protected $nama_belakang;
    protected $nomor_wa;
    protected $email;
    protected $kata_sandi;
    protected $tanggal_lahir;
    protected $bulan;
    protected $tahun;
    protected $kelamin;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function signUp($data)
    {
        $this->nama_depan = htmlspecialchars($data["nama_depan"]);
        $this->nama_belakang = htmlspecialchars($data["nama_belakang"]);
        $this->nomor_wa = htmlspecialchars($data["nomor_wa"]);
        $this->email = htmlspecialchars($data["email"]);
        $this->kata_sandi = htmlspecialchars($data["kata_sandi"]);
        $this->tanggal_lahir = htmlspecialchars($data["tanggal"]);
        $this->bulan = htmlspecialchars($data["bulan"]);
        $this->tahun = htmlspecialchars($data["tahun"]);
        $this->kelamin = htmlspecialchars($data["kelamin"]);

        // ------ start validastion ------
        $array_vallidation = ["", "", ""]; // Inisialisasi array default

        // cek apakah ada nomor wa yang sama
        $this->db->query("SELECT nomor_wa FROM $this->table WHERE nomor_wa = :nomor_wa");
        $this->db->bind("nomor_wa", $this->nomor_wa);
        $this->db->execute();
        if( $this->db->rowCount() > 0 ){
            $array_vallidation["wa"] = "<i style='color: red'>Nomor Whatsapp Sudah terdaftar, Silahkan Gunakan Yaang Lain<i/>";
        }
        // Validasi email
        $this->db->query("SELECT email FROM $this->table WHERE email = :email");
        $this->db->bind("email", $this->email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $array_vallidation['email'] = "Email sudah terdaftar, silahkan gunakan yang lain.";
        }
        //cek apakah dia cukup umur
        if( (int)$this->tahun > 2011 ){
            $array_vallidation["usai"] = "Maaf anda belum cukup usia";
        }
        // ------ end validastion ------

        // tangkap nilai validasi
        $pesan_kesalahan_wa = $array_vallidation["wa"];
        $pesan_kesalahan_email = $array_vallidation["email"];
        $pesan_kesalahan_usia = $array_vallidation["usia"];
        $perubahan = $this->db->rowCount();
         //------ pengiriman email dan wa kalau berhasil daftar ------
        $penerima = $this->email;
        $subjek = "Pendaftaran Akun";
        $username = "$this->nama_depan $this->nama_belakang";
        $whatsapp = $this->nomor_wa;
        $password = $this->kata_sandi;
  
        $query = "INSERT INTO $this->table (nama_pengguna, nomor_wa, email, kata_sandi, tanggal_lahir, jenis_kelamin, foto_profil) 
                VALUES (
                :nama, 
                :nomor_wa,
                :email,
                :kata_sandi,
                :tanggal_lahir,
                :kelamin,
                :image
            )";

    
            // return $this->db->rowCount();
            // Logika validasi, cek apakah semua kesalahan kosong
        if( empty($pesan_kesalahan_wa) && empty($pesan_kesalahan_email) && empty($pesan_kesalahan_usia) ){
            $this->db->query($query);
            $this->db->bind("nama", "$this->nama_depan $this->nama_belakang");
            $this->db->bind("nomor_wa", $this->nomor_wa);
            $this->db->bind("email", $this->email);
            $this->db->bind("kata_sandi", $this->kata_sandi);
            $this->db->bind("tanggal_lahir", "$this->tanggal_lahir-$this->bulan-$this->tahun");
            $this->db->bind("kelamin", $this->kelamin);
            $this->db->bind("image", IMG . "person.jpg");
            $this->db->execute();
            kirim_email_pendaftaran($penerima, $subjek, $username, $whatsapp, $this->email, $password);
            kirim_wa_pendaftaran($username, $whatsapp, $this->email, $password);
            return array( true , $pesan_kesalahan_wa , $pesan_kesalahan_email, $pesan_kesalahan_usia, $perubahan);
        } else {
            return array( false , $pesan_kesalahan_wa , $pesan_kesalahan_email, $pesan_kesalahan_usia, $perubahan);
        }
    }
}