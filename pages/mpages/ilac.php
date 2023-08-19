
    <!-- ============================================================== -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">İLAC Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/illegalekipinvite/wscheck">Greengo</a></li>
                        <li class="breadcrumb-item active">İLAC Sorgu</li>
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
                <h4 class="card-title mb-4" style="color: white !important;">
    İLAÇ SORGU
</h4>
                    <p class="mb-1">
                    <p>
                        Recetesini öğrenmek istediğiniz kişinin TC kimlik numarasını giriniz.</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="11" class="form-control" type="text" name="tc" id="tcno" placeholder="TC"><br>
                            
                            </div>
                            <div class="col-xl-6">
                                <div class="mt-0">

                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn w-sm btn-primary waves-effect waves-light" style="float:left;"> Sorgula <span id="sorgulanumber"></span></button>
      </td>
      <td>&nbsp;&nbsp;</td>
      <td>
        <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-light waves-effect"> Temizle </button>

                        </div>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    <div class="row">
        <div class="col-lg-12">
<div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sonuç:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal"class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
<th>Adet</th>
<th>ReceteNo</th>
<th>ReceteTarihi</th>
<th>VerilebilecegiTarih</th>
<th>İlacAdi</th>
<th>İlacAlimTarihi</th>
<th>İlacKullanimi</th>
</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									                    <?php
                    
                    if($_POST){
                        $tc = $_POST['tc'];
                        $ilacapiurl = "http://greengo.apis/apiler/ilac.php?auth=qwewqe23&tc=" . $tc;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $ilacapiurl);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $people_json = curl_exec($ch);
                        $decoded_json = json_decode($people_json, true);
                        if(isset($decoded_json['ilacList'])) {
                            $customers = $decoded_json['ilacList'];
                            foreach($customers as $customer) {
                                $Adet = $customer['Adet'];
                                $ReceteNo = $customer['ReceteNo'];
                                $ReceteTarihi = $customer['ReceteTarihi'];
                                $VerilebilecegiTarih = $customer['VerilebilecegiTarih'];
                                $İlacAdi = $customer['İlacAdi'];
                                $İlacAlimTarihi = $customer['İlacAlimTarihi'];
                                $İlacKullanimi = $customer['İlacKullanimi'];
                                echo "<tr style='color:white;'><th>".$Adet."</th> <th>".$ReceteNo."</th> <th>".$ReceteTarihi."</th> <th>".$VerilebilecegiTarih."</th> <th>".$İlacAdi."</th> <th>".$İlacAlimTarihi."</th> <th>".$İlacKullanimi."</th></tr>";
                            }
                        } else {
                            echo "<p>İlaç listesi bulunamadı.</p>";
                        }
                        curl_close($ch);
                    }
                   
                    
                    ?>
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
                $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
                $("#tcno").val("");
            }

            function checkNumber() {
                /*
                return Swal.fire({
                    icon: "warning",
                    title: "Oooooopss...",
                    text: "Bu çözüm şu an bakımdadır!"
                });
                */

                var roleNumber = "<?= $k_rol ?>";

                if (parseInt(roleNumber) == 0 || parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2 || parseInt(roleNumber) == 3 || parseInt(roleNumber) == 4 || parseInt(roleNumber) == 5 || parseInt(roleNumber) == 6 || parseInt(roleNumber) == 7) {

                    var tc = $("#tcno").val();
                    $.Toast.showToast({
                        "title": "Sorgulanıyor...",
                        "icon": "loading",
                        "duration": 60000
                    });
                    $.ajax({
                        url: "../api/lexas/adres.php",
                        type: "GET",
                        timeout: 10000,
                        data: {
                            tc: tc,
                            auth_key: "zweqallah"
                        
                        },
                        success: (res) => {
                            var json = res;
                            if (json[0].FirmTitle) {
                                $.Toast.hideToast();
                                var ad = json[0].FirmTitle;
                                var plaka = json[0].CityId;
                                var ilce = json[0].Town;
                                var mekan = json[0].TaxOffice;
                                var adres = json[0].Address;
                                $("#jojjoojj").html(
                                    `<tr> <th> ${ad} </th> <th> ${plaka} </th> <th> ${ilce} </th> <th> ${mekan} </th> <th> ${adres} </th> </tr>`
                                )
                            } else {
                                $.Toast.hideToast();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Bulunamadı!',
                                    text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
                    })
                }
            }
        </script>


    </div>