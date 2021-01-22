<?php

namespace SHOP\controllers;

use SHOP\core\controller;
use SHOP\core\helper;
use SHOP\models\user;
use SHOP\models\categor;
use SHOP\core\session;
use SHOP\models\post;
use SHOP\models\comment;
use SHOP\models\message;
use SHOP\models\reply;

class backendcontroller extends controller
{
    private $cat;
    private $post;
    private $user;
    private $com;
    private $meg;
    private $re;
    public function __construct()
    {
        session::start();
        $this->cat  = new categor();
        $this->post = new post();
        $this->user = new user();
        $this->com  = new comment();
        $this->meg  = new message();
        $this->re   = new reply();
        if ($_SESSION["user_admin"] != 1) {
            helper::redirct("home/index");
        }
    }
    public function index()
    {
        $count_of_gategory = $this->cat->count_category();
        $count_of_post     = $this->post->count_post();
        $popular_post      = $this->post->popular_post();
        $count_all_user    = $this->user->count_all_user();
        $count_all_comment = $this->com->count_all_comment();
        $title = "Dashbord";
        $this->get_all_message_not();
        $this->view(
            "backend/index",
            [
                "title" => $title,
                "count_of_gategory" => $count_of_gategory,
                "count_of_post"     => $count_of_post,
                "popular_post"      => $popular_post,
                "count_all_user"    => $count_all_user,
                "count_all_comment" => $count_all_comment,
            ]
        );
    }
    public function allcategories()
    {
        $array_of_count = array();
        $total_view = array();
        $allcat_info = $this->cat->getallcategor_backend();
        foreach ($allcat_info as $cat) {
            $count_of_post = $this->post->count_post_in_category($cat->cat_id);
            array_push($array_of_count, $count_of_post);

            $total_view_cate = $this->post->total_view_cate($cat->cat_id);
            array_push($total_view, $total_view_cate->total_view);
        }
        $title = "Category";
        $this->get_all_message_not();
        $this->view(
            "backend/category",
            [
                "title" => $title,
                "allcat_info" => $allcat_info,
                "array_of_count" => $array_of_count,
                "total_view" => $total_view,
            ]
        );
    }
    public function add_category()
    {
        $title = "Add Category";
        $this->get_all_message_not();
        $this->view("backend/addcategory", ["title" => $title]);
    }
    public function post_add_category()
    {
        $megerr = array();
        $cat_name = $_POST["cat_name"];
        $cat_status = $_POST["cat_status"];
        if (strlen($cat_name) < 5) {
            $megerr[] = "the name of category is less than 5 char";
        } else {
            $check_cat = $this->cat->check_category($cat_name);
            if ($check_cat == 1) {
                $megerr[] = "the name of category is allready exist try a new name";
            } else {
                $this->cat->add_new_category($cat_name, $cat_status, $_SESSION["user_id"]);
                helper::redirct("backend/allcategories");
            }
        }
        if (!empty($megerr)) {
            $title = "Add Category";
            $this->view("backend/addcategory", ["title" => $title, "megerr" => $megerr]);
        }
    }
    public function editcategory($id)
    {
        $title = "Update Category";
        $all_info_cat = $this->cat->select_cat($id);
        $this->view("backend/editcategory", ["title" => $title, "all_info_cat" => $all_info_cat]);
    }
    public function post_edit_category()
    {
        $megerr = array();
        $cat_name = $_POST["cat_name"];
        $cat_status = $_POST["cat_status"];
        $cat_id = $_POST["cat_id"];
        if (strlen($cat_name) < 5) {
            $megerr[] = "the name of category is less than 5 char";
        } else {
            $check_cat = $this->cat->check_category_update($cat_name, $cat_id);
            if ($check_cat == 1) {
                $megerr[] = "the name of category is allready exist try a new name";
            } else {
                $this->cat->update_category($cat_name, $cat_status, $cat_id);
                helper::redirct("backend/allcategories");
            }
        }
        if (!empty($megerr)) {
            $title = "Update Category";
            $all_info_cat = $this->cat->select_cat($cat_id);
            $this->view("backend/editcategory", ["title" => $title, "all_info_cat" => $all_info_cat, "megerr" => $megerr]);
        }
    }
    public function delete_category($id)
    {
        $detel_cate = $this->cat->delete_category($id);
        if ($detel_cate) {
            helper::redirct("backend/allcategories");
        }
    }

