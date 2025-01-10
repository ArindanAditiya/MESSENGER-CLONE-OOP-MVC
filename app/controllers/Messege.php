<?php

class Messege extends Controller{
    public function blank_chat(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "Chat";
        $data["style"] = CSS . "messege.css";
        $data["script"] = JS . "messege_ui.js";
        $this->view("templates/header", $data);
        $this->view("messege/index");
        $this->view("templates/footer", $data);
    }

    public function private_chat(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "🔴 Nayla Dwi - Messenger";
        $data["style"] = CSS . "messege.css";
        $data["script"] = JS . "messege_ui.js";
        $this->view("templates/header", $data);
        $this->view("messege/index");
        $this->view("templates/footer", $data);
    }

    public function group_chat(){
        $data["title_icon"] = IMG . "icon.ico";
        $data["title"] = "🔴 Kumpul Baraya - Messenger";
        $data["style"] = CSS . "messege.css";
        $data["script"] = JS . "messege_ui.js";
        $this->view("templates/header", $data);
        $this->view("messege/index");
        $this->view("templates/footer", $data);
    }
}