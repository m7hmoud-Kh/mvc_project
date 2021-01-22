<?php
require_once("header.php");
require_once("navbar.php") ;
require_once("side_nav.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
            <div class="container-fluid">
                <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="users"></i></div>
                        <span>All Users</span>
                    </h1>
                    <a href="add_user" title="Add new category" class="btn btn-white">
                        <div class="page-header-icon"><i data-feather="plus"></i></div>
                    </a>
                </div>
            </div>
        </div>
        <!--Start Table-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">All Users</div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Photo</th>
                                    <th>Registered on</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($alluser as $user) {
                                ?>
                                    <tr>
                                        <td><?= $user->user_id ?></td>
                                        <td>
                                            <?= ucwords($user->user_frist . " " . $user->user_last) ?>
                                        </td>
                                        <td>
                                            <?= $user->user_email ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($user->user_img == 0) {
                                                echo "No Photo";
                                            } else {
                                            ?>
                                                <img src="<?= PATH_BACK ?>\img_upload\<?= $user->user_img ?>" alt="" style="height: 75px;width:75px;display:inline-block;border-radius:50%;padding: 2px;background-color: #ca6e6e;">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?= $user->user_date_on ?></td>
                                        <td>
                                            <?php
                                            if ($user->user_regist == 1) {
                                            ?>
                                                <div class="badge badge-info">
                                                    Admin
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="badge badge-success">
                                                    Subscriber
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edituser/<?= $user->user_id ?>">
                                                <button class="btn btn-primary btn-icon"><i data-feather="edit"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delteuser/<?= $user->user_id ?>">
                                                <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End Table-->
    </main>
    <?php
    require_once("footer.php");
    ?>