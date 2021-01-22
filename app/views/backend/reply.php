<?php require_once("header.php"); ?>
<?php require_once("side_nav.php"); ?>
<?php require_once("navbar.php") ?>
<div id="layoutSidenav_content">
    <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
            <div class="container-fluid">
                <div class="page-header-content">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="mail"></i></div>
                        <span>Reply</span>
                    </h1>
                </div>
            </div>
        </div>

        <!--Start Form-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">Reponse Area:</div>
                <div class="card-body">
                    <form action="../post_reply" method="POST">
                        <div class="form-group">
                            <label for="post-content">Message:</label>
                            <textarea class="form-control" placeholder="Type here..." id="post-content" rows="9" readonly="true"><?=$meg_info->meg_details?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="user-name">User name:</label>
                            <input class="form-control" id="user-name" type="text" placeholder="User name ..." readonly="true" value="<?=ucwords($meg_info->user_frist . " " . $meg_info->user_last )?>" />
                        </div>
                        <div class="form-group">
                            <label for="post-tags">Reply:</label>
                            <textarea class="form-control" placeholder="Type your reply here..." id="post-tags" rows="9" name="reply_meg"></textarea>
                        </div>
                        <input type="hidden" name="meg_id" value="<?=$meg_info->meg_id?>">
                        <button class="btn btn-primary mr-2 my-1" type="submit">Send my respose</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End Form-->

    </main>
    <?php require_once("footer.php"); ?>