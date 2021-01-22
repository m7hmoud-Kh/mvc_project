<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand d-none d-sm-block" href="<?= DOMAIN_NAME ?>\backend\index">Admin Panel</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
    <ul class="navbar-nav align-items-center ml-auto">

        <!--User Registration + New Comment Notification-->
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge badge-red"><?= $count_com ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="mr-2" data-feather="bell"></i>
                    Notification
                </h6>

                <?php
                foreach ($all_com as $com) {
                ?>
                    <a class="dropdown-item dropdown-notifications-item" href="<?=DOMAIN_NAME?>\backend\show_comment">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">

                            <div class="dropdown-notifications-item-content-details">
                                <?=$com->com_date?>
                            </div>
                            <div class="dropdown-notifications-item-content-text">
                                <?=substr($com->com_details,0,20)."...."?>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <a class="dropdown-item dropdown-notifications-footer" href="<?=DOMAIN_NAME?>\backend\show_comment">
                    View All Alerts
                </a>
            </div>
        </li>
        <!--User Registration + New Comment Notification-->

        <!--Message Notification-->
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
                <span class="badge badge-red"><?= $count_meg ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="mr-2" data-feather="mail"></i>
                    Message Notification
                </h6>
                <?php
                foreach ($meg_not as $not) {
                ?>
                    <a class="dropdown-item dropdown-notifications-item" href="<?= DOMAIN_NAME ?>\backend\reply_on_message\<?= $not->meg_id ?>"><img class="dropdown-notifications-item-img" src="<?= PATH_BACK ?>/img_upload/<?= $not->user_img ?>" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">
                                <?= substr($not->meg_details, 0, 15) . "...." ?>
                            </div>
                            <div class="dropdown-notifications-item-content-details">
                                <?= ucwords($not->user_frist . " " . $not->user_last) ?> &#xB7; <?= $not->meg_date ?>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <a class="dropdown-item dropdown-notifications-footer" href="<?= DOMAIN_NAME ?>\backend\show_message">
                    Read All Messages
                </a>
            </div>
        </li>
        <!--Message Notification-->
        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if ($user_info->user_img == 0) {
                ?>
                    <img class="img-fluid" src='<?= PATH_BACK ?>assets/img/client3.jpg?>' />
                <?php
                } else {
                ?>
                    <img class="img-fluid" src='<?= PATH_BACK ?>img_upload/<?= $user_info->user_img ?>' />
                <?php
                }
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">

                    <?php
                    if ($user_info->user_img == 0) {
                    ?>
                        <img class="img-fluid" src='<?= PATH_BACK ?>assets/img/client3.jpg?>' />
                    <?php
                    } else {
                    ?>
                        <img class="dropdown-user-img" src='<?= PATH_BACK ?>img_upload/<?= $user_info->user_img ?>' alt="Photo" />

                    <?php
                    }
                    ?>

                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">
                            <?= ucwords($user_info->user_frist . " " . $user_info->user_last) ?>
                        </div>
                        <div class="dropdown-user-details-email">
                            <?= $user_info->user_email ?>
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= DOMAIN_NAME ?>\home\index">
                    <div class="dropdown-item-icon">
                        <i data-feather="home"></i>
                    </div>
                    Home
                </a>
                <a class="dropdown-item" href="<?= DOMAIN_NAME ?>\backend\logout_dash">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>