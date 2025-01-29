<?php

use LDAP\Result;

class User{
    private $table = "pengguna";
    private $db;

    //User Data
    public $id_pengguna = "";
    private $nama_depan;
    private $nama_belakang;
    private $nomor_wa;
    private $email;
    private $kata_sandi;
    private $tanggal_lahir;
    private $bulan;
    private $tahun;
    private $kelamin;
    private $foto_profil;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function validation($submit)
    {
        // ------ start validastion ------
        $array_vallidation = ["wa"=>"", "email"=>"", "born"=>""]; // Inisialisasi array default
        // cek apakah ada nomor wa yang sama
        $this->db->query("SELECT nomor_wa FROM $this->table WHERE nomor_wa = :nomor_wa");
        $this->db->bind("nomor_wa", $submit["nomor_wa"]);
        $this->db->execute();
        if( $this->db->rowCount() > 0 ){
            $array_vallidation["wa"] = "Nomor Whatsapp Sudah terdaftar, Silahkan Gunakan Yaang Lain";
        }
        // cek apakah ada email yang sama
        $this->db->query("SELECT email FROM $this->table WHERE email = :email");
        $this->db->bind("email", $submit["email"]);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $array_vallidation['email'] = "Email sudah terdaftar, silahkan gunakan yang lain.";
        }
        // Cek apakah dia cukup umur
        if( $submit["tahun"] > 2011 ){
            $array_vallidation["born"] = "Maaf anda belum cukup usia";
        }
        // ------ End Validasi ------

        // Cek apakah semua validasi lolos
        if( empty($array_vallidation["wa"]) && 
            empty($array_vallidation["email"]) && 
            empty($array_vallidation["born"]) 
        ){
            return  array("result" => true, /* dedfault value 👉 */ "wa_vall" => "", "email_vall" => "", "born_vall" => "");
        } else {
            return array(
                "result" => false,
                "wa_vall" => $array_vallidation["wa"],
                "email_vall" => $array_vallidation["email"],
                "born_vall" => $array_vallidation["born"]
            );
        }
    }

    public function profileImage($image)
    {
        // ambil data
        $namaFile = $image["imgUploading"]["name"];
        $ukuranFile = $image["imgUploading"]["size"];
        $error = $image["imgUploading"]["error"];
        $tmpName = $image["imgUploading"]["tmp_name"];

        // cek apakah tidak ada fotoa yang diupload
        if( $error === 4 ){
            echo"
                <script>
                    alert('Pilihlah foto Terlebihdahulu');
                </script>";
            return false;    
        }

        // cek apakah yang diupload adalah foto
        $extensionValidImage = ["jpg", "jpeg", 'png', 'gif'];
        $extensionImage = explode(".", $namaFile);
        $extensionImage = strtolower(end($extensionImage));

        // cek apakah file yang diupload itu sesuai dengan apa yang telah diterapkan didalam array
        if( !in_array($extensionImage, $extensionValidImage) ){
            echo"
                <script>
                    alert('Yang Anda upload bukan foto ');
                </script>";

            return false;    
        }

        // cek apakah ukuran kebesaran        
        if( $ukuranFile > 10000000 ){
            echo"
                <script>
                    alert('foto yang anda upload terlalu besar');
                </script>"; 

            return false;    
        } 

        $namaFileBaru = uniqid();
        $namaFileBaru .= ".";
        $namaFileBaru .= $extensionImage;

        // pindahkan foto ke folder yang diingingkan
        move_uploaded_file($tmpName, IMAGE_DIRECTORY . "profileImg_$namaFileBaru" );

        return ["result" => true,
                "namaFotoBaru" =>  $namaFileBaru];     
    }

    public function insert($data)
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
        $this->foto_profil = htmlspecialchars($data["foto_profil"]);
        var_dump($this->foto_profil);
        
         //------ pengiriman email dan wa kalau berhasil daftar ------
        $penerima_email = $this->email;
        $email_terdaftar = $this->email;
        $subjek = "Pendaftaran Akun";
        $username = "$this->nama_depan $this->nama_belakang";
        $whatsapp = $this->nomor_wa;
        $kata_sandi = $this->kata_sandi;
  
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
            $this->db->bind("nama", "$this->nama_depan $this->nama_belakang");
            $this->db->bind("nomor_wa", $this->nomor_wa);
            $this->db->bind("email", $this->email);
            $this->db->bind("kata_sandi", password_hash($this->kata_sandi, PASSWORD_DEFAULT));
            $this->db->bind("tanggal_lahir", "$this->tanggal_lahir-$this->bulan-$this->tahun");
            $this->db->bind("kelamin", $this->kelamin);
            $this->db->bind("image", $this->foto_profil);
            $this->db->execute();
            
            if ($this->db->rowCount() > 0){
                WhatsappHelper::kirim_wa_pendaftaran($username, $whatsapp, $email_terdaftar, $kata_sandi);
                // kirim_email_pendaftaran($penerima_email, $subjek, $username, $whatsapp, $email_terdaftar, $kata_sandi);                
            }
    }

    public function cekLogin($submit)
    {
        $username = "";
        $query = "";
        if (( substr($submit["user"], 0, 3)) == "+62"){
            $username = $submit["user"];
            $query = "SELECT * FROM pengguna WHERE nomor_wa = :user ";
        } elseif (( substr($submit["user"], 0, 2)) == "08"){
            $submit["user"] = PhoneHelper::normalizePhoneNumber($submit["user"]);
            $username = $submit["user"];
            $query = "SELECT * FROM pengguna WHERE nomor_wa = :user ";
        } else{
            $username = $submit["user"];
            $query = "SELECT * FROM pengguna WHERE email = :user ";
        }
        $this->db->query($query);
        $this->db->bind("user", $username);
        $this->db->execute();
        if($this->db->rowCount() > 0) {
            if(  password_verify($submit["password"], $this->db->single()["kata_sandi"])){
                return[
                    "result" => true, 
                    "id" => $this->db->single()["id_pengguna"],
                    "whatsapp" => $this->db->single()["nomor_wa"]
                ];
            }else {
                return[ "result" => false, "whatsapp" => ""];
            } 
        } else {
            return["result" => false, "whatsapp" => ""];
        } 
    }


    public function setCookieToken($id)
    {
        $token = CookieHelper::generateRandomToken();

        $this->db->query("INSERT INTO `token_login` (`id_token`, `pengguna_id`, `token`) 
                        VALUES (NULL, :id, :token);");
        $this->db->bind("id", $id);
        $this->db->bind("token", password_hash($token, PASSWORD_DEFAULT));
        $this->db->execute();

        setcookie("*****", $token, strtotime("+1 hours"),"/");
        
    }
}