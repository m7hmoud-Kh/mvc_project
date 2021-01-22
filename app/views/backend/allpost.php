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
                        <div class="page-header-icon"><i data-feather="layout"></i></div>
                        <span>All Posts</span>
                    </h1>
                </div>
            </div>
        </div>

        <!--Start Table-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">All Posts</div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Views</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Views</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($allpost as $post) {
                                ?>
                                    <tr>
                                        <td><?=$post->post_id?></td>
                                        <td>
                                            <a href="#"><?=$post->post_title?></a>
                                        </td>
                                        <td>
                                            <?php
                                            if($post->post_status == 0)
                                            {
                                                ?>
                                                <div class="badge badge-success">Published
                                            </div>
                                                <?php
                                            } else
                                            {
                                                ?>
                                                <div class="badge badge-danger">Draft
                                            </div>
                                                <?php 
                                            }
                                            ?>
                                        </td>
                                        <td><?=$post->cat_name;?></td>
                                        <td><?=$post->user_frist . " " . $post->user_last;?></td>
                                        <td><img src="<?=PATH_BACK."img_upload/".$post->post_photo;?>" alt="" style="height: 75px;width:75px;display: inline-block;"></td>
                                        <td><?=$post->post_date?></td>
                                        <td><?=substr($post->post_details,0,20)."...."?></td>
                                        <td><?=$post->post_tag?></td>
                                        <td>
                                            <a href="#">0</a>
                                        </td>
                                        <td><?=$post->post_views;?></td>
                                        <td>
                                            <a href="edit_post/<?=$post->post_id?>">
                                            <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_post/<?=$post->post_id?>">
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