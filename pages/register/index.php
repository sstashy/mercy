<?php
use jesuzweq\System;
include_once('../../system/main.php');
use jesuzweq\ZFunctions;

if(isset($_SESSION['authKey'])){
    header("Location: ".$site_url."dashboard");
    exit();
}

if ($_POST) {
    ZFunctions::registeruser();
    $alert = "success";
}

 


?>
<!doctype html>
<html lang="tr" data-layout="vertical" data-layout-style="default" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-layout-mode="dark" data-layout-position="fixed">
<!-- <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none"> -->

<head>
    <meta charset="utf-8" />
    <title>
        edited by Yusufonly
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="JeustPRO" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/lexas-logo.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <!-- Danger Alert -->
                            <?php if (@$alert == "wrongKey") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Yanlış anahtar!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "error") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Zaten Bu Kullanıcı Adı veya Mail Adresi Kullanılıyor!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "captchaErr") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Robot doğrulaması geçersiz!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "multiSecure") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Başka bir ip İle giriş yapmaya çalıştığınız için hesabınız devre dışı bırakıldı!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "endOfMembership") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Üyeliğiniz sona ermiştir! Hata olduğunu düşünüyorsanız, yetkili biri ile iletişime geçin.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "deactiveMembership") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Üyeliğiniz aktif değil! Lütfen yönetici biri ile iletişime geçiniz.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "databaseError") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Bir hata oluştu! Daha sonra tekrar deneyiniz...
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "freeMember") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Bedava üyeliğe sahip kullanıcılar giriş yapamaz!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>

                            <?php if (@$alert == "zatenvar") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Bu kullanıcı zaten var! 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <?php if (@$alert == "girmengerek") { ?>
                                <div class="alert alert-danger alert-top-border alert-dismissible shadow fade show" role="alert">
                                    <i class="ri-error-warning-line me-3 align-middle fs-16 text-danger"></i>Lütfen gerekli alanları doldurunuz!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <?php if (@$alert == "success") {
                                header("Location: /kayit-basarili");
                                exit();
                            }
                            ?>

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <a class="d-inline-block auth-logo">
                                        <img src="assets/images/lexas-logo.png" id="logo-login" alt="" height="150">
                                        <style>
                                            #logo-login:hover {
                                                transition: 500ms;
                                                transform: scale(1.5);
                                                filter: brightness(1);
                                                /* width: 155px;
                                            height: 157px; */
                                            }

                                            #logo-login {
                                                transition: 500ms;
                                                filter: brightness(0.7);
                                                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                                                -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                                                transform: scale(1);
                                            }
                                        </style>
                                    </a>
                                    <h5 class="text" id="jeust-text">Kayıt Ol
                                    <h6 class="text" id="jeust-text">Freemium kayıt sistemimize hoşgeldiniz!</h6>
                                        <style>
                                            #jeust-text:hover {
                                                transition: 500ms;
                                                transform: scale(1.5);
                                                filter: brightness(1);
                                                /* width: 155px;
                                            height: 157px; */
                                            }

                                            #jeust-text {
                                                transition: 500ms;
                                                filter: brightness(0.7);
                                                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                                                -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                                                transform: scale(1);
                                            }
                                        </style>
                                    </h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Kullanıcı Adı Oluştur</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Kullanıcı adı oluşturunuz" required oninvalid="this.setCustomValidity('Lütfen bir kullanıcı adı giriniz.')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Şifre Oluştur</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Şifre oluşturunuz" required oninvalid="this.setCustomValidity('Lütfen bir e-posta adresi giriniz.')" oninput="this.setCustomValidity('')">
                                        </div>
                                        
                                        
                                       



                                        
                                        <div class="mt-4">
                                            <button class="btn btn-soft-success w-100"  type="submit">Kayıt Ol</button>
                                        </div>

                                    </form>
                                    <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title">Üyelik almak için</h5>
                                        </div>
                                        <div>
                                            <button href="https://discord.gg/vippanel" onclick='location.href=`https://discord.gg/vippanel`' type="submit" class="btn btn-soft-secondary btn-icon waves-effect waves-light w-100">
                                                <p class="mb-0"> Discord</p>
                                            </button>
                                        </div>
                                        <br>
                                        <div class="w-100 mb-2">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title">Giriş Yapmak için</h5>

                                        <button class="btn btn-soft-secondary btn-icon waves-effect waves-light w-100" onclick="window.location.href='/mercyw/'">
                                                <p class="mb-0">Giriş Yap</p>
                                            </button>
                                        </div>
                                    

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                               Yusufonly
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </div>

    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>

    <!-- notifications init -->
    <script src="assets/js/pages/notifications.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweetalerts.init.js"></script>

    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>