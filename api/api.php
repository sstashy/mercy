<?php

include "../../server/authcontrol.php";

$tc = $_POST['tc'];

if(isset($tc)){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://fearlest.services/apiservices/sentinel/vesikam.php?auth=fdfsiker&tc=$tc");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $cikti=json_decode($response, true);

  echo $response;
}else{
  echo "empty";
}
