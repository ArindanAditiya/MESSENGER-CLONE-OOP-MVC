<?php
class Signup extends Controller{
    
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
            $validation = $this->model("User")->validation($submit);           
            // persiapkan data untuk dikirimkan ke dalam view
            $data["wa_vall_value"] = $validation["wa_vall"];
            $data["email_vall_value"] = $validation["email_vall"];
            $data["born_vall_value"] = $validation["born_vall"];
            // cek validasi
            if( $validation["result"] == true ){
                $this->model("User")->insert($submit); 
                header("Location:" . BASEURL . "messege/blank_chat");
            } elseif ( $validation["result"] == false ) {
                $this->view("signup/index", $data);
            }
        }
        
        $this->view("signup/index", $data);
        $this->view("templates/footer", $data);
    }

    public function profile(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["style"] = CSS . "profile.css";
        $data["script"] = JS . "profile.js";
        $data["default_pp"] = IMG . 
        $this->view("templates/header", $data);
        $this->view("signup/profile", $data);
        $this->view("templates/footer", $data);
    }
}