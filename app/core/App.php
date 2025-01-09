<?php 

class App{
    protected $controller = "Messege";
    protected $method = "index";
    protected $params = [];

    public function __construct(){
        

        $url = $this->parseURL();

        // cek apakah kontroller dr url ada?
        if(isset($url[0])){
            $this->controller = $url[0];
            if ( file_exists('../app/controllers/' . $url[0] . 'php')){
                unset($url[0]);
            } 
        } 

        // panggil controllernyard
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // method
        if ( isset($url[1]) ){
            if( method_exists( $this->controller, $url[1] ) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        // params
        if( !empty($url)){       
            if(isset($url[2])){ $this->params[0] = $url[2];} 
            else{ $this->params[0] = "<i>messege : params 1 kosong</i>"; } // <- pesan kala params 1 kosong

            if(isset($url[3])){ $this->params[1] = $url[3]; }
            else{ $this->params[2] = "<i>messege : params 2 kosong</i>"; } // <- pesan kala params 2 kosong   
        } 

        // jalankan controller & me*0thod, serta kirimlkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if ( isset($_GET["url"]) ){
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}