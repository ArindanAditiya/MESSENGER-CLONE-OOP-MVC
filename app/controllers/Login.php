<?php
class Login extends Controller{
    protected $modelName = "User";

    public function index(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "Login";
        $data["style"] = CSS . "masuk.css";
        $data["script"] = "";
        $data["login_faild_messege"] = "";
        $this->view("templates/header", $data);

        // loginSubmit
        if (isset($_POST["login"])){
            $submit = $_POST;
            $cekLoginResult = $this->model($this->modelName)->cekLogin($submit)["result"];
            if( $cekLoginResult == true ){
                $whatsappLogin =  $this->model($this->modelName)->cekLogin($submit)["whatsapp"];
                $_SESSION["send_wa"] = $whatsappLogin;
                var_dump($whatsappLogin);
                WhatsappHelper::kirim_wa_otp($whatsappLogin);
                // header("Location:". BASEURL ."messege/blank_chat");
            }else{
                $data["login_faild_messege"] = "kesalahan username/password";
            }

        }
        $this->view("login/index", $data);
        $this->view("templates/footer", $data);      
    }

    public function sendOtp(){
        if( isset($_SESSION["send_wa"]) ){
            $data["title_icon"] = IMG . "icon.ico";
            $data["title"] = "OTP - Login";
            $data["style"] = CSS . "otp.css";
            $data["script"] = JS . "otpLogin_ui.js";
            $this->view("templates/header", $data);
            $this->view("login/loginotp");
            $this->view("templates/footer", $data);
        } else {
            header("Location: index");
        }
    }

    // protected function sendNewOTP(){
    //     $_SESSION
    //     return WhatsappHelper::kirim_wa_otp($wa);
    // }
}