<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Facebook Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">Facebook Sorgu</li>
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
                    <h4 class="card-title mb-4">Facebook Sorgu</h4>
                    <p class="mb-1">
                    <p>
                        Sorgulanacak Kişinin Adı, Soyadı Veya GSM Nosunu Giriniz. (GSM Girerken +90 Formatında Giriniz.)</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="gsm" role="tabpanel">
                            <input class="form-control" type="text" id="gsmno" placeholder="GSM"><br>
                            <div style="display: flex; flex-direction: row;">
                                <input style="margin-right: 50px;" class="form-control" type="text" id="ad" placeholder="Ad"><br>
                                <input class="form-control" type="text" id="soyad" placeholder="Soyad"><br>
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
                                        <th>İD</th>
                                        <th>ADI</th>
                                        <th>SOYADI</th>
                                        <th>GSM</th>
                                        <th>E-MAİL</th>
                                        <th>DOĞUM TARİHİ</th>
                                        <th>CİNSİYET</th>
                                        <th>YEREL</th>
                                        <th>ŞEHİR</th>
                                        <th>KONUM</th>
                                        <th>LİNK</th>
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
            document.getElementById("gsmno").value = "";
            document.getElementById("ad").value = "";
            document.getElementById("soyad").value = "";
            document.getElementById("email").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var gsm = $("#gsmno").val();
            var ad = $("#ad").val();
            var soyad = $("#soyad").val();
            var email = $("#email").val();
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/facebook/api.php",
                type: "POST",
                data: {
                    gsm: gsm,
                    ad: ad,
                    soyad: soyad,
                    email: email
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
                            var id = data.id;
                            var gsm = data.AD;
                            var name = data.SOYAD;
                            var surname = data.NUMARA;
                            var email = data.email
                            var birthday = data.birthday
                            var gender = data.gender
                            var locale = data.locale
                            var hometown = data.hometown
                            var location = data.location
                            var link = data.link


                            result = "<tr>" +
                                "<th>" +
                                id +
                                "</th>" +
                                "<th>" +
                                gsm +
                                "</th>" +
                                "<th>" +
                                name +
                                "</th>" +
                                "<th>" +
                                surname +
                                "</th>" +
                                "<th>" +
                                email +
                                "</th>" +
                                "<th>" +
                                birthday +
                                "</th>" +
                                "<th>" +
                                gender +
                                "</th>" +
                                "<th>" +
                                locale +
                                "</th>" +
                                "<th>" +
                                hometown +
                                "</th>" +
                                "<th>" +
                                location +
                                "</th>" +
                                "<th>" +
                                link +
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
