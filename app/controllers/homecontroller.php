<?php

namespace SHOP\controllers;

use SHOP\core\controller;
use SHOP\core\helper;
use SHOP\models\user;
use SHOP\models\categor;
use SHOP\models\post;
use SHOP\core\session;
use SHOP\models\comment;
use SHOP\models\message;

class homecontroller extends controller
{
    private $user;
    private $cate;
    private $post;
    private $check_session;
    private $meg;
    public function __construct()
    {
        session::start();
        $this->user = new user();
        $this->cate = new categor();
        $this->post = new post();
        $this->com = new comment();
        $this->meg  = new message();
        if (empty($_SESSION)) {
            $this->check_session = 0;
        } else {
            $this->check_session = 1;
        }
    }
    public function index($page = 1)
    {
        $post_per_page = 6;
        if ($page == 1) {
            $page_id = 0;
        } else {
            $page_id = ($page * $post_per_page) - $post_per_page;
        }
        $total_post = $this->post->count_post();
        $total_page = ceil($total_post / $post_per_page);
        $allcategory = $this->cate->getallcategor();
        $most_view_post = $this->post->most_view_post(1);
        $most_posts = $this->post->most_view(3);
        $recent     = $this->post->recent($page_id, $post_per_page);
        // array of count post in one category
        $array_of_count_post = array();
        foreach ($allcategory as $cate) {
            $count = $this->post->count_post_in_category($cate->cat_id);
            array_push($array_of_count_post, $count);
        }
        $title = "Home-TechBarik";
        $this->view("home/index", [
            'title' => $title,
            "allcate" => $allcategory,
            "most_view" => $most_view_post,
            "most_posts" => $most_posts,
            "recent_post" => $recent,
            "count_cate" => $array_of_count_post,
            "total_page" => $total_page,
            "page" => $page,
        ]);
    }
    public function signup()
    {
        $title = "SingUp";
        $this->view("home/signup", ['title' => $title]);
    }
    public function signin()
    {
        $title = "SingIn";
        $this->view("home/signin", ['title' => $title]);
    }
    public function reqister_user()
    {
        $megarr = array();
        $fname = $_POST["fname"];
        $lanme = $_POST["lname"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $pass1 = $_POST["pass1"];
        $checkemail = $this->user->checkemail($email);
        if ($checkemail == 1) {
            $megarr[] = "this email is allready exist";
            $this->view("home/signup", ["error" => $megarr]);
        } else {
            if ($pass != $pass1) {
                $megarr[] = "this password is doesn't match";
                $this->view("home/signup", ["error" => $megarr]);
            } else {
                $this->user->adduser($fname, $lanme, $email, $pass);
                $title = "SingIn";
                $this->view("home/signin", ['title' => $title, 'meg' => "you can signIn now..."]);
            }
        }
    }
    public function login_user()
    {
        $email = $_POST["email"];
        $pass  = $_POST["password"];
        $checkemail = $this->user->checkemail($email);
        if ($checkemail == 1) {
            $check_pass = $this->user->check_password($pass, $email);
            if ($check_pass == 1) {
                $user_info  = $this->user->select_user($email);
                $allname =  $user_info->user_frist . " " . $user_info->user_last;
                $user_id = $user_info->user_id;
                $check_admin = $user_info->user_regist;
                session::set_session("user_id", $user_id);
                session::set_session("user_name", $allname);
                session::set_session("user_admin", $check_admin);
                session::set_session("user_email", $email);
                session::set_session("user_img", $user_info->user_img);
                helper::redirct("home/index");
            } else {
                $title = "SingIn";
                $this->view("home/signin", ["title" => $title, "meg" => "password is not correct sir...?"]);
            }
        } else {
            $title = "SingIn";
            $this->view("home/signin", ["title" => $title, "meg" => "email is not found please,try again sir...?"]);
        }
    }
    public function logout_user()
    {
        session::stop();
        $this->index();
    }

    public function show_cate_post($cat_id, $page = 1)
    {
        $total_post_per_page = 6;
        if ($page == 1) {
            $page_id = 0;
        } else {
            $page_id = ($page * $total_post_per_page) - $total_post_per_page;
        }
        $most_view = $this->post->most_popular_post(1, $cat_id);
        $three_post = $this->post->most_viewed_posts(3, $cat_id);
        $new_post   = $this->post->recent_post_cate($page_id, $total_post_per_page, $cat_id);
        $countpost = $this->post->count_post_in_category($cat_id);
        $total_page = ceil($countpost / $total_post_per_page);
        $title = "category";

        $this->view("home/categor", [
            "title"      => $title,
            "most_view"  => $most_view,
            "new_post"   => $new_post,
            "three_post" => $three_post,
            "page"       => $page,
            "total"      => $total_page,
            "cat_id"     => $cat_id,
        ]);
    }

    public function view_post($post_id)
    {
        $post_info = $this->post->get_all_info_post($post_id);

        $awaiting_response = '';
        if (!empty($_SESSION)) {
            $awaiting_response = $this->com->awaiting_response($_SESSION["user_id"], $post_id);
        }
        $accepted_comment = $this->com->accepted_comment($post_id);
        $this->post->update_view($post_info->post_views, $post_id);
        $title = "Post";
        if (!empty($post_info)) {
            $this->view("home/post", [
                "title" => $title,
                "post_info" => $post_info,
                "check_session" => $this->check_session,
                "comment_awit"  => $awaiting_response,
                "accepted_comment" => $accepted_comment
            ]);
        }
    }

    public function add_comment()
    {
        $date = date("F d, Y h:i A");
        $com_details = $_POST['com_details'];
        $post_id = $_POST["post_id"];
        if (!empty($com_details)) {
            $data = $this->com->add_comment($com_details, $date, $_SESSION["user_id"], $post_id);
            $this->com->add_com_not($_SESSION["user_id"], $data);
            helper::redirct("home/view_post/$post_id");
        } else {

            $post_info = $this->post->get_all_info_post($post_id);
            $awaiting_response = $this->com->awaiting_response($_SESSION["user_id"], $post_id);
            $title = "Post";
            $meg   = "the message can't be empty";
            if (!empty($post_info)) {
                $this->view("home/post", [
                    "title" => $title,
                    "post_info" => $post_info,
                    "check_session" => $this->check_session,
                    "comment_awit"  => $awaiting_response,
                    "meg" => $meg
                ]);
            }
        }
    }

    public function ser_post_in_main_page()
    {
        $ser = $_POST["ser"];
        $title = "search";
        if (!empty($ser)) {
            $search =  $this->post->search_post_in_main($ser);
            $this->view("home/search", [
                "title"      => $title,
                "search"     => $search,
                "wordser"        => $ser,
            ]);
        }
    }

    public function search_post_in_cat($cat_id)
    {
        $ser = $_POST["ser"];
        $title = "search";
        if (!empty($ser)) {
            $search =  $this->post->search_post_in_cate($ser,$cat_id);
            $this->view("home/search", [
                "title"      => $title,
                "search"     => $search,
                "wordser"    => $ser,
            ]);
        }
    }
}