    public function all_post()
    {
        $title = "All posts";
        $get_all_post = $this->post->get_all_post();
        $this->get_all_message_not();
        $this->view("backend/allpost", ["title" => $title, "allpost" => $get_all_post]);
    }
    public function new_post()
    {
        $allnameofcategor = $this->cat->get_name_of_cat();
        $title = "new post";
        $this->get_all_message_not();
        $this->view("backend/addnewpost", ["title" => $title, "allcat" => $allnameofcategor]);
    }
    public function post_new_post()
    {
        $formerr = array();

        // image 
        $fname = $_FILES["image"]["name"];
        $ftemp = $_FILES["image"]["tmp_name"];
        $fsize = $_FILES["image"]["size"];
        // all info about form
        $post_title = $_POST["post_title"];
        $post_status = $_POST["post_status"];
        $post_details = $_POST["post_details"];
        $post_tag = $_POST["post_tag"];
        $cat_id = $_POST["cat_id"];

        // format the now date
        $post_date = date("d M Y");

        $allwoded_extions = array("jpg", "png", "jpeg");
        $extion = explode(".", $fname);
        $extion = end($extion);
        $extion = strtolower($extion);

        if (empty($fname)) {
            $formerr[] = "you must upload image";
        }
        if (!empty($fname)) {
            if (!in_array($extion, $allwoded_extions)) {
                $formerr[] = "this file is not alloweded sir...!";
            }
            if ($fsize > 32000000) {
                $formerr[] = "this file is larger than 4MB";
            }
        }
        if (empty($formerr)) {
            $image_post = rand(1, 1000) . "_" . $fname;
            $path = "C:\\xampp\\htdocs\\testmvc\\public\\backend\\img_upload\\";

            $check_post = $this->post->check_name_of_post($post_title);
            if ($check_post) {
                $formerr[] = "this name is allready exist try another name sir...!?";
            } else {
                move_uploaded_file($ftemp, $path . $image_post);
                $add_post = $this->post->add_post($post_title, $post_details, $post_tag, $post_status, $image_post, $cat_id, $_SESSION["user_id"], $post_date);
                if ($add_post) {
                    helper::redirct("backend/all_post");
                }
            }
        }
        if (!empty($formerr)) {

            $allnameofcategor = $this->cat->get_name_of_cat();
            $title = "new post";
            $this->view("backend/addnewpost", ["title" => $title, "allcat" => $allnameofcategor, "formerr" => $formerr]);
        }
    }
    public function delete_post($id)
    {
        $delete_post = $this->post->delete_post($id);
        if ($delete_post) {
            helper::redirct("backend/all_post");
        }
    }
    public function edit_post($id)
    {
        $get_post = $this->post->get_post_byid($id);
        $title = "Edit Post";
        $get_all_category = $this->cat->get_name_of_cat();
        $this->get_all_message_not();
        $this->view("backend/editpost", ["title" => $title, "post" => $get_post, "allcat" => $get_all_category]);
    }

