<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Kütük Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">Kütük Sorgu</li>
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
                    <h4 class="card-title mb-0">Kütük Sorgu</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <h5 class="fs-14 mb-3 text-muted">Kütüğü sorgulanacak kişinin TC Kimlik numarasını giriniz.</h5>
                    <form action="#">
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-2">
                                        <label for="cleave-delimiters" class="form-label">TC</label>
                                        <input type="text" id="tcInput" maxlength="11" class="form-control" id="cleave-delimiters">
                                    </div>
                                </div><!-- end col -->

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
                                <th>ID</th>
                                <th>YAKINLIK</th>
                                <th>TC</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>DOĞUM TARİHİ</th>
                                <th>İL / İLÇE</th>
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
            url: "api/kutuk/api.php",
            type: "POST",
            timeout: 7000,
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                hideToast();
                if(res) {
                    showAlert("Sonuç bulundu.", "success");
                    let array = [];
                    for(let i = 0; i < res.length; i++) {
                        let data = res[i];
                        var numara = i + 1;
                        var yakinlik = data.Yakınlık || "Bulunamadı";
                        var tc = data.TcKm || "Bulunamadı";
                        var ad = data.Adı || "Bulunamadı";
                        var soyad = data.Soyadı || "Bulunamadı";
                        var dogumtarihi = data['DoğumGünü'] || "Bulunamadı";
                        var il = data['Nufüsil'] || "Bulunamadı";
                        var ilce = data['Nufüsilçe'] || "Bulunamadı";
                        var ililce = `${il} / ${ilce}`;
                        var result = `<tr>
                            <td>${numara.toString()}</td>
                            <td>${yakinlik}</td>
                            <td>${tc}</td>
                            <td>${ad}</td>
                            <td>${soyad}</td>
                            <td>${dogumtarihi}</td>
                            <td>${ililce}</td>
                        </tr>`
                        array.push(result);
                    }
                    $('#tbody').html(array);
                } else if (res.Status == false) {
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