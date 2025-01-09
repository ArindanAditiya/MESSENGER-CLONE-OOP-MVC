<?php

class Signup extends Controller{
    public function index(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "SignUp";
        $data["style"] = CSS . "daftar.css";
        $data["script"] = "";
        $this->view("templates/header", $data);
        $this->view("signup/index");
        $this->view("templates/footer", $data);
    }

    public function signup(){
        if( $this->model("User")->signup($_POST) > 0 ){
            echo "berhasil daftar";
        } else {
            echo "gagal daftar";
        }
    }
}
