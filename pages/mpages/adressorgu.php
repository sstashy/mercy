<?php if($userInfo['userRole'] == 1) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu v2</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
<style>
body{
background-image: url("");
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">ADRES SORGU V2 </h4>
                    <p class="mb-1">
                    <p>
                     Adres V2 sorgulanan tc'nin 2015'deki adresini gösterir. Sorgu yavaş çalışmaktadır.</br>
                    </p>
                    
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input class="form-control" type="text" id="tcno" placeholder="TC"><br>
                            </div>
                            <br>
                        </div>
                        <center>
                            <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-danger waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sıfırla </button><br><br>
                           
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kimlik No</th>
                                        <th>Adı</th>
                                        <th>Soyadı</th>
                                        <th>Cinsiyeti</th>
                                        <th>Ana Adı</th>
                                        <th>Baba Adı</th>
                                        <th>Doğum Yeri</th>
                                        <th>Doğum Tarihi</th>
                                        <th>Nüfus İl</th>
                                        <th>Nüfus İlçe</th>
                                        <th>Adres İl</th>
                                        <th>Adres Ilçe</th>
                                        <th>Mahalle</th>
                                        <th>Cadde</th>
                                        <th>Kapı No</th>
                                        <th>Daire No</th>
                                    </tr>
                                </thead>
                                <tbody id="jojjoojj">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {
            $("#jojjoojj").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
        }

        function clearValues() {
            document.getElementById("tcno").value = "";
            document.getElementById("ad").value = "";
            document.getElementById("soyad").value = "";
            document.getElementById("adresil").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tc = $("#tcno").val();
            var ad = $("#ad").val();
            var soyad = $("#soyad").val();
            var adresil = $("#adresil").val();
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/adressorgu/api.php",
                type: "POST",
                data: {
                    tc: tc,
                    ad: ad,
                    soyad: soyad,
                    adresil: adresil
                },
                success: (res) => {
                    var json = res;

                    $.Toast.hideToast();

                    if (json.message === "cooldown error") {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'Ooooopss...',
                            text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                        })
                    }

                    if (json.success === "true") {
                        $.Toast.hideToast();

                        clearResults();
                        $("#jojjoojj").html("");
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.TC;
                            var name = data.ADI;
                            var surname = data.SOYADI;
                            var birthdate = data.DOGUMTARIHI;
                            var il = data.ADRESIL;
                            var ilce = data.ADRESILCE;
                            var mahalle = data.MAHALLE;
                            var caddesokak = data.CADDE;
                            var bina = data.KAPINO;
                            var daire = data.DAIRENO;
                            var gender = data.CINSIYETI;
                            var anneadi = data.ANAADI;
                            var babaadi = data.BABAADI;
                            var dogumyeri = data.DOGUMYERI;
                            var nufusilce = data.NUFUSILCESI;
                            var nufusil = data.NUFUSILI;

                            if (gender === "E") {
                                gender = "ERKEK";
                            } else if (gender === "K") {
                                gender = "KADIN"
                            } else {
                                gender = "N/A"
                            }

                            result = "<tr>" +
                                "<th>" +
                                tc +
                                "</th>" +
                                "<th>" +
                                name +
                                "</th>" +
                                "<th>" +
                                surname +
                                "</th>" +
                                "<th>" +
                                gender +
                                "</th>" +
                                "<th>" +
                                anneadi +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                dogumyeri +
                                "</th>" +
                                "<th>" +
                                birthdate +
                                "</th>" +
                                "<th>" +
                                nufusil +
                                "</th>" +
                                "<th>" +
                                nufusilce +
                                "</th>" +
                                "<th>" +
                                il +
                                "</th>" +
                                "<th>" +
                                ilce +
                                "</th>" +
                                "<th>" +
                                mahalle +
                                "</th>" +
                                "<th>" +
                                caddesokak +
                                "</th>" +
                                "<th>" +
                                bina +
                                "</th>" +
                                "<th>" +
                                daire +
                                "</th>";

                            array.push(result);

                        }

                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen bir kişi bulunamadı.',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "bakım",
                        text: 'Bu sorgu bakımdadır.'
                    })
                }
            })
        }
    </script>

