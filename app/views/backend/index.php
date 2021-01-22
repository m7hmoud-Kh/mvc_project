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
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        <span>Dashboard</span>
                    </h1>
                </div>
            </div>
        </div>

        <!--Table-->
        <div class="container-fluid mt-n10">

            <!--Card Primary-->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <p>All Posts</p>
                            <p><?= $count_of_post ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_post">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <p>Comments</p>
                            <p><?=$count_all_comment?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="show_comment">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <p>Categories</p>
                            <p><?= $count_of_gategory ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="allcategories">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <p>Users</p>
                            <p><?=$count_all_user?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_user">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card Primary-->
            <div class="card mb-4">
                <div class="card-header">Most Popular Posts:</div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post Title</th>
                                    <th>Post Category</th>
                                    <th>Total Views</th>
                                    <th>Photo</th>
                                    <th>Author</th>
                                    <th>Posted On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($popular_post as $post) {
                                ?>
                                    <tr>
                                        <td><?= $post->post_id ?></td>
                                        <td>
                                            <a href="<?= DOMAIN_NAME ?>backend\all_post">
                                                <?= $post->post_title ?>
                                            </a>
                                        </td>
                                        <td><?= $post->cat_name ?></td>
                                        <td><?= $post->post_views ?></td>
                                        <td>
                                            <img src="<?= PATH_BACK . "img_upload/" . $post->post_photo ?>" alt="" style="height: 75px;width:75px;display: inline-block;">
                                        </td>
                                        <td><?= $post->user_frist . " " . $post->user_last ?></td>
                                        <td><?= $post->post_date ?></td>
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
    <?php require_once("footer.php"); ?>