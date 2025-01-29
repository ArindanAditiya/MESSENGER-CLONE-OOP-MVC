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
            $cekLogin = $this->model($this->modelName)->cekLogin($submit);

            if( $cekLogin["result"] == true ){
                $id = $cekLogin["id"];
                $whatsappLogin = $cekLogin["whatsapp"];
                $_SESSION["id"] = $id;
                $_SESSION["send_wa"] = $whatsappLogin;
                $_SESSION["otp"] = WhatsappHelper::kirim_wa_otp($whatsappLogin);
                header("Location:". BASEURL ."login/sendotp");
            }else{
                $data["login_faild_messege"] = "kesalahan username/password";
            }

        }
        $this->view("login/index", $data);
        }

    public function sendOtp(){
        $submit = $_POST;
        // $token = CookieHelper::generateRandomToken();
        // $id = $this->model($this->modelName)->cekLogin();

       //debugging_____
       echo "id :" . $_SESSION["id"] ;
       echo "<br/>";
        echo "whatsapp :" . $_SESSION["send_wa"];
        echo "<br/>";
        echo "otp dikirim :" . $_SESSION["otp"];
        echo "<br/>";
        if (isset($submit["otpSubmit"])) {
            echo "otp input :" . $submit["otpInp"];
        }
        // var_dump($submit);
        
        //________
        
        if( isset($_SESSION["send_wa"]) ){
            $data["title_icon"] = IMG . "icon.ico";
            $data["title"] = "OTP - Login";
            $data["style"] = CSS . "otp.css";
            $data["script"] = JS . "otpLogin_ui.js";
            $data["whatsapp_send"] = $_SESSION["send_wa"];

            $this->view("templates/header", $data);
            $this->view("login/loginotp", $data);
            $this->view("templates/footer", $data);
        } else {
            header("Location: index");
        }

        if (isset($submit["otpSubmit"])) {
            if( $_SESSION["otp"] == $submit["otpInp"] ){
                // echo "jalan cuk";
                $this->model($this->modelName)->setCookieToken($_SESSION["id"]); 
                header("Location:". BASEURL . "messege/blank_chat");
                session_unset();
                session_destroy();
            }
        }
    }

    public function sendNewOtp(){
        if (isset($_SESSION["send_wa"])){
            $_SESSION["otp"] = WhatsappHelper::kirim_wa_otp($_SESSION["send_wa"]);
            header("Location:". BASEURL ."login/sendotp");
        } else {
            header("Location:". BASEURL ."login/sendotp");
        }
    }
}