<?php

class User{
    private $table = "pengguna";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function signUp($data)
    {
        $nama_depan = htmlspecialchars($data["nama_depan"]);
        $nama_belakang = htmlspecialchars($data["nama_belakang"]);
        $nomor_wa = htmlspecialchars($data["nomor_wa"]);
        $email = htmlspecialchars($data["email"]);
        $kata_sandi = htmlspecialchars($data["kata_sandi"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal"]);
        $bulan = htmlspecialchars($data["bulan"]);
        $tahun = htmlspecialchars($data["tahun"]);
        $kelamin = htmlspecialchars($data["kelamin"]);

        // ------ start validastion ------
        $array_vall = array("", "", ""); // Inisialisasi array default

        // cek apakah ada nomor wa yang sama
        $this->db->query("SELECT nomor_wa FROM $this->table WHERE nomor_wa = :nomor_wa");
        $this->db->bind("nomor_wa", $nomor_wa);
        $this->db->execute();
        if( $this->db->rowCount() > 0 ){
            $array_vall[0] = "<i style='color: red'>Nomor Whatsapp Sudah terdaftar, Silahkan Gunakan Yaang Lain<i/>";
        }
        // cek apakah ada nomor wa yang sama
        $this->db->query("SELECT nomor_wa FROM $this->table WHERE nomor_wa = :nomor_wa");
        $this->db->bind("nomor_wa", $nomor_wa);
        $this->db->execute();
        if( $this->db->rowCount() > 0 ){
            $array_vall[1] = "<i style='color: red'>Email Sudah terdaftar, Silahkan Gunakan Yaang Lain<i/>";
        }
        //cek apakah dia cukup umur
        if( $tahun > "2011" ){
            $array_vall[2] = "Maaf anda belum cukup usia";
        }

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

            $this->db->query($query);
            $this->db->bind("nama", "$nama_depan $nama_belakang");
            $this->db->bind("nomor_wa", $nomor_wa);
            $this->db->bind("email", $email);
            $this->db->bind("kata_sandi", $kata_sandi);
            $this->db->bind("tanggal_lahir", "$tanggal_lahir $bulan $tahun");
            $this->db->bind("kelamin", $kelamin);
            $this->db->bind("image", IMG . "person.jpg");
            $this->db->execute();

            return $this->db->rowCount();
    }
}