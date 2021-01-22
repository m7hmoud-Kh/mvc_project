<?php

namespace SHOP\models;

use SHOP\core\model;

class reply extends model
{
    public function check_reply_meg($meg_id)
    {
        $data = model::db()->count("SELECT * FROM reply WHERE meg_id = ?", [$meg_id]);
        return $data;
    }

    public function add_reply($re_details,$meg_id,$user_id,$re_date)
    {
        $data = model::db()->insert("reply", [
            "re_details" => $re_details,
            "meg_id" => $meg_id,
            "user_id" => $user_id,
            "re_date" => $re_date
        ]);
        return $data;
    }

    public function get_all_reply_member($user_id)
    {
        $data = model::db()->rows("SELECT reply.*,message.* FROM reply JOIN message ON message.meg_id  = reply.meg_id WHERE message.`user_id` = ?  AND message.meg_status = 1 ORDER BY reply.re_id DESC ",[$user_id]);
        return $data;
    }
}
