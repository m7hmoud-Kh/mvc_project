<?php

namespace SHOP\controllers;

use SHOP\models\user;
use SHOP\core\controller;
use SHOP\core\session;
use SHOP\core\helper;
use SHOP\models\message;
use SHOP\models\reply;

class contactcontroller extends controller
{
    private $check_session;
    private $meg;
    private $re;
    public function __construct()
    {
        session::start();
        if (empty($_SESSION)) {
            $this->check_session = 0;
        } else {
            $this->check_session = 1;
        }
        $this->meg = new message();
        $this->re  = new reply();
    }
    public function index()
    {

        $title = "Contact";
        $reply = "";
        if(!empty($_SESSION))
        {
            $reply = $this->re->get_all_reply_member($_SESSION['user_id']);
        }
        $this->view(
            "home/contact",
            [
                "check_seesion" => $this->check_session,
                "title" => $title,
                "reply" => $reply,
            ]
        );
    }
    public function send_message()
    {
        $meg_con = $_POST["meg_con"];
        $date = date("F d, h:i:A");
        if (!empty($meg_con)) {
            $data = $this->meg->add_message($meg_con, $date, $_SESSION["user_id"]);
            $this->meg->add_not_meg($data,$_SESSION["user_id"],0);
            $title = "Contact";
            $meg   = "your message are sended";
            $this->view(
                "home/contact",
                [
                    "check_seesion" => $this->check_session,
                    "title" => $title,
                    "meg"   => $meg,
                ]
            );
            helper::redirct("contact/index");
        }
    }
}
