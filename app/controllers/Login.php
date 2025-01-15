<?php

class Login extends Controller{
    public function index(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "Login";
        $data["style"] = CSS . "masuk.css";
        $data["script"] = "";
        $this->view("templates/header", $data);
        $this->view("login/index");
        $this->view("templates/footer", $data);
    }

    public function loginotp(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "OTP - Login";
        $data["style"] = CSS . "otp.css";
        $data["script"] = "";
        $this->view("templates/header", $data);
        $this->view("login/loginotp");
        $this->view("templates/footer", $data);
    }
}