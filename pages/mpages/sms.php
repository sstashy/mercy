<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">SMS Boomer</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">SMS Boomer</li>
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
                    <h4 class="card-title mb-4">SMS Boomer (BETA) </h4>
                    <p class="mb-1">
                    <p>
                       SMS Bomber V2 yazdığınız numaraya 12 markadan 30 tane sms gönderir.</br></br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                                <input class="form-control" type="text" id="numara" placeholder="Numara gir +90 olmadan birleşik"><br>
                        </div>
                        <center class="nw">
                             <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">SMS Gönder<span id="sorgulanumber"></span></button>
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>

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
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var numara = $("#numara").val();
            $.Toast.showToast({
                "title": "SMS Atılıyor Geç Gelebilir!",
                "icon": "loading",
                "duration": 1000
            });
            $.ajax({
                url: "../api/sms/api.php",
                type: "POST",
                data: {
                    numara: numara
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
                            var anneadi = data.ANNEADI;
                            var annetc = data.ANNETC;
                            var babaadi = data.BABAADI;
                            var babatc = data.BABATC
                            var nufusilce = data.NUFUSILCE;
                            var nufusil = data.NUFUSIL;
                            var uyruk = data.UYRUK;

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
                                anneadi +
                                "</th>" +
                                "<th>" +
                                annetc +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                babatc +
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
                                uyruk +
                                "</th>";

                            array.push(result);

                        }

                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'succes',
                            title: 'SMS Gönderildi!',
                            text: 'SMS Başarıyla Gönderildi!',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "SMS Gönderildi!",
                        text: 'SMS Başarıyla gönderildi!'
                    })
                }
            })
        }
    </script>

</div>
