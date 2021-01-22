<?php

namespace SHOP\models;

use SHOP\core\model;

class user extends model
{

    public function getalluser()
    {
        $data = model::db()->rows("SELECT * FROM user");
        return $data;
    }
    public function checkemail($user_email)
    {
        $data = model::db()->count("SELECT user_email FROM user WHERE user_email = ?", ["$user_email"]);
        return $data;
    }
    public function adduser($user_frist, $user_last, $user_email, $user_pass)
    {
        $date_on = date("d M Y");
        $data = model::db()->insert(
            "user",
            [
                "user_frist" => $user_frist,
                "user_last" => $user_last,
                "user_email" => $user_email,
                "user_pass" => $user_pass,
                "user_img" => 0,
                "user_regist" => 0,
                "user_date_on" => $date_on,
            ]
        );

        return $data;
    }
    public function check_password($user_pass, $user_email)
    {
        $data = model::db()->count("SELECT * FROM user WHERE user_pass = ? AND user_email = ?", [$user_pass, $user_email]);
        return $data;
    }
    public function select_user($user_email)
    {
        $data = model::db()->row("SELECT * FROM user WHERE user_email = ?", [$user_email]);
        return $data;
    }
    public function getuserbyid($user_id)
    {
        $data = model::db()->row("SELECT * FROM user WHERE `user_id` = ?", [$user_id]);
        return $data;
    }
    public function update_user($user_frist, $user_last, $user_img, $user_regist, $user_id)
    {
        $data = model::db()->update("user", [
            "user_frist" => $user_frist,
            "user_last" => $user_last,
            "user_img" => $user_img,
            "user_regist" => $user_regist
        ], [
            "user_id" => $user_id
        ]);
        return $data;
    }
    public function update_user_not_img($user_frist, $user_last, $user_regist, $user_id)
    {
        $data = model::db()->update(
            "user",
            [
                "user_frist" => $user_frist,
                "user_last" => $user_last,
                "user_regist" => $user_regist
            ],
            ["user_id" => $user_id]
        );
        return $data;
    }
    public function admin_add_user($user_frist, $user_last, $user_email, $user_pass, $user_img, $user_regist, $user_date_on)
    {
        $data = model::db()->insert("user", [
            "user_frist" => $user_frist,
            "user_last" => $user_last,
            "user_email" => $user_email,
            "user_pass" => $user_pass,
            "user_img" => $user_img,
            "user_regist" => $user_regist,
            "user_date_on" => $user_date_on
        ]);
        return $data;
    }

    public function delete_userbyadmin($user_id)
    {
        $data = model::db()->delete("user",["user_id"=>$user_id]);
        return $data;
    }

    public function count_all_user()
    {
        $data = model::db()->count("SELECT * FROM user");
        return $data;
    }

    public function update_user_name($user_frist,$user_last,$id)
    {
        $data = model::db()->update("user",["user_frist"=>$user_frist,"user_last"=>$user_last],["user_id"=>$id]);
        return $data;
    }

    public function update_user_img($user_frist,$user_last,$user_img,$id)
    {
        $data = model::db()->update("user",["user_frist"=>$user_frist,"user_last"=>$user_last,"user_img"=>$user_img],["user_id"=>$id]);
        return $data;
    }

    public function update_user_pass($user_frist,$user_last,$user_pass,$id)
    {
        $data = model::db()->update("user",["user_frist"=>$user_frist,"user_last"=>$user_last,"user_pass"=>$user_pass],["user_id"=>$id]);
        return $data;
    }

    public function check_pass($user_pass,$user_id)
    {
        $data = model::db()->count("SELECT * FROM user WHERE user_pass = ? AND `user_id` = ?",[$user_pass,$user_id]);
        return $data;
    }

}
