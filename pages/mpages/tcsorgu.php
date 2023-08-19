<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">TC Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://discord.gg/mercypro">Mercypro</a></li>
                        <li class="breadcrumb-item active">TC Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
<div class="overlay">
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">

</h2>

</div>
</div>


<br>
		
 <div class="card">
                                        <div class="card-body">
                                        

<p>
<h4 class="card-title mb-4">TC SORGU</h4>
<p class="mb-1">
                    <p>
                        Sorgulanacak kişinin T.C Nosunu giriniz.
                    
</p>

                        <form method="POST" action="">
                                  
                                   <input class="form-control" type="text" name="ikibinonbestc"  id="ikibinonbestc" placeholder="TC"><br>                                                                  
</div>

<center>
                            <button onclick="checkNumber()" id="sorgula" name="yolla"  class="btn w-sm btn-primary waves-effect waves-light" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"> Sorgula <span id="sorgulanumber"></span></button><br><br>
                            
                        </center>
      </div>
      
       <?php
$link = mysqli_connect("127.0.0.1", "root", "", "101m");


if($link){
  
}
if(!$link){echo "<h1>Bağlanılmadı</h1>";
} 

if ( isset($_POST['ikibinonbesad']))

if ( isset($_POST['ikibinonbesadil']))


$port = $_POST["ikibinonbesad"];
if ( isset($_POST['ikibinonbessoyad']))
$time = $_POST["ikibinonbessoyad"];
if ( isset($_POST['ikibinonbestc']))
if ( isset($_POST['ikibinonbesadil']))
$il_sorgu = $_POST["ikibinonbesadil"];
if ( isset($_POST['ikibinonbestc']))
 $tc_sorgu = $_POST["ikibinonbestc"];
 
 @ $sql = "SELECT * FROM 101m WHERE TC='$tc_sorgu' ;"; 
 

if(isset($_POST['yolla']))

if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";
}

?>
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">

</h2>

</div>
</div>


<br>
		
 <div class="card">
                                        <div class="card-body">
                                        
									
										<div class="table-responsive">
                                            <table class="table mb-0">
        


                  <tr>
                       
<?php
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";    
    if(mysqli_num_rows($result) > 0){ ?>

    <script>
    $(document).ready(function(){
      $('#Sorgu').toast('show');
    });
    </script>
   <?php 
        while($row = mysqli_fetch_array($result)){
            echo '                                             <thead class="thead-light">
<tr>
<th scope="col">T.C.</th>
<th scope="col">Adı</th>
<th scope="col">Soyadı</th>
<th scope="col">Doğum Tarihi</th>
<th scope="col">İl</th>
<th scope="col">İlçe</th>
<th scope="col">Anne Adı</th>
<th scope="col">Anne T.C.</th>
<th scope="col">Baba Adı</th>
<th scope="col">Baba T.C.</th>
<th scope="col">UYRUK</th>
</tr>
                            </thead>';
            echo "    <td>" . $row['TC'] . "</td>";
            echo "    <td>" . $row['ADI'] . "</td>";
            echo "    <td>" . $row['SOYADI'] . "</td>";
            echo "    <td>" . $row['DOGUMTARIHI'] . "</td>";
            echo "    <td>" . $row['NUFUSIL'] . "</td>";
            echo "    <td>" . $row['NUFUSILCE'] . "</td>";
            echo "    <td>" . $row['ANNEADI'] . "</td>";
            echo "    <td>" . $row['ANNETC'] . "</td>";
            echo "    <td>" . $row['BABAADI'] . "</td>";
            echo "    <td>" . $row['BABATC'] . "</td>";
            echo "    <td>" . $row['UYRUK'] ."<br>". "</td>";
       
        ?>

<?php    }?>
<?php   echo " </table>";
        echo "</div>";
        
        ?>
<?php
        echo "</table>";
        mysqli_free_result($result);
    } else{ ?>
          
       <?php
    }
} else{ ?>


<?php    
}
 
mysqli_close($link);
?>
 </table>
        </tbody>
        </div>
        </div>
    
        </div>
        </div>
    
    