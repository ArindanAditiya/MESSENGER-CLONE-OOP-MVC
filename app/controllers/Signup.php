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
                    $_SESSION["submit_data"] = $submit;
                    $_SESSION["registering_user_name"] = $submit["nama_depan"];
                    header("Location:" . BASEURL . "signup/profile");
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
            $data["default_pp"] = IMG . "menProfile.jpg";
            $data["wa_vall_value"] = "";
            $data["email_vall_value"] = "";
            $data["born_vall_value"] = "";

            // kalau user belum signup tendang ke halaman signup/index
            if( isset($_SESSION["registering_user_name"])){
                $data["style"] = CSS . "profile.css";
                $data["script"] = JS . "profileScript.js";
                $data["registering_user_name"] = $_SESSION["registering_user_name"];
                // persiapkan view
                $this->view("templates/header", $data);
                $this->view("signup/profile", $data);
                $this->view("templates/footer", $data);
            } else{
                header("Location:" . BASEURL . "signup/index");
            }
        }

        public function uploadProfileImg(){
            if ( isset($_FILES) && isset($_SESSION["submit_data"])){
                if( $this->model($this->modelName)->profileImage($_FILES)["result"] == true ){

                    $_SESSION["submit_data"]["foto_profil"] = $this->model($this->modelName)->profileImage($_FILES)["namaFotoBaru"];
                    $this->model($this->modelName)->insert($_SESSION["submit_data"]); 

                    header("Location:" . BASEURL . "messege/blank_chat");
                    session_unset();
                    session_destroy();
                }
            } else {
                header("Location:" . BASEURL . "signup/profile");
            }
        }

    }