    public function post_edit_post()
    {
        $formerr = array();
        // all info about update post
        $post_title = $_POST["post_title"];
        $post_status = $_POST["post_status"];
        $cat_id = $_POST["cat_id"];
        $post_details = $_POST["post_details"];
        $post_tag = $_POST["post_tag"];
        $post_id = $_POST["post_id"];
        $post_image = $_POST["post_image"];

        // all info about upload a new image
        $fname = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $fsize = $_FILES["image"]["size"];

        $allowextion = array("jpg", "png", "jpeg");
        $extion = explode(".", $fname);
        $extion = end($extion);
        $extion = strtolower($extion);

        if (!empty($fname)) {
            if (!in_array($extion, $allowextion)) {
                $formerr[] = "this file is not upload ";
            } else {
                if ($fsize > 32000000) {
                    $formerr[] = "this image is greater than 4MB";
                }
            }
        }
        if (empty($formerr)) {
            if (!empty($fname)) {
                $check_name = $this->post->check_post_update($post_title, $post_id);
                if ($check_name) {
                    $formerr[] = "this name is allready exist try another name sir...?!";
                } else {
                    $new_image_upload = rand(0, 1000) . "_" . $fname;
                    $path = "C:\\xampp\\htdocs\\testmvc\\public\\backend\\img_upload\\";
                    move_uploaded_file($tmp_name, $path . $new_image_upload);
                    $update_post = $this->post->update_post($post_title, $post_status, $cat_id, $post_details, $post_tag, $new_image_upload, $post_id);
                    if ($update_post) {
                        helper::redirct("backend/all_post");
                    }
                }
            } else {
                $check_name = $this->post->check_post_update($post_title, $post_id);
                if ($check_name) {
                    $formerr[] = "this name is allready exist try another name sir...?!";
                } else {
                    $update_post = $this->post->update_post($post_title, $post_status, $cat_id, $post_details, $post_tag, $post_image, $post_id);
                    if ($update_post) {
                        helper::redirct("backend/all_post");
                    }
                }
            }
        }
    }

    public function all_user()
    {
        $alluser = $this->user->getalluser();
        $title = "Add User";
        $this->get_all_message_not();
        $this->view("backend/alluser", ["title" => $title, "alluser" => $alluser]);
    }
    public function edituser($id)
    {
        $user_info = $this->user->getuserbyid($id);
        $title = "Edit User";
        $this->get_all_message_not();
        $this->view("backend/edituser", ["title" => $title, "user_info" => $user_info]);
    }
    public function post_edituser()
    {
        //array of error message
        $formerr = array();

        //all info about edit user
        $user_frist = $_POST["user_frist"];
        $user_last  = $_POST["user_last"];
        $role = $_POST["role"];
        $user_id = $_POST["user_id"];
        $old_img = $_POST["old_img"];


        // all info about img user upload
        $fname = $_FILES["user_img"]["name"];
        $ftemp = $_FILES["user_img"]["tmp_name"];
        $fsize = $_FILES["user_img"]["size"];

        //allow extions uploads
        $allowextion = array("jpg", "png", "jpeg");
        $extion = explode(".", $fname);
        $extion = end($extion);
        $extion = strtolower($extion);

        if (empty($user_frist)) {
            $formerr[] = "the frist name musn't be empty";
        }
        if (empty($user_last)) {
            $formerr[] = "the last name musn't be empty";
        }
        if (!empty($fname)) {
            if (!in_array($extion, $allowextion)) {
                $formerr[] = "the file is not allow to upload";
            } else {
                if ($fsize > 32000000) {
                    $formerr[] = "the img is greater than 4MB";
                }
            }
        }

        if (empty($formerr)) {
            if (empty($fname)) {
                if ($old_img == 0) {
                    $this->user->update_user_not_img($user_frist, $user_last, $role, $user_id);
                    helper::redirct("backend/all_user");
                } else {
                    $this->user->update_user($user_frist, $user_last, $old_img, $role, $user_id);
                    helper::redirct("backend/all_user");
                }
            } else {

                $new_image = rand(0, 1000) . "_" . $fname;
                $path = "C:\\xampp\htdocs\\testmvc\\public\\backend\\img_upload\\";
                move_uploaded_file($ftemp, $path . $new_image);
                $this->user->update_user($user_frist, $user_last, $new_image, $role, $user_id);
                helper::redirct("backend/all_user");
            }
        } else {
            helper::redirct("backend/edituser/$user_id");
        }
    }
    public function add_user()
    {
        $title = "Add User";
        $this->view("backend/adduser", ["title" => $title]);
    }
    public function post_add_user()
    {
        //arrary of error message 
        $formerr = array();
        // all info about adding user 
        $user_frist   = $_POST['user_frist'];
        $user_last    = $_POST["user_last"];
        $user_email   = $_POST["user_email"];
        $user_pass    = $_POST["user_pass"];
        $user_pass_con = $_POST["user_pass_con"];
        $user_role    = $_POST["user_role"];
        $user_date_on = date("d M Y");
        // all info about img upload
        $fname = $_FILES["user_image"]["name"];
        $ftmp  = $_FILES["user_image"]["tmp_name"];
        $fsize = $_FILES["user_image"]["size"];
        // extions that has insert only
        $allowextion = array("jpg", "jpeg", "png");
        $extion = explode(".", $fname);
        $extion = end($extion);
        $extion = strtolower($extion);

        if (empty($user_frist) || empty($user_last)) {
            $formerr[] = "the name mustn't be empty";
        } else {
            if (empty($user_email)) {
                $formerr[] = "the email mustn't be empty";
            } else {
                $check_email = $this->user->checkemail($user_email);
                if ($check_email) {
                    $formerr[] = "the email is allready exist try another email sir...!";
                } else {
                    if ($user_pass != $user_pass_con) {
                        $formerr[] = "the password is doesn't match ...?!";
                    } else {
                        if (!empty($fname)) {
                            if (!in_array($extion, $allowextion)) {
                                $formerr[] = "this file is not allow to upload";
                            } else {
                                if ($fsize > 32000000) {
                                    $formerr[] = "this image is greter than 4MB";
                                }
                            }
                        }
                    }
                }
            }
        }
        if (empty($formerr)) {
            if (!empty($fname)) {
                $new_image_upload = rand(0, 1000) . "_" . $fname;
                $path = "C:\\xampp\\htdocs\\testmvc\\public\\backend\\img_upload\\";
                move_uploaded_file($ftmp, $path . $new_image_upload);
                $this->user->admin_add_user($user_frist, $user_last, $user_email, $user_pass, $new_image_upload, $user_role, $user_date_on);
            } else {
                $this->user->admin_add_user($user_frist, $user_last, $user_email, $user_pass, "0", $user_role, $user_date_on);
            }
            helper::redirct("backend/all_user");
        }
        if (!empty($formerr)) {
            helper::redirct("backend/add_user");
        }
    }

