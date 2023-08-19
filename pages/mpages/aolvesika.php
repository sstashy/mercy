<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Açıköğretim Vesika Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">Açıköğretim Vesika Sorgu</li>
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
                        Açıköğretim Vesika Sorgu
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <h5 class="fs-14 mb-3 text-muted">Açıköğretim durumu sorgulanacak kişinin TC Kimlik numarasını
                            giriniz.</h5>
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiters" class="form-label">TC</label>
                                        <input type="text" id="tcInput" maxlength="11" class="form-control" id="cleave-delimiters">
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
                                <th>OKUL NUMARASI</th>
                                <th>ANNE ADI</th>
                                <th>BABA ADI</th>
                                <th>OKUL ALAN</th>
                                <th>VESİKALIK</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
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
            url: "api/aol/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                if (res.success == true) {
                    showAlert("Sonuç bulundu.", "success");
                    hideToast();
                    let array = [];
                    var tc = $('#tcInput').val();
                    var ad = res.name || "Bulunamadı";
                    var soyad = res.surname || "Bulunamadı";
                    var babaadi = res.fathername || "Bulunamadı";
                    var anneadi = res.mothername || "Bulunamadı";
                    var school = res.school || "Bulunamadı";
                    var ogrencino = res.ogrencino || "Bulunamadı";
                    var image = res.image || "<?=SITEURL?>assets/images/lexas-logo.png";
                    var result = `<tr>
                        <th>${tc}</th>
                        <th>${ad}</th>
                        <th>${soyad}</th>
                        <th>${ogrencino}</th>
                        <th>${anneadi}</th>
                        <th>${babaadi}</th>
                        <th>${school}</th>
                        <th>
                            <img src="data:image/png;base64, ${image}" class="rounded-start image-popup" width="200" height="200" id="uni-img" alt="aol-vesika" href="#">
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