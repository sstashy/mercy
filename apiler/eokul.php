<?php 

header("Content-Type: application/json; utf-8;");
//post info
function getInfo($cookie, $tc) {
    $post = [
        '__EVENTTARGET' => '',
        '__EVENTARGUMENT' => '',
        '__VIEWSTATE' => '',
        '__VIEWSTATEGENERATOR' => '',
        '__EVENTVALIDATION' => '',
        'txtTCKimlikNo' => $tc,
        'btnSorgula.x' => '38',
        'btnSorgula.y' => '16'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://eokulyd.meb.gov.tr/OrtaOgretim/OKL/OOK07003.aspx");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36");
    curl_setopt($ch, CURLOPT_COOKIE, "ASP.NET_SessionId={$cookie};");
    $output = curl_exec($ch);
    curl_close($ch);

    // bilgişşş
    $dom = new DOMDocument();
    @$dom->loadHTML($output);
    $xpath = new DOMXPath($dom);
    $ad = $xpath->query('//*[@id="txtAdi"]')->item(0)->getAttribute('value');
    $soyad = $xpath->query('//*[@id="txtSoyadi"]')->item(0)->getAttribute('value');
    $no = $xpath->query('//*[@id="txtOgrOkulNo"]')->item(0)->getAttribute('value');
    $durum = $xpath->query('//*[@id="ddlOgrencilikDurumu"]')->item(0)->getAttribute('value');

    return [
        'ad' => $ad,
        'soyad' => $soyad,
        'okulno' => $no,
        'durum' => $durum
    ];
}

//sistem koki
$cookie = "ee";
$tc = "23489501912"; // Add the TC Kimlik number here
$info = getInfo($cookie, $tc);
print_r($info);

?>