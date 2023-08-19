<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">TTNET Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">TTNET Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->

<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">TTNET Sorgu</h4>
                    <p class="mb-1">
                    <p>
                        Sorgulanacak Kişinin Adını ve Soyadını Giriniz.</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="ADSOYAD" role="tabpanel">
                            <input class="form-control" type="text" id="as" placeholder="AD SOYAD"><br>
                            <div style="display: flex; flex-direction: row;">
                        </div>
                        <center>
                            <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-danger waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sıfırla </button><br><br>
                           
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>AD-SOYAD</th>
                                        <th>GSM</th>
                                        <th>TELEFON1</th>
                                        <th>TELEFON2</th>
                                        <th>E-MAİL</th>
                                        <th>ADRES</th>
                                        <th>ŞEHİR</th>
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
            document.getElementById("as").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var ADSOYAD = $("#as").val();
 
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/ttnet/api.php",
                type: "POST",
                data: {
                    ADSOYAD: ADSOYAD,
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
                            var ADSOYAD = data.ADSOYAD;
                            var GSM = data.GSM;
                            var Telefon = data.Telefon;
                            var Telefonu = data.Telefonu;
                            var eposta = data.EPOSTA;
                            var adres = data.ADRES;
                            var sehir = data.SEHIR;

                            result = "<tr>" +
                                "<th>" +
                                ADSOYAD +
                                "</th>" +
                                "<th>" +
                                GSM +
                                "</th>" +
                                "<th>" +
                                Telefon +
                                "</th>" +
                                "<th>" +
                                 Telefonu +
                                "</th>" +
                                "<th>" +
                                eposta +
                                "</th>" +
                                "<th>" +
                                adres +
                                "</th>" +
                                "<th>" +
                                sehir +
                                "</th>" +
                                "<th>";


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
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.'
                    })
                }
            })
        }
    </script>

</div>
