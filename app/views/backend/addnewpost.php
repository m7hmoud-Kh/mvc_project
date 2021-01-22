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
                        <span>Try Creating New Post</span>
                        <?php
                        if (isset($formerr)) {
                            foreach ($formerr as $err) {
                        ?>
                                <code><?= $err; ?></code>
                        <?php
                            }
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <!--Start Form-->
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header">Create New Post</div>
                <div class="card-body">
                    <form method="POST" action="post_new_post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="post-title">Post Title:</label>
                            <input class="form-control" id="post-title" type="text" placeholder="Post title ..." name="post_title" />
                        </div>
                        <div class="form-group">
                            <label for="post-status">Post Status:</label>
                            <select class="form-control" id="post-status" name="post_status">
                                <option value="0">Published</option>
                                <option value="1">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select-category">Select Category:</label>
                            <select class="form-control" id="select-category" name="cat_id">
                                <?php
                                foreach ($allcat as $cat) {
                                ?>
                                    <option value="<?= $cat->cat_id ?>"><?= $cat->cat_name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post-photo">Choose photo:</label>
                            <input class="form-control" id="post-photo" type="file" name="image" />
                        </div>

                        <div class="form-group">
                            <label for="post-content">Post Details:</label>
                            <textarea class="form-control" placeholder="Type here..." id="post-content" rows="9" name="post_details"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="post-tags">Post Tags:</label>
                            <textarea class="form-control" placeholder="Tags..." id="post-tags" rows="3" name="post_tag"></textarea>
                        </div>
                        <button class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                    </form>
                </div>
            </div>
        </div>
        <!--End Form-->

    </main>
    <?php
    require_once("footer.php");
    ?>