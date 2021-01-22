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
                            <h1 class="page-header-title mb-3">Contact Us</h1>
                            <p class="page-header-text">We will back to you in a week!</p>
                            <bold><?php
                                    if (isset($meg)) {
                                        echo $meg;
                                    }
                                    ?></bold>
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
                <?php
                if ($check_seesion == 0) {
                ?>
                    <div class="text-center">
                        <a href="<?= DOMAIN_NAME ?>\home\signin">Sign In to send message to admin</a>
                    </div>
                <?php
                } else {
                ?>
                    <form method="POST" action="send_message">
                        <div class="form-row">
                            <div class="form-group col-md-6"><label class="text-dark" for="inputName">Full name</label><input class="form-control py-4" id="inputName" type="text" readonly="" value="<?= $_SESSION["user_name"] ?>" /></div>
                            <div class="form-group col-md-6"><label class="text-dark" for="inputEmail">Email</label><input class="form-control py-4" id="inputEmail" type="email" readonly value="<?= $_SESSION['user_email'] ?>" /></div>
                        </div>
                        <div class="form-group"><label class="text-dark" for="inputMessage">Message</label><textarea class="form-control py-3" id="inputMessage" type="text" placeholder="Enter your message..." rows="4" name="meg_con"></textarea></div>
                        <div class="text-center"><button class="btn btn-primary btn-marketing mt-4" type="submit">Submit Request</button></div>
                    </form>

                    <?php if (!empty($reply)) { ?>
                        <table class="table table-bordered table-hover mt-5" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Your messages:</th>
                                    <th>Answers:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reply as $re) {
                                ?>
                                    <tr>
                                        <td><?= $re->meg_details ?></td>
                                        <td>
                                            <p class=""><?= $re->re_details ?></p> <br><small><?= $re->re_date ?></small>
                                        <td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <p class="lead text-center">Send messages as soon as the admin will reply</p>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
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