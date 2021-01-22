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
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        <span>Your Profile</span>
                    </h1>
                    <?php 
                    if(!empty($formerr))
                    {
                        foreach($formerr as $err)
                        {
                            ?>
                            <code><?=$err . "<br>"; ?></code>
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
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <form action="post_profile" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user-Frist">Frist Name:</label>
                            <input class="form-control" id="user-Frist" type="text" placeholder="User Frist Name..." name="user_frist" value="<?=$user_info->user_frist?>" />
                        </div>
                        <div class="form-group">
                            <label for="user-Last">Last Name:</label>
                            <input class="form-control" id="user-Last" type="text" placeholder="User Last Name..." name="user_last" value="<?=$user_info->user_last?>" />
                        </div>
                        <div class="form-group">
                            <label for="user-pass">current password:</label>
                            <input class="form-control" id="user-pass" type="password" placeholder="current password..." name="cur_pass" />
                        </div>
                        <div class="form-group">
                            <label for="user-pass">new password:</label>
                            <input class="form-control" id="user-pass" type="password" placeholder="new password..." name="new_pass" />
                        </div>
                        <img src="<?=PATH_BACK?>/img_upload/<?=$user_info->user_img?>" alt="" style="height: 100px;width:100px;display:inline-block;">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="post-title">Choose photo:</label>
                                <input class="form-control" id="post-title" type="file" name="user_image" />
                            </div>
                        </div>
                        <button class="btn btn-primary mr-2 my-1" type="submit">Update now!</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End Table-->
    </main>
    <?php require_once("footer.php"); ?>