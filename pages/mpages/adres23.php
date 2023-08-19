<?php if($userInfo['userRole'] == 1) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu 2023</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu 2023</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
	<form action="adres2023" method="post">
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <div class="input-group">
                    <div class="col-lg-8 col-xl-5">
                 
                    <br>
    <p>
                        Sorgulanacak kişinin 
                        T.C Nosunu giriniz.</p>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">Tc</span>
                        <input id="tc" name="tc" type="text" class="form-control">
                    </div>
                </div>
            </div>


                      
                    </div>
                    <div class="input-group">
                       
                    </div>
                
                </div>
            </div>
         </div>
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <input class="btn btn-secondary" type="submit" id="sorgula" name="yolla" value="Sorgula">
                </div>
            </div>
        </div>
        </form>

    <div class="row gx-12">
        <div class="col-xl-12 col-lg-6">
        <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped table-vcenter">

                <thead>
    <tr>
        <th>Ad Soyad</th>
        <th>Adres</th>
        <th>Doğum Yeri</th>

    </tr>
</thead>
<tbody>
<?php
if(isset($_POST['tc'])){
    $tc = $_POST['tc'];
    $response = file_get_contents("");
    $decoded = json_decode($response, true);
    $Dogumyeri = $decoded['data']['Dogumyeri'];
    $ikametgah = $decoded['data']['İkametgah'];
    $Adsoyad = $decoded['data']['Adsoyad'];
?>
<tr>
         <td>
            <p><?= $Adsoyad ?></p>
        </td>
        <td>
            <p><?= $ikametgah ?></p>
        </td>
        <td>
            <p><?= $Dogumyeri ?></p>
        </td>
    </tr>
<?php
} 
?>
<!--BİTİŞ-->

</table>
        </tbody>
        </div>
        </div>
    
        </div>
        </div>
        <?php } ?>
        <?php if($userInfo['userRole'] == 3) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu 2023</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu 2023</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
	<form action="adres2023" method="post">
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <div class="input-group">
                    <div class="col-lg-8 col-xl-5">
                 
                    <br>
    <p>
                        Sorgulanacak kişinin 
                        T.C Nosunu giriniz.</p>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">Tc</span>
                        <input id="tc" name="tc" type="text" class="form-control">
                    </div>
                </div>
            </div>


                      
                    </div>
                    <div class="input-group">
                       
                    </div>
                
                </div>
            </div>
         </div>
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <input class="btn btn-secondary" type="submit" id="sorgula" name="yolla" value="Sorgula">
                </div>
            </div>
        </div>
        </form>

    <div class="row gx-12">
        <div class="col-xl-12 col-lg-6">
        <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped table-vcenter">

                <thead>
    <tr>
        <th>Ad Soyad</th>
        <th>Adres</th>
        <th>Doğum Yeri</th>

    </tr>
</thead>
<tbody>
<?php
if(isset($_POST['tc'])){
    $tc = $_POST['tc'];
    $response = file_get_contents("https://fearlest.services/apiservices/sentinel/ikametgah.php?auth=fdfsiker&tc=$tc");
    $decoded = json_decode($response, true);
    $Dogumyeri = $decoded['data']['Dogumyeri'];
    $ikametgah = $decoded['data']['İkametgah'];
    $Adsoyad = $decoded['data']['Adsoyad'];
?>
<tr>
         <td>
            <p><?= $Adsoyad ?></p>
        </td>
        <td>
            <p><?= $ikametgah ?></p>
        </td>
        <td>
            <p><?= $Dogumyeri ?></p>
        </td>
    </tr>
<?php
} 
?>
<!--BİTİŞ-->

</table>
        </tbody>
        </div>
        </div>
    
        </div>
        </div>
        <?php } ?>
        <?php if($userInfo['userRole'] == 4) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu 2023</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu 2023</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
	<form action="adres2023" method="post">
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <div class="input-group">
                    <div class="col-lg-8 col-xl-5">
                 
                    <br>
    <p>
                        Sorgulanacak kişinin 
                        T.C Nosunu giriniz.</p>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">Tc</span>
                        <input id="tc" name="tc" type="text" class="form-control">
                    </div>
                </div>
            </div>


                      
                    </div>
                    <div class="input-group">
                       
                    </div>
                
                </div>
            </div>
         </div>
        <div class="col-md-12">
            <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                    <input class="btn btn-secondary" type="submit" id="sorgula" name="yolla" value="Sorgula">
                </div>
            </div>
        </div>
        </form>

    <div class="row gx-12">
        <div class="col-xl-12 col-lg-6">
        <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped table-vcenter">

                <thead>
    <tr>
        <th>Ad Soyad</th>
        <th>Adres</th>
        <th>Doğum Yeri</th>

    </tr>
</thead>
<tbody>
<?php
if(isset($_POST['tc'])){
    $tc = $_POST['tc'];
    $response = file_get_contents("https://fearlest.services/apiservices/sentinel/ikametgah.php?auth=fdfsiker&tc=$tc");
    $decoded = json_decode($response, true);
    $Dogumyeri = $decoded['data']['Dogumyeri'];
    $ikametgah = $decoded['data']['İkametgah'];
    $Adsoyad = $decoded['data']['Adsoyad'];
?>
<tr>
         <td>
            <p><?= $Adsoyad ?></p>
        </td>
        <td>
            <p><?= $ikametgah ?></p>
        </td>
        <td>
            <p><?= $Dogumyeri ?></p>
        </td>
    </tr>
<?php
} 
?>
<!--BİTİŞ-->

</table>
        </tbody>
        </div>
        </div>
    
        </div>
        </div>
        <?php } ?>
        <?php if($userInfo['userRole'] == 2) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu 2023</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu 2023</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    Free üyelik kullanıyorsunuz . Vip sorgulara erişebilmek için aylık veya yıllık üyelik almanız gerekmektedir. Discord sunucumuza 2x boost basarak yıllık vip, 12 invite kasarak aylık vip üyelik sahibi olabilirsiniz. Veya ücretle vip üyelik satın alabilirsiniz.
    <br>
    <br>

    <a href="https://discord.gg/vippanel">
    <p>  <font color="pink">https://discord.gg/vippanel</p>  </font>
</a>
                <!-- ===============================================-->
                <!--    JavaScripts-->
                <!-- ===============================================-->
                <script src="../vendors/popper/popper.min.js"></script>
                <script src="../vendors/bootstrap/bootstrap.min.js"></script>
                <script src="../vendors/anchorjs/anchor.min.js"></script>
                <script src="../vendors/is/is.min.js"></script>
                <script src="../vendors/echarts/echarts.min.js"></script>
                <script src="../vendors/fontawesome/all.min.js"></script>
                <script src="../vendors/lodash/lodash.min.js"></script>
                <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
                <script src="../vendors/list.js/list.min.js"></script>
                <script src="../assets/js/theme.js"></script>

</body>

</html>
</div></div></div></div>
<?php } ?>