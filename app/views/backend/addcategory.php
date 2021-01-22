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
                                    <span>Create New Category</span>
                                    <code>
                                        <?php
                                        if(isset($megerr))
                                        {
                                            foreach($megerr as $err)
                                            {
                                                echo $err . "<br>";
                                            }
                                        } 
                                        ?>
                                    </code>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Create New Category</div>
                            <div class="card-body">
                                <form action="post_add_category" method="POST">
                                    <div class="form-group">
                                        <label for="post-title">Category Name:</label>
                                        <input class="form-control" id="post-title" type="text" placeholder="Category Name..."  name="cat_name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="post-status">Status:</label>
                                        <select class="form-control" id="post-status" name="cat_status">
                                            <option value="0">Published</option>
                                            <option value="1">Draft</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
                <?php
require_once("footer.php");
?>