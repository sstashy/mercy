<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Vergi Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">Vergi Sorgu</li>
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
                    Vergi Sorgu
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <h5 class="fs-14 mb-3 text-muted">Vergi durumu sorgulanacak kişinin TC Kimlik numarasını
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
                                    <button type="button" onclick="clearRow('#tcInput', '#vergiTable')"
                                        class="btn w-sm btn-light waves-effect waves-light">Temizle</button>
                                </div>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

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
                                    <th>VERGİ KODU</th>
                                    <th>VERGİ ADI</th>
                                    <th>VERGİ KISA ADI</th>
                                    <th>VERGİ NUMARASI</th>
                                    <th>TAHSİLAT GRUP TİPİ</th>
                                </tr>
                            </thead>
                            <tbody id="vergiTable">
                            </tbody>
                        </table>
                    </div>
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
            url: "api/devlet/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                if(res) {
                    hideToast();
                    showAlert("Sonuç bulundu.", "success");
                    
                    var data = res.borc_isimleri.data[0].values;

                    // <th>VERGİ KODU</th>
                    // <th>VERGİ ADI</th>
                    // <th>VERGİ KISA ADI</th>
                    // <th>VERGİ NUMARASI</th>
                    // <th>TAHSİLAT GRUP TİPİ</th>

                    let array = [];
                    
                    var vergi_no = res.borc_sorgu.data.data[0].vergiNo
                    
                    data.forEach(bilgi => {
                        var vergiKod = bilgi.vergiKodu
                        var vergiAdi = bilgi.vergiAdi
                        var vergiKisaAdi = bilgi.vergiKisaAdi
                        var tahsilatGrupTipi = bilgi.tahsilatGrupTipi
                        
                        var result = `<tr>
                            <td>${vergiKod}</td>
                            <td>${vergiAdi}</td>
                            <td>${vergiKisaAdi}</td>
                            <td>${vergi_no}</td>
                            <td>${tahsilatGrupTipi}</td>
                        </tr>`
                        array.push(result);
                    });
                    $('#vergiTable').html(array);

                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "danger");
                }
            },
            error: (res) => {
                hideToast();
                showAlert("Bir sonuç bulunamadı.", "danger");
            }
        })
    }
</script>