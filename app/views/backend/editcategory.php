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
                                    <span>Update Category</span>
                                    <?php
                                    if(isset($megerr))
                                    {
                                        foreach($megerr as $err){
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

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Update Category</div>
                            <div class="card-body">
                                <form action="../post_edit_category" method="POST">
                                    <div class="form-group">
                                        <label for="post-title">Category Name:</label>
                                        <input class="form-control" id="post-title" type="text" placeholder="Category Name..." value="<?=$all_info_cat->cat_name;?>" name="cat_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="post-status">Status:</label>
                                        <select class="form-control" id="post-status" name="cat_status">
                                            <option <?php if($all_info_cat->cat_status == 0){echo "selected";} ?> value="0" >Published</option>
                                            <option <?php if($all_info_cat->cat_status == 1){echo "selected";} ?> value="1">Draft</option>
                                        </select>
                                    </div>
                                    <input type="hidden" value="<?=$all_info_cat->cat_id;?>" name="cat_id">
                                    <button class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
<?php 
require_once("footer.php");