<?php

namespace SHOP\models;

use SHOP\core\model;

class categor extends model
{
    public function getallcategor()
    {
        $data = model::db()->rows("SELECT * FROM categor ORDER BY cat_id DESC");
        return $data;
    }
    public function count_category()
    {
        $data  = model::db()->count("SELECT * FROM  categor");
        return $data;
    }
    public function getallcategor_backend()
    {
        $data = model::db()->rows("SELECT categor.*,user.user_id,user.user_frist,user.user_last FROM categor JOIN user ON user.user_id = categor.cat_user");
        return $data;
    }
    public function add_new_category($cat_name, $cat_status, $cat_user)
    {
        $data = model::db()->insert("categor", [
            "cat_name" => $cat_name,
            "cat_status" => $cat_status,
            "cat_user" => $cat_user
        ]);
        return $data;
    }
    public function check_category($cat_name)
    {
        $data = model::db()->count("SELECT cat_name FROM categor WHERE cat_name = ?", [$cat_name]);
        return $data;
    }
    public function select_cat($cat_id)
    {
        $data = model::db()->row("SELECT * FROM categor WHERE cat_id = ?", [$cat_id]);
        return $data;
    }

    public function update_category($cat_name, $cat_status, $cat_id)
    {
        $data = model::db()->update("categor", ["cat_name" => $cat_name, "cat_status" => $cat_status], ["cat_id" => $cat_id]);
        return $data;
    }
    public function check_category_update($cat_name, $cat_id)
    {
        $data  = model::db()->count("SELECT cat_name FROM categor WHERE cat_name = ?  AND cat_id != ?", [$cat_name, $cat_id]);
        return $data;
    }
    public function delete_category($cat_id)
    {
        $data = model::db()->delete("categor", ["cat_id" => $cat_id]);
        return $data;
    }
    public function get_name_of_cat()
    {
        $data = model::db()->rows("SELECT * FROM categor");
        return $data;
    }
}
