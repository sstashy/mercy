<?php

ob_start();
@session_start();
error_reporting(0);

$host = 'localhost';
$kullanici = 'root';
$sifre = '';
$db_isim = '101m';

$conn = new MySQLi($host, $kullanici, $sifre, $db_isim);
mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
	die('Veritabanı Bağlantısı Hatası: ' . $conn->connect_error);
}

   
        if(!isset($_GET['tc'])){
            echo json_encode([ "success" => "false", "message" => "HATA" ]);
            return;
        }
        $tc = trim(htmlspecialchars($_GET['tc']));
        
      $sql = "SELECT * FROM `101m` WHERE `TC` = '$tc'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

          $kendisi = array();
           $kendisi[]  = $row;
            $babatcsi = $row['BABATC'];
            $annetcsi = $row['ANNETC'];
            $kenditc = $row['TC'];

            //BABASI
            $babası = array();
            $sql = "SELECT * FROM `101m` WHERE `TC` = '$babatcsi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $babası[] = $row;
                $babasınınbabatc = $row['BABATC'];
                $babasınınannetc = $row['ANNETC'];
            }

            //ANNESİ
            $annesı = array();
            $sql = "SELECT * FROM `101m` WHERE `TC` = '$annetcsi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $annesı[] = $row;
                $annesininbabatc = $row['BABATC'];
                $annesininannetc = $row['ANNETC'];
            }
            //cocukları
            $cocukları = array();
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$kenditc' OR `ANNETC` = '$kenditc'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $cocukları[] = $row;
                }
            }




            //kardeşleri
            $kardeşleri = array();
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$babatcsi' AND `ANNETC` = '$annetcsi' AND `TC` != '$kenditc'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $kardeşleri[] = $row;
                }
            }

            //babasının kardeşleri
            $babasınınkardeşleri = array();
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$babasınınbabatc' AND `ANNETC` = '$babasınınannetc' AND `TC` != '$babatcsi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $babasınınkardeşleri[] = $row;
                    $babasınınkardeşleritc = $row['TC'];
                   
                }
            }

            //annesinin kardeşleri
            $annesininkardeşleri = array();
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$annesininbabatc' AND `ANNETC` = '$annesininannetc' AND `TC` != '$annetcsi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $annesininkardeşleri[] = $row;
                    $annesininkardeşleritc = $row['TC'];
                }
            }
            
            //babatarafı kuzenleri
            $kuzenleri = array();
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$babasınınkardeşleritc' OR `ANNETC` = '$babasınınkardeşleritc' AND `TC` != '$babasınınkardeşleritc'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $kuzenleri[] = $row;
                }
            }

            //annetarafı kuzenleri
            $sql = "SELECT * FROM `101m` WHERE `BABATC` = '$annesininkardeşleritc' OR `ANNETC` = '$annesininkardeşleritc' AND `TC` != '$annesininkardeşleritc'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $kuzenleri[] = $row;
                }
            }


            
           




            echo json_encode([ "success" => "true", "message" => "tc bulundu", "kendisi" => $kendisi, "annesi" => $annesı, "babasi" => $babası, "cocuklar" => $cocukları, "kardesler" => $kardeşleri , "babakardesler" => $babasınınkardeşleri, "annekardesler" => $annesininkardeşleri , "kuzenler" => $kuzenleri ]);
           













        } else {
            echo json_encode([ "success" => "false", "message" => "HATA" ]);
            return;
        }
