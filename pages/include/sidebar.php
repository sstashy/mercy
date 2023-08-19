<!-- Chatra {literal} --> <script> (function(d, w, c) { w.ChatraID = 'tgsAFBaFGffJKe8Ym'; var s = d.createElement('script'); w[c] = w[c] || function() { (w[c].q = w[c].q || []).push(arguments); }; s.async = true; s.src = 'https://call.chatra.io/chatra.js'; if (d.head) d.head.appendChild(s); })(document, window, 'Chatra'); </script> <!-- /Chatra {/literal} -->
<?php
include_once("../system/main.php");

use jesuzweq\ZFunctions;

$userInfo = ZFunctions::getUserViaSession();

?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="../assets/images/lexas-logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="../assets/images/lexas-logo.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a class="logo logo-light">
            <span class="logo-sm">
                <img src="../assets/images/lexas-logo.png" alt="" height="70">
            </span>
            <span class="logo-lg">
                <style>
                    .logo-lg:hover {
                        transition: 500ms;
                        filter: brightness(0.7);
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                        -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                    }

                    .logo-lg {
                        width: 100%;
                        transition: 500ms;
                    }
                </style>
                <img src="../assets/images/lexas-logo.png" alt="" height="80">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">

        <div class="container-fluid">
            <div data-simplebar>

                <!-- Sorgu Menu Start -->
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                <?php if($userInfo['userRole'] == 3) {?>
                    <li class="menu-title"><span data-key="t-sorgu"><font color="pink">Aylık VİP Üyelik</span></li></font>
                    <?php } ?>
                    <?php if($userInfo['userRole'] == 4) {?>
                    <li class="menu-title"><span data-key="t-sorgu"><font color="pink">Yılllık VİP Üyelik</span></li></font>
                    <?php } ?>
                    <?php if($userInfo['userRole'] == 2) {?>
                    <li class="menu-title"><span data-key="t-sorgu"><font color="pink">Freemium Haftalık Üyelik</span></li></font>
                    <?php } ?>
                    <?php if($userInfo['userRole'] == 1) {?>
                    <li class="menu-title"><span data-key="t-sorgu"><font color="pink">Mercy Admin's</span></li></font>
                    <?php } ?>
                    
                    <li class="nav-item">

                        <a class="nav-link menu-link" href="panel">
                            <i class="ri-home-6-fill"></i> <span data-key="t-panel">Ana Sayfa <span
                                    ></span></span>
                        </a>
                    </li> <!-- end Sorgu Menu -->

                    <li class="menu-title"><span data-key="t-sorgular">Sorgular</span></li>

                    <!-- VIP SECTION -->
                   
                    
                       

                       
                        
                        
                    
                        <li class="nav-item">
                    
                    <a class="nav-link menu-link" href="#sidebarvip2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-vip-diamond-fill"></i> <span data-key="t-adminSidebar">Vip Sorgular<span class="badge badge-outline-info"></span></span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarvip2">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                    <a href="vesikalik" class="nav-link" data-key="t-vesika">Vesikalık Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span> </a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adres2023" class="nav-link" data-key="t-adres"> Adres Sorgu 2023 <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adres2015" class="nav-link" data-key="t-adres2"> Adres v2 <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="plaka" class="nav-link" data-key="t-plaka"> Plaka Sorgu <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>
                          
                    </div>
                    </li>
                    

                    <!-- VIP SECTION END -->
                    

                <!-- VIP SECTION END -->

                    <!-- SORGULAR SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSorgular" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSorgular">
                            <i class="ri-user-6-fill"></i> <span data-key="adsoyad">Sorgular</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarSorgular">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adsoyad" class="nav-link" data-key="t-adsoyad"> Ad Soyad Pro<span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcsorgu" class="nav-link" data-key="t-tcsorgu"> TC Sorgu <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="aile" class="nav-link" data-key="t-aile"> Aile Pro<span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="soyagaci" class="nav-link" data-key="t-soy"> Soyağacı Sorgu <span class="badge rounded-pill badge-soft-success">Aktif</span> </a>
                                </li>
                            </ul>

                           

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="multeci" class="nav-link" data-key="t-multeci"> Mülteci Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span> </a>
                                </li>
                            </ul>

                            
                           
                        </div>

                    </li>
                    <!-- SORGULAR SECTION END -->

                    <!-- GSM SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarGSM" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-phone-fill"></i> <span data-key="gsmsorgu">GSM Sorgular</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarGSM">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="gsmtc" class="nav-link" data-key="t-gsmtc"> GSM-TC Sorgu <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcgsm" class="nav-link" data-key="t-tcgsm"> TC-GSM Sorgu <span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="smsboomer" class="nav-link" data-key="t-sms"> Sms Boomer<span class="badge rounded-pill badge-soft-info">Beta</span></a>
                                </li>
                            </ul>
                           
                        </div>

                    </li>
                    <!-- GSM SECTION END -->
 <!-- Sağlık -->
 <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarsaglik" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarsaglik">
                            <i class="ri-database-2-fill"></i> <span data-key="sidebarsaglik">Database</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarsaglik">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="facebook" class="nav-link" data-key="t-facebook"> Facebook Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ttnet" class="nav-link" data-key="t-ttnet"> TTNET Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>
                            

                        </div>

                    </li>
                    <!-- VIP -->
                    <!-- EKSTRA SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarVesikalar" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-skull-2-line"></i> <span data-key="vesikaliklar">Ekstralar</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarVesikalar">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ip" class="nav-link" data-key="t-ipsorgu"> İp Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="discordsorgu" class="nav-link" data-key="t-ehliyetvesika"> Discord ID Sorgu <span class="badge rounded-pill badge-soft-info">Beta</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="kemlik" class="nav-link" data-key="t-kemlik"> Kimlik Oluşturucu<span class="badge rounded-pill badge-soft-success">Aktif</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="kimlik" class="nav-link" data-key="t-kimlik"> Kimlik Arşivi<span class="badge rounded-pill badge-soft-success">Aktif</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="cc" class="nav-link" data-key="t-cc"> CC Checker<span class="badge rounded-pill badge-soft-success">Aktif</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="iban" class="nav-link" data-key="t-iban"> İban Sorgu<span class="badge rounded-pill badge-soft-success">Aktif</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ihbar" class="nav-link" data-key="t-ihbar"> İhbar Botu<span class="badge rounded-pill badge-soft-success">Aktif</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- EKSTRA SECTION END -->
                    <?php if($userInfo['userRole'] == 1) {?>
                    <!-- ADMIN SECTION -->
                    <li class="nav-item">
                    <li class="menu-title"><span data-key="t-adminSidebar">ADMIN</span></li>
                    <a class="nav-link menu-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-admin-fill"></i> <span data-key="t-adminSidebar">Admin</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarAdmin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="announcement" class="nav-link" data-key="t-announcementPost"> Duyuru Paylaşımı
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="users" class="nav-link" data-key="t-Kullanıcılar"> Kullanıcılar </a>
                            </li>
                        </ul>
                    </div>
                    </li>
                    <?php } ?>
                   
                    <!-- ADMIN SECTION END -->
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>

                  