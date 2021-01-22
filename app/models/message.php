<?php

namespace SHOP\models;

use SHOP\core\model;

class message extends model
{
    public function show_message()
    {
        $data = model::db()->rows("SELECT message.*,user.user_id,user.user_frist,user.user_last,user.user_email FROM message JOIN user ON user.user_id = message.`user_id` ORDER BY meg_id DESC");
        return $data;
    }

    public function reply_on_meg($meg_id)
    {
        $data = model::db()->row("SELECT message.meg_details,message.meg_id,message.`user_id`,user.user_id,user.user_frist,user.user_last FROM message JOIN user ON user.user_id = message.`user_id` WHERE meg_id = ?", [$meg_id]);
        return $data;
    }

    public function check_message($meg_status, $meg_id)
    {
        $data = model::db()->update("message", ["meg_status" => $meg_status], ["meg_id" => $meg_id]);
        return $data;
    }

    public function delete_message($meg_id)
    {
        $data = model::db()->delete("message", ["meg_id" => $meg_id]);
        return $data;
    }

    public function add_message($meg_con, $meg_date, $user_id)
    {
        $data = model::db()->insert("message", [
            "meg_details" => $meg_con,
            "meg_status" => 0,
            "meg_date" => $meg_date,
            "user_id" => $user_id
        ]);
        return $data;
    }

    public function add_not_meg($meg_id, $user_id)
    {
        $data = model::db()->insert("meg_not", [
            "meg_id" => $meg_id,
            "user_id" => $user_id,
            "meg_not_status" => 0,
        ]);
        return $data;
    }

    public function get_all_meg_not()
    {
        $data = model::db()->rows("SELECT meg_not.*,message.*,user.* FROM meg_not JOIN message ON message.meg_id=meg_not.meg_id JOIN user ON meg_not.user_id = user.user_id WHERE meg_not.meg_not_status = 0 ORDER BY meg_not.meg_not_id DESC");
        return $data;
    }

    public function count_new_not()
    {
        $data = model::db()->count("SELECT * FROM meg_not WHERE  meg_not_status = 0");
        return $data;
    }

    public function update_status_not($meg_id)
    {
        $data = model::db()->update("meg_not", ["meg_not_status" => 1], ["meg_id" => $meg_id]);
        return $data;
    }
}
