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
                        <div class="page-header-icon"><i data-feather="mail"></i></div>
                        <span>Messages</span>
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
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Response</th>
                                    <th>Decline</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 0;
                                foreach ($allmeg as $meg) {
                                ?>
                                    <tr>
                                        <td><?= $meg->meg_id ?></td>
                                        <td>
                                            <?= ucwords($meg->user_frist . " " . $meg->user_last); ?>
                                        </td>
                                        <td>
                                            <?= $meg->user_email ?>
                                        </td>
                                        <td><?= $meg->meg_details ?></td>
                                        <td><?= $meg->meg_date ?></td>
                                        <td>
                                            <?php
                                            if ($meg->meg_status == 0) {
                                            ?>
                                                <div class="badge badge-danger">
                                                    Pending
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="badge badge-success">
                                                    complete
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        if ($check_reply[$x] == 0) {
                                        ?>
                                            <td>
                                                <a href="reply_on_message/<?= $meg->meg_id ?>">
                                                    <button class="btn btn-success btn-icon"><i data-feather="mail"></i></button>
                                                </a>
                                            </td>
                                        <?php
                                        } else {
                                        ?>
                                            <td>
                                                <a href="check_message/<?= $meg->meg_id ?>">
                                                    <button class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                                </a>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <td>
                                            <a href="check_message_decline/<?= $meg->meg_id ?>">
                                                <button class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="check_message_delete/<?= $meg->meg_id ?>">
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
        <!--End Table-->
    </main>
    <?php require_once("footer.php"); ?>