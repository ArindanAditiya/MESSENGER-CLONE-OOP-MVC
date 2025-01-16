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
            // var_dump($submit);
            // exit;           
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
                exit;
                $data["registering_user_name"] = $submit["nama_depan"];
                $data["registering_user_id"] = "";
                // var_dump("debugging session" . $_SESSION);
                header("Location:" . BASEURL . "signup/profile");
            } elseif ( $validation["result"] == false ) {
                $this->view("signup/index", $data);
            }
        }
        

        $this->view("signup/index", $data);
        $this->view("templates/footer", $data);
    }
    public function uploadProfileImg(){
        if ( isset($_FILES) ){
            if( $this->model($this->modelName)->profileImage($_FILES)["result"] == true ){
                var_dump("jalan wak");
            }
        } else {
            header("Location:" . BASEURL . "signup/profile");
        }
        
    }

    public function profile(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["default_pp"] = IMG . "menProfile.jpg";
        $data["wa_vall_value"] = "";
        $data["email_vall_value"] = "";
        $data["born_vall_value"] = "";
        
        // kalau user belum signup tendang ke halaman signup/index
        if( isset($_SESSION["registering_user_name"]) &&  isset($_SESSION["registering_user_id"])){
            $data["style"] = CSS . "profile.css";
            $data["script"] = JS . "profileScript.js";
            $data["registering_user_name"] = $_SESSION["registering_user_name"];
            $data["registering_user_id"] = $_SESSION["registering_user_id"];  
            // persiapkan view
            $this->view("templates/header", $data);
            $this->view("signup/profile", $data);
            $this->view("templates/footer", $data);
        } else{
            header("Location:" . BASEURL . "signup/index");
        }

    }
}