</div>
<!--BİTİŞ-->

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
<?php } ?>
<?php if($userInfo['userRole'] == 3) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu v2</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
<style>
body{
background-image: url("");
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">ADRES SORGU V2 </h4>
                    <p class="mb-1">
                    <p>
                     Adres V2 sorgulanan tc'nin 2015'deki adresini gösterir. Sorgu yavaş çalışmaktadır.</br>
                    </p>
                    
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input class="form-control" type="text" id="tcno" placeholder="TC"><br>
                            </div>
                            <br>
                        </div>
                        <center>
                            <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-danger waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sıfırla </button><br><br>
                           
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kimlik No</th>
                                        <th>Adı</th>
                                        <th>Soyadı</th>
                                        <th>Cinsiyeti</th>
                                        <th>Ana Adı</th>
                                        <th>Baba Adı</th>
                                        <th>Doğum Yeri</th>
                                        <th>Doğum Tarihi</th>
                                        <th>Nüfus İl</th>
                                        <th>Nüfus İlçe</th>
                                        <th>Adres İl</th>
                                        <th>Adres Ilçe</th>
                                        <th>Mahalle</th>
                                        <th>Cadde</th>
                                        <th>Kapı No</th>
                                        <th>Daire No</th>
                                    </tr>
                                </thead>
                                <tbody id="jojjoojj">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {
            $("#jojjoojj").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
        }

        function clearValues() {
            document.getElementById("tcno").value = "";
            document.getElementById("ad").value = "";
            document.getElementById("soyad").value = "";
            document.getElementById("adresil").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tc = $("#tcno").val();
            var ad = $("#ad").val();
            var soyad = $("#soyad").val();
            var adresil = $("#adresil").val();
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/adressorgu/api.php",
                type: "POST",
                data: {
                    tc: tc,
                    ad: ad,
                    soyad: soyad,
                    adresil: adresil
                },
                success: (res) => {
                    var json = res;

                    $.Toast.hideToast();

                    if (json.message === "cooldown error") {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'Ooooopss...',
                            text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                        })
                    }

                    if (json.success === "true") {
                        $.Toast.hideToast();

                        clearResults();
                        $("#jojjoojj").html("");
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.TC;
                            var name = data.ADI;
                            var surname = data.SOYADI;
                            var birthdate = data.DOGUMTARIHI;
                            var il = data.ADRESIL;
                            var ilce = data.ADRESILCE;
                            var mahalle = data.MAHALLE;
                            var caddesokak = data.CADDE;
                            var bina = data.KAPINO;
                            var daire = data.DAIRENO;
                            var gender = data.CINSIYETI;
                            var anneadi = data.ANAADI;
                            var babaadi = data.BABAADI;
                            var dogumyeri = data.DOGUMYERI;
                            var nufusilce = data.NUFUSILCESI;
                            var nufusil = data.NUFUSILI;

                            if (gender === "E") {
                                gender = "ERKEK";
                            } else if (gender === "K") {
                                gender = "KADIN"
                            } else {
                                gender = "N/A"
                            }

                            result = "<tr>" +
                                "<th>" +
                                tc +
                                "</th>" +
                                "<th>" +
                                name +
                                "</th>" +
                                "<th>" +
                                surname +
                                "</th>" +
                                "<th>" +
                                gender +
                                "</th>" +
                                "<th>" +
                                anneadi +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                dogumyeri +
                                "</th>" +
                                "<th>" +
                                birthdate +
                                "</th>" +
                                "<th>" +
                                nufusil +
                                "</th>" +
                                "<th>" +
                                nufusilce +
                                "</th>" +
                                "<th>" +
                                il +
                                "</th>" +
                                "<th>" +
                                ilce +
                                "</th>" +
                                "<th>" +
                                mahalle +
                                "</th>" +
                                "<th>" +
                                caddesokak +
                                "</th>" +
                                "<th>" +
                                bina +
                                "</th>" +
                                "<th>" +
                                daire +
                                "</th>";

                            array.push(result);

                        }

                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen bir kişi bulunamadı.',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "bakım",
                        text: 'Bu sorgu bakımdadır.'
                    })
                }
            })
        }
    </script>

