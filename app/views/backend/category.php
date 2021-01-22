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
                        <div class="page-header-icon"><i data-feather="chevrons-up"></i></div>
                        <span>Categories</span>
                    </h1>
                    <a href="add_category" title="Add new category" class="btn btn-white">
                        <div class="page-header-icon"><i data-feather="plus"></i></div>
                    </a>
                </div>
            </div>
        </div>
        <!--Table-->
        <div class="container-fluid mt-n10">

            <div class="card mb-4">
                <div class="card-header">All Categories</div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Total Posts</th>
                                    <th>Post Views</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 0;
                                foreach ($allcat_info as $cat_info) {
                                ?>
                                    <tr>
                                        <td><?= $cat_info->cat_id ?></td>
                                        <td>
                                            <a href="#">
                                                <?= $cat_info->cat_name ?>
                                            </a>
                                        </td>
                                        <td><?= $array_of_count[$x] ?></td>
                                        <?php
                                        if ($total_view[$x] > 0) {
                                        ?>
                                            <td><?= $total_view[$x] ?></td>
                                        <?php
                                        }else
                                        {
                                            ?>
                                            <td>0</td>
                                            <?php
                                        }
                                        ?>
                                        <td><?= $cat_info->user_frist . " " . $cat_info->user_last; ?></td>
                                        <td>
                                            <?php
                                            if ($cat_info->cat_status == 0) {
                                            ?>
                                                <div class="badge badge-success">Published
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="badge badge-danger">Draft
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="editcategory/<?= $cat_info->cat_id ?>">
                                                <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_category/<?= $cat_info->cat_id ?>">
                                                <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $x++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php
    require_once("footer.php");
    ?>