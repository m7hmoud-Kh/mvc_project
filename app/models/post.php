<?php

namespace SHOP\models;

use SHOP\core\model;

class post extends model
{
    public function check_name_of_post($post_title)
    {
        $data = model::db()->count("SELECT * FROM posts WHERE post_title = ?", [$post_title]);
        return $data;
    }

    public function add_post($post_title, $post_details, $post_tag, $post_status, $post_photo, $cat_id, $user_id, $post_date)
    {
        $data = model::db()->insert("posts", [
            "post_title" => $post_title,
            "post_details" => $post_details,
            "post_tag" => $post_tag,
            "post_status" => $post_status,
            "post_photo" => $post_photo,
            "post_views" => 0,
            "cat_id" => $cat_id,
            "user_id" => $user_id,
            "post_date" => $post_date
        ]);
        return $data;
    }

    public function get_all_post()
    {
        $data = model::db()->rows("SELECT posts.*,user.user_id,user.user_frist,user.user_last,categor.cat_id,categor.cat_name FROM posts JOIN user ON posts.user_id = user.user_id JOIN categor ON posts.cat_id = categor.cat_id ORDER BY posts.post_id DESC");
        return $data;
    }
    public function delete_post($post_id)
    {
        $data = model::db()->delete("posts", ["post_id" => $post_id]);
        return $data;
    }

    public function get_post_byid($post_id)
    {
        $data = model::db()->row("SELECT posts.*,user.user_id,categor.cat_id,categor.cat_name FROM posts JOIN user ON posts.user_id = user.user_id JOIN categor ON posts.cat_id = categor.cat_id WHERE posts.post_id = ?", [$post_id]);
        return $data;
    }
    public function check_post_update($post_title, $post_id)
    {
        $data = model::db()->count("SELECT * FROM posts WHERE post_title = ? AND post_id != ?", [$post_title, $post_id]);
        return $data;
    }
    public function update_post($post_title, $post_status, $cat_id, $post_details, $post_tag, $post_image, $post_id)
    {
        $data = model::db()->update(
            "posts",
            [
                "post_title" => $post_title,
                "post_status" => $post_status,
                "cat_id" => $cat_id,
                "post_details" => $post_details,
                "post_tag" => $post_tag,
                "post_photo" => $post_image
            ],
            ["post_id" => $post_id]
        );
        return $data;
    }

    public function count_post()
    {
        $data = model::db()->count("SELECT * FROM posts");
        return $data;
    }

    public function popular_post()
    {
        $data = model::db()->rows("SELECT posts.*,user.user_id,user.user_frist,user.user_last,categor.cat_id,categor.cat_name FROM posts JOIN user ON posts.user_id = user.user_id JOIN categor ON posts.cat_id = categor.cat_id ORDER BY posts.post_views DESC limit 6");
        return $data;
    }
    public function count_post_in_category($cat_id)
    {
        $data = model::db()->count("SELECT * FROM posts WHERE cat_id = ?",[$cat_id]);
        return $data;
    }
    public function total_view_cate($cat_id)
    {
        $data = model::db()->row("SELECT SUM(post_views) AS total_view FROM posts WHERE cat_id = ?",[$cat_id]);
        return $data;
    }

    public function most_view($limit)
    {
        $data = model::db()->rows("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id ORDER BY post_views DESC LIMIT $limit");
        return $data;
    }
    public function most_view_post($limit)
    {
        $data = model::db()->row("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id ORDER BY post_views DESC LIMIT $limit");
        return $data;
    }
    public function recent($page,$limit)
    {
        $data = model::db()->rows("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id ORDER BY post_id DESC LIMIT $page,$limit");
        return $data;
    }


    // the three most popular post
    public function most_viewed_posts($limit,$cat_id)
    {
        $data = model::db()->rows("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id   WHERE posts.cat_id = ? ORDER BY post_views DESC LIMIT $limit",[$cat_id]);
        return $data;
    }

    // post has the biggest view
    public function most_popular_post($limit,$cat_id)
    {
        $data = model::db()->row("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id  WHERE posts.cat_id = ? ORDER BY post_views DESC LIMIT $limit",[$cat_id]);
        return $data;
    }
    // the posts has new inserted
    public function recent_post_cate($index,$limit,$cat_id)
    {
        $data = model::db()->rows("SELECT posts.*,user.* FROM posts JOIN user ON user.`user_id` = posts.user_id WHERE posts.cat_id = ? ORDER BY post_id DESC LIMIT $index, $limit ",[$cat_id]);
        return $data;
    }
    // get all info post
    public function get_all_info_post($post_id)
    {
        $data = model::db()->row("SELECT posts.*,user.user_id,user.user_frist,user.user_last,user.user_img,categor.cat_id,categor.cat_name FROM posts JOIN user ON posts.user_id = user.user_id JOIN categor ON posts.cat_id = categor.cat_id WHERE posts.post_id = ? ORDER BY posts.post_id DESC",[$post_id]);
        return $data;
    }

    public function update_view($post_views,$post_id)
    {
        $data = model::db()->update("posts",["post_views"=>$post_views+1],["post_id"=>$post_id]);
        return $data;
    }

    public function search_post_in_main($ser)
    {
        $data = model::db()->rows("SELECT posts.*,categor.*,user.* FROM posts JOIN categor ON 
        categor.cat_id = posts.cat_id JOIN user ON posts.user_id = user.user_id  WHERE posts.post_title  LIKE '%$ser%' ");
        return $data;
    }

    public function search_post_in_cate($ser,$cat_id)
    {
        $data = model::db()->rows("SELECT posts.*,categor.*,user.* FROM posts JOIN categor ON 
        categor.cat_id = posts.cat_id JOIN user ON posts.user_id = user.user_id  WHERE posts.post_title  LIKE '%$ser%' AND categor.cat_id = ?",[$cat_id]);
        return $data;
    }

}
