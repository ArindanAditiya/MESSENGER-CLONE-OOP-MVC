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
        $this->view("templates/header", $data);
        $this->view("signup/index", $data);
        $this->view("templates/footer", $data);
    }

    public function process(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["style"] = CSS . "daftar.css";
        $data["script"] = "";
        // kasih header
        $this->view("templates/header", $data);
        
        // tangkap submit
        $submit = $_POST;

        // tangkap validasi
        $validation = $this->model("User")->validation($submit);
        
        // persiapkan data untuk dikirimkan ke dalam view
        $data["wa_vall_value"] = $validation["wa_vall"];
        $data["email_vall_value"] = $validation["email_vall"];
        $data["born_vall_value"] = $validation["born_vall"];

        // cek validasi
        if( $validation["result"] == true ){
            $this->model("User")->insert($_POST); 
            $this->view("signup/index", $data);
            header("Location:" . BASEURL . "messege/blank_chat");
        } elseif ( $validation["result"] == false ) {
            $this->view("signup/index", $data);
        }

        // siapkan penutup
        $this->view("templates/footer", $data);
    }
}