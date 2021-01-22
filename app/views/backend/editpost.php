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
                                    <span>Try Updating Post</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Update Post</div>
                            <div class="card-body">
                                <form action="../post_edit_post" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="post-title">Post Title:</label>
                                        <input class="form-control" id="post-title" type="text" placeholder="Post title ..." name="post_title" value="<?=$post->post_title?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="post-status">Post Status:</label>
                                        <select class="form-control" id="post-status" name="post_status">
                                            <option <?php if($post->post_status == 0){echo "selected";} ?> value="0" >Published</option>
                                            <option <?php if($post->post_status == 1){echo "selected";} ?> value="1" >Draft</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select-category">Select Category:</label>
                                        <select class="form-control" id="select-category" name="cat_id">
                                            <?php 
                                            foreach($allcat as $cat)
                                            {
                                                ?>
                                                <option value="<?=$cat->cat_id?>"><?=$cat->cat_name?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <img src="<?=PATH_BACK."img_upload/".$post->post_photo?>" alt=""  style="height: 100px;width:100px;display: inline-block;">
                                    <div class="form-group">
                                        <label for="post-title">Choose photo:</label>
                                        <input class="form-control" id="post-title" type="file" name="image"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="post-content">Post Details:</label>
                                        <textarea class="form-control" placeholder="Type here..." id="post-content" rows="9" name="post_details"><?=$post->post_details?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="post-tags">Post tag:</label>
                                        <textarea class="form-control" placeholder="Tags..." id="post-tags" rows="3" name="post_tag"><?=$post->post_tag?></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="<?=$post->post_id?>">
                                    <input type="hidden" name="post_image" value="<?=$post->post_photo?>">
                                    <button class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>
                <?php 
                require_once("footer.php");