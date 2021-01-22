<?php require_once("header.php");
require_once("nav.php");
?>

<div id="layoutDefault_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
            <div class="page-header-content pt-10">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h1 class="page-header-title mb-3">Search result for '<?= $wordser ?>'</h1>
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
                <h1>Search Result:</h1>
                <hr />
                <div class="row">
                    <?php
                    foreach ($search as $ser) {
                    ?>
                        <div class="col-md-6 col-xl-4 mb-5">
                            <a class="card post-preview lift h-100" href="<?= DOMAIN_NAME ?>\view_post\<?= $ser->post_id ?>"><img class="card-img-top" src="<?= PATH_BACK ?>\img_upload\<?= $ser->post_photo ?>" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title"><?= $ser->post_title ?></h5>
                                    <p class="card-text"><?= substr($ser->post_details, 0, 25) . "........" ?></p>
                                </div>
                                <div class="card-footer">
                                    <div class="post-preview-meta">
                                        <img class="post-preview-meta-img" src="<?= PATH_BACK ?>\img_upload\<?= $ser->user_img ?>" />
                                        <div class="post-preview-meta-details">
                                            <div class="post-preview-meta-details-name"><?= ucwords($ser->user_frist . " " . $ser->user_last) ?></div>
                                            <div class="post-preview-meta-details-date"><?= $ser->post_date ?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="svg-border-rounded text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                        <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
                    </svg>
                </div>
        </section>
    </main>
    <?php require_once("footer.php"); ?>