<nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                <div class="container">
                    <a class="navbar-brand text-dark" href="<?=DOMAIN_NAME?>\home\index">TechBarik</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img src="img/menu.png" style="height:20px;width:25px" /><i data-feather="menu"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=DOMAIN_NAME?>\home\index">Home </a>
                            </li>
                            <li class="nav-item dropdown no-caret">
                                <a class="nav-link" href="<?=DOMAIN_NAME?>contact\index">Contact</a>
                            </li>
                            <?php
                            if (isset($_SESSION["user_admin"]) && $_SESSION["user_admin"] == 1) {
                            ?>
                                <li class="nav-item dropdown no-caret">
                                    <a class="nav-link" href="<?=DOMAIN_NAME?>\backend\index">dashbord</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <?php
                        if (isset($_SESSION['user_name'])) {
                        ?>
                            <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="#"><?= $_SESSION["user_name"]; ?><i class="fas fa-arrow-right ml-1"></i></a>
                            <a class="btn-danger btn rounded-pill px-4 ml-lg-4" href="<?=DOMAIN_NAME?>home/logout_user">logout<i class="fas fa-arrow-right ml-1"></i></a>
                        <?php
                        } else {
                        ?>
                            <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="<?=DOMAIN_NAME?>home/signin">Sign in<i class="fas fa-arrow-right ml-1"></i></a>
                            <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="<?=DOMAIN_NAME?>home/signup">Sign up<i class="fas fa-arrow-right ml-1"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>