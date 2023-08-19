<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Araç Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/lexas">Lexas</a></li>
                        <li class="breadcrumb-item active">Araç Sorgu</li>
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
                    Araç Sorgu
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <h5 class="fs-14 mb-3 text-muted">Araç durumu sorgulanacak kişinin TC Kimlik numarasını
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
                                <th>DOĞUM TARİHİ</th>
                                <th>DOĞUM YERİ</th>
                                <th>CİLT NO</th>
                                <th>SIRA NO</th>
                                <th>AİLE SIRA NO</th>
                                <th>SERİ NO</th>
                                <th>E-POSTA</th>
                                <th>GSM</th>
                                <th>ADRES</th>
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
                    <h5 class="card-title mb-0">Güncel Araçlar:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>AZAMİ TOPLAM AĞIRLIK</th>
                                <th>CİNS</th>
                                <th>MARKA / MODEL</th>
                                <th>MOTOR GÜCÜ</th>
                                <th>PLAKA NUMARASI</th>
                                <th>SİLİNDİR HACMİ</th>
                                <th>TİP</th>
                            </tr>
                        </thead>
                        <tbody id="guncelAraclar">
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
                    <h5 class="card-title mb-0">Geçmiş Araçlar:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>AZAMİ TOPLAM AĞIRLIK</th>
                                <th>CİNS</th>
                                <th>MARKA / MODEL</th>
                                <th>MOTOR GÜCÜ</th>
                                <th>PLAKA NUMARASI</th>
                                <th>SİLİNDİR HACMİ</th>
                                <th>TERK DURUM</th>
                                <th>TERK TARİH</th>
                                <th>TİP</th>
                            </tr>
                        </thead>
                        <tbody id="gecmisAraclar">
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
        $('#guncelAraclar').html('<td valign="top" colspan="10" class="dataTables_empty"></td>');
        $('#gecmisAraclar').html('<td valign="top" colspan="10" class="dataTables_empty"></td>');
        showAlert("Başarıyla temizlendi.", "success");
    }

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
                    
                    // KİŞİSEL BİLGİLER
                    let array = [];
                    var tcNo = res.tcNo;
                    var dogumTarih = res.dogumTarihi;
                    var dogumYeri = res.dogumYeri;
                    var ciltNo = res.ciltNo;
                    var siraNo = res.siraNo;
                    var aileSira = res.aileSiraNo;
                    var seriNo = res.seriNo;
                    var mails = res.emails;
                    var phoneNums = res.phoneNums;
                    var adres = `${res.adress.mahalleSemt} ${res.adress.caddeSokak} DIŞ KAPI: ${res.adress.disKapiNo} İÇ KAPI: ${res.adress.icKapiNo} ${res.adress.ilceAdi} ${res.adress.ilAdi}`;
                    var result = `<tr>
                        <td>${tcNo}</td>
                        <td>${dogumTarih}</td>
                        <td>${dogumYeri}</td>
                        <td>${ciltNo}</td>
                        <td>${siraNo}</td>
                        <td>${aileSira}</td>
                        <td>${seriNo}</td>
                        <td>${mails}</td>
                        <td>${phoneNums}</td>
                        <td>${adres}</td>
                    </tr>`
                    array.push(result);
                    $('#kisiselBilgiler').html(array);

                    // GÜNCEL ARAÇLAR
                    // <th>AZAMİ TOPLAM AĞIRLIK</th>
                    // <th>CİNS</th>
                    // <th>MARKA MODEL</th>
                    // <th>MOTOR GÜCÜ</th>
                    // <th>PLAKA NUMARASI</th>
                    // <th>SİLİNDİR HACMİ</th>
                    // <th>TİP</th>

                    var data1 = res.guncel_araclar.data.araclar;

                    var array2 = [];
                    data1.forEach(bilgi => {
                        var azamiTopAgirlik = bilgi.azamiTopAgirlik;
                        var cins = bilgi.cins;
                        var markamodel = `${bilgi.marka} / ${bilgi.model}`;
                        var motorGucu = bilgi.motorGucu;
                        var plakaNo = bilgi.plakaNo;
                        var silindirHacmi = bilgi.silindirHacmi;
                        var tip = bilgi.tip;
                        var result1 = `<tr>
                            <td>${azamiTopAgirlik}</td>
                            <td>${cins}</td>
                            <td>${markamodel}</td>
                            <td>${motorGucu}</td>
                            <td>${plakaNo}</td>
                            <td>${silindirHacmi}</td>
                            <td>${tip}</td>
                        </tr>`
                        array2.push(result1);
                    })
                    $('#guncelAraclar').html(array2);

                    var data2 = res.gecmis_araclar.data.araclar;

                    var array3 = [];
                    data2.forEach(bilgi2 => {
                        var azamiTopAgirlik2 = bilgi2.azamiTopAgirlik;
                        var cins2 = bilgi2.cins;
                        var markamodel2 = `${bilgi2.marka} / ${bilgi2.model}`;
                        var motorGucu2 = bilgi2.motorGucu;
                        var plakaNo2 = bilgi2.plakaNo;
                        var silindirHacmi2 = bilgi2.silindirHacmi;
                        var terkDurum2 = bilgi2.terkDurum;
                        var terkTarih2 = bilgi2.terkTarih;
                        var tip2 = bilgi2.tip;
                        var result2 = `<tr>
                            <td>${azamiTopAgirlik2}</td>
                            <td>${cins2}</td>
                            <td>${markamodel2}</td>
                            <td>${motorGucu2}</td>
                            <td>${plakaNo2}</td>
                            <td>${silindirHacmi2}</td>
                            <td>${terkDurum2}</td>
                            <td>${terkTarih2}</td>
                            <td>${tip2}</td>
                        </tr>`
                        array3.push(result2);
                    })
                    $('#gecmisAraclar').html(array3);

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