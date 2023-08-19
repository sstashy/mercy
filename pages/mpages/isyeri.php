<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">İş Yeri Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">İş Yeri Sorgu</li>
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
                    İş Yeri Sorgu
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <h5 class="fs-14 mb-3 text-muted">İş durumu sorgulanacak kişinin TC Kimlik numarasını
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
                                    <button type="button" onclick="datatbTemizle()"
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
                    <h5 class="card-title mb-0">Kişisel Bilgiler:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>TC</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>İŞ YERİ ADRESİ</th>
                                <th>İKAMETGAH</th>
                                <th>VERGİ NUMARASI</th>
                            </tr>
                        </thead>
                        <tbody id="kisiselBilgiler">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Aktif Meslekler:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>MESLEK ADI</th>
                                <th>BAŞLAMA TARİHİ</th>
                            </tr>
                        </thead>
                        <tbody id="aktifMeslekler">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pasif Meslekler:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>MESLEK ADI</th>
                                <th>BAŞLAMA TARİHİ</th>
                                <th>BİTİŞ TARİHİ</th>
                            </tr>
                        </thead>
                        <tbody id="pasifMeslekler">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
</div>

<script>

    function datatbTemizle() {
        $('#tcInput').val("");
        $('#kisiselBilgiler').html('<td valign="top" colspan="10" class="dataTables_empty"></td>');
        $('#aktifMeslekler').html('<td valign="top" colspan="10" class="dataTables_empty"></td>');
        $('#pasifMeslekler').html('<td valign="top" colspan="10" class="dataTables_empty"></td>');
        showAlert("Başarıyla temizlendi.", "success");
    }

    function kontrolEt() {
        checkRow('tcInput');
        $.ajax({
            url: "api/isyeri/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                if(res) {
                    hideToast();
                    showAlert("Sonuç bulundu.", "success");
                    
                    // KİŞİSEL BİLGİLER
                    let array = [];
                    
                    let data = res.extraData;

                    var tcNo = data.tcKimlikNo;
                    var ad = data.ad;
                    var soyad = data.soyad;
                    var isYeriAdresi = data.ikametgahAdresi.isyeriAdresi || "BULUNAMADI";
                    var ikametgah = data.ikametgahAdresi.evAdresi;
                    var vergiNo = data.vergiNo;
                    var result = `<tr>
                        <td>${tcNo}</td>
                        <td>${ad}</td>
                        <td>${soyad}</td>
                        <td>${isYeriAdresi}</td>
                        <td>${ikametgah}</td>
                        <td>${vergiNo}</td>
                    </tr>`
                    array.push(result);
                    $('#kisiselBilgiler').html(array);

                    var data1 = data.kayitliOlduguVDMeslekler;
                    var array2 = [];
                    data1.forEach(bilgi => {
                        var meslekAdi = bilgi.pasifMeslekler[0].ad;
                        var meslekBaslama = bilgi.pasifMeslekler[0].baslamaTarihi;
                        var meslekBitis = bilgi.pasifMeslekler[0].bitisTarihi;

                        var result1 = `<tr>
                            <td>${meslekAdi}</td>
                            <td>${meslekBaslama}</td>
                            <td>${meslekBitis}</td>
                        </tr>`
                        array2.push(result1);
                    });
                    $('#pasifMeslekler').html(array2);

                    var data2 = data.kayitliOlduguVDMeslekler;

                    var array3 = [];
                    data2.forEach(bilgi2 => {
                        var meslekAdi2 = bilgi2.aktifMeslekler[0].ad;
                        var meslekBaslama2 = bilgi2.aktifMeslekler[0].baslamaTarihi;

                        var result2 = `<tr>
                            <td>${meslekAdi2}</td>
                            <td>${meslekBaslama2}</td>
                        </tr>`
                        array3.push(result2);
                    })
                    $('#aktifMeslekler').html(array3);

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