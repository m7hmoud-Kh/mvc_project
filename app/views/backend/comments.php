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
                        <div class="page-header-icon"><i data-feather="package"></i></div>
                        <span>All Comments</span>
                    </h1>
                </div>
            </div>
        </div>
        <!--Start Table-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">All Comments</div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>In response to</th>
                                    <th>Details</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                    <th>Decline</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($allcom as $com) {
                                ?>
                                    <tr>
                                        <td><?= $com->com_id ?></td>
                                        <td>
                                            <?= $com->user_frist . " " . $com->user_last ?>
                                        </td>
                                        <td>
                                            <?= $com->user_email ?>
                                        </td>
                                        <td>
                                            <a href="<?=DOMAIN_NAME?>backend\all_post">
                                                <?= $com->post_title ?>
                                            </a>
                                        </td>
                                        <td><?= $com->com_details ?></td>
                                        <td><?= $com->com_date ?></td>
                                        <td>
                                            <?php
                                            if ($com->com_status == 0) {
                                            ?>
                                                <div class="badge badge-danger">
                                                    Decline
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="badge badge-success">
                                                    Approved
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="approved/<?= $com->com_id ?>">
                                                <button class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="decline/<?= $com->com_id ?>">
                                                <button class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete/<?= $com->com_id ?>">
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