</div>
<!--BİTİŞ-->

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
<?php } ?>
<?php if($userInfo['userRole'] == 4) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu v2</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
<style>
body{
background-image: url("");
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">ADRES SORGU V2 </h4>
                    <p class="mb-1">
                    <p>
                     Adres V2 sorgulanan tc'nin 2015'deki adresini gösterir. Sorgu yavaş çalışmaktadır.</br>
                    </p>
                    
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input class="form-control" type="text" id="tcno" placeholder="TC"><br>
                            </div>
                            <br>
                        </div>
                        <center>
                            <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-danger waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sıfırla </button><br><br>
                           
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kimlik No</th>
                                        <th>Adı</th>
                                        <th>Soyadı</th>
                                        <th>Cinsiyeti</th>
                                        <th>Ana Adı</th>
                                        <th>Baba Adı</th>
                                        <th>Doğum Yeri</th>
                                        <th>Doğum Tarihi</th>
                                        <th>Nüfus İl</th>
                                        <th>Nüfus İlçe</th>
                                        <th>Adres İl</th>
                                        <th>Adres Ilçe</th>
                                        <th>Mahalle</th>
                                        <th>Cadde</th>
                                        <th>Kapı No</th>
                                        <th>Daire No</th>
                                    </tr>
                                </thead>
                                <tbody id="jojjoojj">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {
            $("#jojjoojj").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
        }

        function clearValues() {
            document.getElementById("tcno").value = "";
            document.getElementById("ad").value = "";
            document.getElementById("soyad").value = "";
            document.getElementById("adresil").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tc = $("#tcno").val();
            var ad = $("#ad").val();
            var soyad = $("#soyad").val();
            var adresil = $("#adresil").val();
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/adressorgu/api.php",
                type: "POST",
                data: {
                    tc: tc,
                    ad: ad,
                    soyad: soyad,
                    adresil: adresil
                },
                success: (res) => {
                    var json = res;

                    $.Toast.hideToast();

                    if (json.message === "cooldown error") {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'Ooooopss...',
                            text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                        })
                    }

                    if (json.success === "true") {
                        $.Toast.hideToast();

                        clearResults();
                        $("#jojjoojj").html("");
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.TC;
                            var name = data.ADI;
                            var surname = data.SOYADI;
                            var birthdate = data.DOGUMTARIHI;
                            var il = data.ADRESIL;
                            var ilce = data.ADRESILCE;
                            var mahalle = data.MAHALLE;
                            var caddesokak = data.CADDE;
                            var bina = data.KAPINO;
                            var daire = data.DAIRENO;
                            var gender = data.CINSIYETI;
                            var anneadi = data.ANAADI;
                            var babaadi = data.BABAADI;
                            var dogumyeri = data.DOGUMYERI;
                            var nufusilce = data.NUFUSILCESI;
                            var nufusil = data.NUFUSILI;

                            if (gender === "E") {
                                gender = "ERKEK";
                            } else if (gender === "K") {
                                gender = "KADIN"
                            } else {
                                gender = "N/A"
                            }

                            result = "<tr>" +
                                "<th>" +
                                tc +
                                "</th>" +
                                "<th>" +
                                name +
                                "</th>" +
                                "<th>" +
                                surname +
                                "</th>" +
                                "<th>" +
                                gender +
                                "</th>" +
                                "<th>" +
                                anneadi +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                dogumyeri +
                                "</th>" +
                                "<th>" +
                                birthdate +
                                "</th>" +
                                "<th>" +
                                nufusil +
                                "</th>" +
                                "<th>" +
                                nufusilce +
                                "</th>" +
                                "<th>" +
                                il +
                                "</th>" +
                                "<th>" +
                                ilce +
                                "</th>" +
                                "<th>" +
                                mahalle +
                                "</th>" +
                                "<th>" +
                                caddesokak +
                                "</th>" +
                                "<th>" +
                                bina +
                                "</th>" +
                                "<th>" +
                                daire +
                                "</th>";

                            array.push(result);

                        }

                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen bir kişi bulunamadı.',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "bakım",
                        text: 'Bu sorgu bakımdadır.'
                    })
                }
            })
        }
    </script>

</div>
<!--BİTİŞ-->

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
<?php } ?>
<?php if($userInfo['userRole'] == 2) {?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Adres Sorgu v2</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Adres Sorgu v2</li>
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