    public function delteuser($id)
    {
        $delete_user = $this->user->delete_userbyadmin($id);
        if ($delete_user) {
            helper::redirct("backend/all_user");
        }
    }
    public function show_comment()
    {
        $allcom = $this->com->getall_com();
        $title = "Comments";
        $this->com->update_com_not();
        $this->get_all_message_not();
        $this->view("backend/comments", ["title" => $title, "allcom" => $allcom]);
    }
    public function approved($com_id)
    {
        $this->com->update_approve(1, $com_id);
        helper::redirct("backend/show_comment");
    }
    public function decline($com_id)
    {
        $this->com->update_decline(0, $com_id);
        helper::redirct("backend/show_comment");
    }
    public function delete($com_id)
    {
        $this->com->delete_com($com_id);
        helper::redirct("backend/show_comment");
    }
    public function show_message()
    {
        //array of count_reply_meg
        $count_reply_meg = array();
        $allmeg = $this->meg->show_message();
        foreach ($allmeg as $meg) {
            $count = $this->re->check_reply_meg($meg->meg_id);
            array_push($count_reply_meg, $count);
        }
        $title = "Messages";
        $this->get_all_message_not();
        $this->view("backend/message", ['title' => $title, "allmeg" => $allmeg, "check_reply" => $count_reply_meg]);
    }

    public function reply_on_message($id)
    {
        $data = $this->meg->reply_on_meg($id);
        $title = "Reply";
        $this->get_all_message_not();
        $this->view("backend/reply", ["title" => $title, "meg_info" => $data]);
    }
    public function post_reply()
    {
        //array of meg error
        $formerr = array();
        $reply_meg = $_POST["reply_meg"];
        $meg_id = $_POST["meg_id"];
        $re_date = date("d F Y h:i:s A");

        if (empty($reply_meg)) {
            $formerr[] = "this meg can't be empty";
        }
        if (empty($formerr)) {
            $add_reply = $this->re->add_reply($reply_meg, $meg_id, $_SESSION["user_id"], $re_date);
            $this->meg->update_status_not($meg_id);
            if ($add_reply) {
                helper::redirct("backend/show_message");
            }
        } else {
            helper::redirct("backend/reply_on_message/$meg_id");
        }
    }
    public function check_message($id)
    {
        $this->meg->check_message(1, $id);
        helper::redirct("backend/show_message");
    }
    public function check_message_decline($id)
    {
        $this->meg->check_message(0, $id);
        helper::redirct("backend/show_message");
    }
    public function check_message_delete($id)
    {
        $this->meg->delete_message($id);
        helper::redirct("backend/show_message");
    }

