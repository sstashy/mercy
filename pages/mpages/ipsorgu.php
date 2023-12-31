<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">İP Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">İP Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->

             
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">
 <i class="fas fa-map-marked-alt"> IP SORGU</i>
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
<b style="color:white;">Merkezi Nüfus İdaresi Sistemi veritabanı sorgu bölümünde aradığınız kişileri IP Adresi ile sorgulayabilirsiniz.</b>
</h2>

</div>
</div>




  <div class="card">
                                        <div class="card-body">


<h5><b>- IP adresi ile ne yapabilirim ?</b></h5>
<p>
    <b>İstediğiniz kişinin Adresine ve cihazına sızıp, veri aktarımı yapabilirsiniz.</b>
</p>


<h5><b> - Neden IP sorguda Açık adresi göremiyorum ?</b></h5>
<p>
    <b>Diğer sunucuları deneyebilir veya Harita üzerinden kullanabilirsiniz.</b>
</p>

<h5><b>Kendi IP Adresiniz ;</b></h5>
<p><?php

                                                   $IPaddress=$_SERVER['REMOTE_ADDR'];     
                                                   echo "<b>".$IPaddress."</b> ";

                                                      ?>
</p>
					    			     
										
                                <form action="" method="post">

<div class="tab-pane active" id="tc" role="tabpanel">
                         <div class="mb-3 input-group">
                        <input type="text" maxlength="18" class="form-control" name="ip_adresi" id="number" placeholder="IP Adresi" required><br>
                        </div>
                       
                                </div>

                                <br>
					<center>
                   <button type="submit" name="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula</button></form>
<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><a href="ipsorgu.php" class="text-white"> Sıfırla </a></button>
<button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Yazdır Detay</button><br><br>
                </center>
                        
 </div>
  </div>
                                </div>
                            </div>
							</div>
								</div>
							
	<div class="col-xl-12 col-md-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									
										<div class="table-responsive">
                                            <table class="table mb-0">
        
                                                <thead class="thead-light">
<tr>
<th scope="col">IP</th>
<th scope="col">Ülke</th>
<th scope="col">Ülke Kodu</th>
<th scope="col">Bölge</th>
<th scope="col">Bölge Kodu</th>
<th scope="col">Şehir</th>
<th scope="col">Posta Kodu</th>
<th scope="col">Enlem</th>
<th scope="col">Boylam</th>
<th scope="col">Zaman Dilimi</th>
<th scope="col">ISP</th>
<th scope="col">Organizasyon</th>
<th scope="col">As Numarası/Adı</th>
<th scope="col">Harita</th>
</tr>
                            </thead>
                        
                            <tr>
                                	<?php
        if(isset($_POST['sorgula'])) {
            //JSON Veriyi çek ve çöz
            $ip_bilgi = file_get_contents('http://ip-api.com/json/'.$_POST['ip_adresi']);
            $json_coz = json_decode($ip_bilgi, true);
            ?>
                  
<tbody>
<td><?php echo $json_coz['query']; ?> </td>

<td><?php echo $json_coz['country']; ?> </td>

<td><?php echo $json_coz['countryCode']; ?> </td>

<td><?php echo $json_coz['regionName']; ?> </td>

<td><?php echo $json_coz['region']; ?> </td>

<td><?php echo $json_coz['city']; ?> </td>

<td><?php echo $json_coz['zip']; ?> </td>

<td><?php echo $json_coz['lat']; ?> </td>

<td><?php echo $json_coz['lon']; ?> </td>

<td><?php echo $json_coz['timezone']; ?> </td>

<td><?php echo $json_coz['isp']; ?> </td>
	
<td><?php echo $json_coz['org']; ?> </td>

<td><?php echo $json_coz['as']; ?> </td>

<td><?php  echo '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script><div style="overflow:hidden;height:240px;width:500px;"><div id="gmap_canvas" style="height:440px;width:700px;"></div><div><small><a href="embed google map">http://embedgooglemaps.com</a></small></div><div><small><a href="https://googlemapsgenerator.com">embed google maps</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript">function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(39.9333635,32.85974190000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng('.$json_coz['lat'].','.$json_coz['lon'].')});infowindow = new google.maps.InfoWindow({content:"<strong>'.$json_coz['query'].'</strong><br>'.$json_coz['city'].', '.$json_coz['country'].'<br>"});google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, "load", init_map);</script> '; } ?> </td>

</tbody>       
</tbody>
</table>



</div>

                            </div>
                                        </div>
									
                                    </div>
                                </div>
                            </div>
							</div>
							
                        </div>
				
				</div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
                </div>

    </div>
    