<?php
class Signup extends Controller{
    protected $modelName = "User";
    
    public function index(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["style"] = CSS . "daftar.css";
        $data["script"] = "";
        $data["wa_vall_value"] = "";
        $data["email_vall_value"] = "";
        $data["born_vall_value"] = "";
        
        // kasih header
        $this->view("templates/header", $data);
        // kalau disubmit
        if( isset($_POST["submit"]) ){
            // tangkapn submit
            $submit = $_POST;            
            $submit['nomor_wa'] = PhoneHelper::normalizePhoneNumber($submit['nomor_wa']);

            // tangkap validasi            
            $validation = $this->model($this->modelName)->validation($submit);           

            // persiapkan data untuk dikirimkan ke dalam view
            $data["wa_vall_value"] = $validation["wa_vall"];
            $data["email_vall_value"] = $validation["email_vall"];
            $data["born_vall_value"] = $validation["born_vall"];
            
            // cek validasi
            if( $validation["result"] == true ){
                $this->model($this->modelName)->insert($submit); 
                $_SESSION["user_signed_up"] = $submit["nama_depan"];
                $_SESSION["user_id"] = $submit["id_pengguna"];
                header("Location:" . BASEURL . "signup/profile");
            } elseif ( $validation["result"] == false ) {
                $this->view("signup/index", $data);
            }
        }
        

        $this->view("signup/index", $data);
        $this->view("templates/footer", $data);
    }

    public function uploadProfileController(){
        if( $this->model($this->modelName)->profileImage($_FILES)["result"] == true ){
            var_dump("jalan wak");
        }
    }

    public function profile(){

        $_SESSION["user_signed_up"] = "Komang";
        // var_dump($_SESSION["user_signed_up"]);
        // exit;
        
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["default_pp"] = IMG . "menProfile.jpg";
        $data["wa_vall_value"] = "";
        $data["email_vall_value"] = "";
        $data["born_vall_value"] = "";
       
        
        // kalau user belum signup tendang ke halaman signup/index
        if( !isset($_SESSION["user_signed_up"]) ){
            $data["style"] = CSS . "daftar.css";
            $data["script"] = "";      
            $this->view("templates/header", $data);
            $this->view("signup/index", $data);
            $this->view("templates/footer", $data);
        } else{
            $data["style"] = CSS . "profile.css";
            $data["script"] = JS . "profileScript.js";
            $data["user_name"] = $_SESSION["user_signed_up"];            
            $this->view("templates/header", $data);
            $this->view("signup/profile", $data);
            $this->view("templates/footer", $data);
        }

    }
}