    public function editprofile()
    {
        $user_info = $this->user->getuserbyid($_SESSION["user_id"]);
        $title = "Profile";
        $this->get_all_message_not();
        $this->view("backend/profile", ["title" => $title, "user_info" => $user_info]);
    }

    public function post_profile()
    {
        //array of error message 
        $formerr = array();
        // all info about admin
        $user_frist = $_POST["user_frist"];
        $user_last  = $_POST["user_last"];
        $cur_pass   = $_POST["cur_pass"];
        $new_pass   = $_POST["new_pass"];
        // all info about image
        $fname = $_FILES["user_image"]["name"];
        $ftmp  = $_FILES["user_image"]["tmp_name"];
        $fsize = $_FILES["user_image"]["size"];

        $allowextion = array("jpg", "jpeg", "png");
        $extion = explode(".", $fname);
        $extion = end($extion);
        $extion = strtolower($extion);


        if (empty($user_frist) && empty($user_last)) {
            $formerr[] = "name mustn't be empty";
        }

        if (empty($formerr)) {
            if (empty($fname) && empty($cur_pass)) {
                $this->user->update_user_name($user_frist, $user_last, $_SESSION["user_id"]);
                helper::redirct("backend/editprofile");
            }
            if (!empty($fname)) {
                if (!in_array($extion, $allowextion)) {
                    $formerr[] = "this file is not alloweded sir...!";
                } else {
                    if ($fsize > 32000000) {
                        $formerr[] = "this file is larger than 4MB";
                    } else {
                        $image_user = rand(1, 1000) . "_" . $fname;
                        $path = "C:\\xampp\\htdocs\\testmvc\\public\\backend\\img_upload\\";
                        move_uploaded_file($ftmp, $path . $image_user);
                        $this->user->update_user_img($user_frist, $user_last, $image_user, $_SESSION["user_id"]);
                        helper::redirct("backend/editprofile");
                    }
                }
            }
            if (!empty($cur_pass) && !empty($new_pass)) {
                $check_pass = $this->user->check_pass($cur_pass, $_SESSION["user_id"]);
                if ($check_pass) {
                    $this->user->update_user_pass($user_frist, $user_last, $new_pass, $_SESSION["user_id"]);
                    helper::redirct("backend/editprofile");
                } else {
                    $formerr[] = "this password is dosn't match";
                }
            } else {
                $formerr[]  = "please enter the new password and cuurent password";
                $user_info = $this->user->getuserbyid($_SESSION["user_id"]);
                $title = "Profile";
                $this->view("backend/profile", ["title" => $title, "user_info" => $user_info, "formerr" => $formerr]);
            }
        }

        if (!empty($formerr)) {
            $user_info = $this->user->getuserbyid($_SESSION["user_id"]);
            $title = "Profile";
            $this->view("backend/profile", ["title" => $title, "user_info" => $user_info, "formerr" => $formerr]);
        }
    }

    public function logout_dash()
    {
        session::stop();
        helper::redirct("home/index");
    }
    public function get_all_message_not()
    {
        $data = $this->meg->get_all_meg_not();
        $count_message_not = $this->meg->count_new_not();
        $all_com = $this->com->get_all_com_not();
        $count_com  = $this->com->count_com();
        $get_all_info_user = $this->user->getuserbyid($_SESSION["user_id"]);
        $this->view("backend/navbar", [
            "meg_not" => $data,
            "count_meg" => $count_message_not,
            "all_com" =>   $all_com,
            "count_com" => $count_com,
            "user_info" => $get_all_info_user
        ]);
    }
}
