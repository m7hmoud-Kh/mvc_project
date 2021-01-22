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
                        <span>Create New User</span>
                    </h1>
                </div>
            </div>
        </div>
        <!--Start Table-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">Create New User</div>
                <div class="card-body">
                    <form action="post_add_user" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user-frist">User frist name:</label>
                            <input class="form-control" id="user-frist" type="text" placeholder="User frist..." name="user_frist" />
                        </div>
                        <div class="form-group">
                            <label for="user-last">User last:</label>
                            <input class="form-control" id="user-last" type="text" placeholder="User last name..." name="user_last" />
                        </div>
                        <div class="form-group">
                            <label for="user-email">User Email:</label>
                            <input class="form-control" id="user-email" type="email" placeholder="User Email..." name="user_email" />
                        </div>
                        <div class="form-group">
                            <label for="user-pass">User password:</label>
                            <input class="form-control" id="user-pass" type="password" placeholder="User password..." name="user_pass" />
                        </div>
                        <div class="form-group">
                            <label for="user-pass1">User confirm password:</label>
                            <input class="form-control" id="user-pass1" type="password" placeholder="User confirm password..." name="user_pass_con" />
                        </div>
                        <div class="form-group">
                            <label for="user-role">Role:</label>
                            <select class="form-control" id="user-role" name="user_role">
                                <option value="1">Admin</option>
                                <option value="0" selected>Subscriber</option>
                            </select>
                            <div class="form-group">
                                <label for="post-title">Choose photo:</label>
                                <input class="form-control" id="post-title" type="file" name="user_image"/>
                            </div>
                        </div>
                        <button class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End Table-->
    </main>
    <?php
    require_once("footer.php");
    ?>