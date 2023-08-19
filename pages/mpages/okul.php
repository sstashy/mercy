<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Okul Vesika Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">Okul Vesika Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- ============================================================== -->
    <!-- BURA -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Okul Vesika Sorgu
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <h5 class="fs-14 mb-3 text-muted">Okul durumu sorgulanacak kişinin TC Kimlik numarasını giriniz.
                        </h5>
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiters" class="form-label">TC</label>
                                        <input type="text" maxlength="11" id="tcInput" class="form-control" id="cleave-delimiters">
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div class="col-xl-12">
                                <div class="mt-0">
                                    <button type="button" onclick="kontrolEt()"
                                        class="btn w-sm btn-primary waves-effect waves-light">Sorgula</button>
                                    <button type="button" onclick="clearRow('#tcInput', '#tbody')"
                                        class="btn w-sm btn-light waves-effect waves-light">Temizle</button>
                                </div>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sonuç:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>TC</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>DURUMU</th>
                                <th>OKUL TÜRÜ</th>
                                <th>ALANI</th>
                                <th>ŞUBE ADI</th>
                                <th>OKUL NUMARASI</th>
                                <th>MEZUN OLDUĞU OKUL</th>
                                <th>DİPLOMA PUANI</th>
                                <th>VESİKALIK</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <!-- TBODY -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
</div>

<script>
    function kontrolEt() {
        checkRow('tcInput');
        $.ajax({
            url: "api/okul/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                if (res.ADI != null) {
                    showAlert("Sonuç bulundu.", "success");
                    hideToast();
                    let array = [];
                    var tc = res.TC;
                    var ad = res.ADI || "Bulunamadı";
                    var soyad = res.SOYADI || "Bulunamadı";
                    var durumu = res.DURUMU || "Bulunamadı";
                    var okulTuru = res.OKULTURU || "Bulunamadı";
                    var alani = res.ALANI || "Bulunamadı";
                    var subeAdi = res.SUBEADI || "Bulunamadı";
                    var okulNo = res.OKULNO || "Bulunamadı";
                    var mezunOkul = res.MEZUNOKUL || "Bulunamadı";
                    var diplomaPuani = res.DIPLOMAPUANI || "Bulunamadı";
                    var image = res.Image || "<?=SITEURL?>assets/images/lexas-logo.png";
                    var result = `<tr>
                        <th>${tc}</th>
                        <th>${ad}</th>
                        <th>${soyad}</th>
                        <th>${durumu}</th>
                        <th>${okulTuru}</th>
                        <th>${alani}</th>
                        <th>${subeAdi}</th>
                        <th>${okulNo}</th>
                        <th>${mezunOkul}</th>
                        <th>${diplomaPuani}</th>
                        <th>
                            <img src="data:image/png;base64, ${image}" class="rounded-start image-popup" width="200" height="200" id="uni-img" alt="eokul-vesika" href="#">
                        </th>
                    </tr>`
                    array.push(result);
                    $('#tbody').html(array);
                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "danger");
                }
            },
            error: (res) => {
                hideToast();
                showAlert("Bir hata oluştu! Lütfen yetkili biri ile iletişime geçin.", "danger");
            }
        })
    }
</script>