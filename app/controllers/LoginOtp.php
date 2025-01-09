<?php

class LoginOtp extends Controller{
    public function index(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "OTP - Login";
        $data["style"] = CSS . "otp.css";
        $data["script"] = "";
        $this->view("templates/header", $data);
        $this->view("loginOtp/index");
        $this->view("templates/footer", $data);
    }
}