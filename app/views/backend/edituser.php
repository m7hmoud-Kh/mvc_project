<?php
require_once("header.php");
require_once("navbar.php") ;
require_once("side_nav.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
            <div class="container-fluid">
                <div class="page-header-content">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                        <span>Updating User</span>
                    </h1>
                    <?php
                        if(!empty($formerr)) 
                        {
                            foreach($formerr as $err)
                            {
                                ?>
                                <code><?=$err . "<br>"?></code>
                                <?php 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--Start Table-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="../post_edituser" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user-frist">User frist:</label>
                            <input class="form-control" id="user-frist" type="text" placeholder="User frist name..." name="user_frist" value="<?=$user_info->user_frist;?>" />
                        </div>
                        <div class="form-group">
                            <label for="user-last">User last:</label>
                            <input class="form-control" id="user-last" type="text" placeholder="User last name..." name="user_last"value="<?=$user_info->user_last;?>" />
                        </div>
                        <div class="form-group">
                            <label for="user-role">Role:</label>
                            <select class="form-control" id="user-role" name="role">
                                <option <?php if($user_info->user_regist == 1){echo "selected";} ?> value="1">Admin</option>
                                <option  <?php if($user_info->user_regist == 0){echo "selected";} ?> value="0" >Subscriber</option>
                            </select>
                            <?php if($user_info->user_img == 0)
                            {
                                ?>
                                <code>no image upload until</code>
                                <?php 
                            }else
                            {
                                ?>
                                <img src="<?=PATH_BACK?>\img_upload\<?=$user_info->user_img?>" alt="" style="height: 100px;width:100px;display:inline-block;">
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="post-title">Choose photo:</label>
                                <input class="form-control" id="post-title" type="file" name="user_img" />
                            </div>
                            <input type="hidden" name="user_id" value="<?=$user_info->user_id;?>">
                            <input type="hidden" name="old_img" value="<?=$user_info->user_img;?>">
                        </div>
                        <button class="btn btn-primary mr-2 my-1" type="submit">Update now!</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End Table-->
    </main>
    <?php
require_once("footer.php");