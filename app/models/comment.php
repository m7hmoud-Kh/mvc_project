<?php

namespace SHOP\models;

use SHOP\core\model;

class comment extends model
{
    public function getall_com()
    {
        $data = model::db()->rows("SELECT comment.*,user.user_id,user.user_frist,user.user_last,user.user_email,posts.post_id,posts.post_title FROM comment JOIN user ON comment.user_id = user.user_id JOIN posts ON comment.post_id = posts.post_id ORDER BY comment.com_id DESC");
        return $data;
    }

    public function update_approve($com_status, $com_id)
    {
        $data = model::db()->update("comment", ["com_status" => $com_status], ["com_id" => $com_id]);
        return $data;
    }
    public function update_decline($com_status, $com_id)
    {
        $data = model::db()->update("comment", ["com_status" => $com_status], ["com_id" => $com_id]);
        return $data;
    }

    public function delete_com($com_id)
    {
        $data = model::db()->delete("comment", ["com_id" => $com_id]);
        return $data;
    }

    public function count_all_comment()
    {
        $data = model::db()->count("SELECT * FROM comment");
        return $data;
    }
    public function awaiting_response($user_id, $post_id)
    {
        $data = model::db()->rows("SELECT comment.* , user.* FROM comment JOIN user ON comment.user_id = user.user_id WHERE user.user_id = ? AND comment.post_id = ? AND comment.com_status = 0", [$user_id, $post_id]);
        return $data;
    }

    public function accepted_comment($post_id)
    {
        $data = model::db()->rows("SELECT comment.* , user.* FROM comment JOIN user ON comment.user_id = user.user_id WHERE comment.post_id = ? AND comment.com_status = 1", [$post_id]);
        return $data;
    }

    public function add_comment($com_details, $com_date, $user_id, $post_id)
    {
        $data = model::db()->insert("comment", [
            "com_details" => $com_details,
            "com_date" => $com_date,
            "com_status" => 0,
            "user_id" => $user_id,
            "post_id" => $post_id,
        ]);
        return $data;
    }

    public function get_all_com_not()
    {
        $data = model::db()->rows("SELECT com_not.*,user.*,comment.
        * FROM com_not JOIN user ON user.user_id = com_not.user_id JOIN comment ON comment.com_id = com_not.com_id WHERE com_not.com_status_not = 0 ORDER BY com_not.com_not_id DESC");
        return $data;
    }

    public function count_com()
    {
        $data = model::db()->count("SELECT * FROM com_not WHERE com_status_not = 0");
        return $data;
    }

    public function update_com_not()
    {
        $data = model::db()->run("UPDATE com_not SET com_status_not = 1 WHERE com_status_not = 0");
        return $data;

    }

    public function add_com_not($user_id, $com_id)
    {
        $data = model::db()->insert("com_not", [
            "user_id" => $user_id,
            "com_id" => $com_id,
            "com_status_not" => 0
        ]);
        return $data;
    }
}
