<!--Side Nav-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <a class="nav-link collapsed pt-4" href="<?= DOMAIN_NAME ?>backend/index">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i data-feather="layout"></i></div>
                        Posts
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                            <a class="nav-link" href="<?= DOMAIN_NAME ?>backend/all_post">All Posts</a>
                            <a class="nav-link" href="<?= DOMAIN_NAME ?>backend/new_post">Add New Post</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?= DOMAIN_NAME ?>backend/allcategories">
                        <div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                        Categories
                    </a>
                    <a class="nav-link" href="<?=DOMAIN_NAME?>backend\all_user">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        Users
                    </a>
                    <a class="nav-link" href="show_comment">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        Comments
                    </a>

                    <a class="nav-link" href="show_message">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                    </a>

                    <a class="nav-link" href="editprofile">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Profile
                    </a>
                </div>
            </div>

            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?= $_SESSION["user_name"]; ?></div>
                </div>
            </div>

        </nav>
    </div>