<?php
require_once("header.php");
require_once("nav.php");
?>
<div id="layoutDefault_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
            <div class="page-header-content pt-10">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h1 class="page-header-title mb-3"><?= $post_info->post_title ?></h1>
                            <p class="page-header-text"><?= $post_info->cat_name . "," . $post_info->post_date ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svg-border-rounded text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                    <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
                </svg>
            </div>
        </header>
        <section class="bg-white py-10">
            <div class="container">
                <!--start post content-->
                <div>
                    <a class="card post-preview post-preview-featured lift mb-5" href="#">
                        <div class="row no-gutters">
                            <div class="col-lg-5">
                                <div class="post-preview-featured-img" style='background-image: url("<?= PATH_BACK ?>img_upload/<?= $post_info->post_photo ?>")'></div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card-body">
                                    <div class="py-5">
                                        <h5 class="card-title"><?= $post_info->post_title ?></h5>
                                        <p class="card-text"><?= $post_info->post_details ?></p>
                                    </div>
                                    <hr />
                                    <div class="post-preview-meta">
                                        <img class="post-preview-meta-img" src="<?= PATH_BACK ?>img_upload/<?= $post_info->user_img ?>" />
                                        <div class="post-preview-meta-details">
                                            <div class="post-preview-meta-details-name"><?= ucwords($post_info->user_frist . " " . $post_info->user_last) ?></div>
                                            <div class="post-preview-meta-details-date"><?= $post_info->post_date ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end post content-->

                <?php
                if ($check_session == 0) {
                ?>
                    <div class="text-center">
                        <a href="<?= DOMAIN_NAME ?>\home\signin">sgin in to add comment</a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="pt-5 col-lg-8 col-xl-9">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-md-row">
                            <h2 class="mb-0">Comments</h2>
                        </div>
                        <hr class="mb-4" />
                        <?php
                        foreach ($comment_awit as $com) {
                            if ($_SESSION["user_id"] == $com->user_id) {
                        ?>
                                <div class="card mb-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="mr-2 text-dark">
                                            <?= ucwords($com->user_frist . " " . $com->user_last) ?>
                                            <div class="text-xs text-muted"><?= $com->com_date ?></div>
                                        </div>
                                        <div class="h5"><span class="badge badge-warning-soft text-warning font-weight-normal">Awaiting Response</span></div>
                                    </div>
                                    <div class="card-body">
                                        <?= $com->com_details ?>
                                    </div>
                                </div>
                            <?php
                            }
                        }

                        foreach ($accepted_comment as $com) {
                            ?>
                            <div class="card mb-5">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="mr-2 text-dark">
                                        <?= ucwords($com->user_frist . " " . $com->user_last) ?>
                                        <div class="text-xs text-muted"><?= $com->com_date ?></div>
                                    </div>
                                    <div class="h5"><span class="badge badge-success-soft text-success font-weight-normal">Approved</span></div>
                                </div>
                                <div class="card-body">
                                    <?= $com->com_details ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($meg)) {
                        ?>
                            <p><?= $meg ?></p>
                        <?php
                        }
                        ?>
                        <div class="card">
                            <div class="card-header">Add Comment</div>
                            <div class="card-body">
                                <form action="<?= DOMAIN_NAME ?>\home\add_comment" method="POST">
                                    <textarea placeholder="Type here..." class="form-control mb-2" rows="4" name="com_details" required></textarea>
                                    <input type="hidden" name="post_id" value="<?= $post_info->post_id ?>">
                                    <button class="btn btn-primary btn-sm mr-2" type="submit">Post Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--start comment section-->
                <!--end comment section end-->
            </div>

            <!--Rounded style-->
            <div class="svg-border-rounded text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                    <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
                </svg>
            </div>
            <!--Rounded style-->
        </section>
    </main>

    <?php require_once("footer.php"); ?>