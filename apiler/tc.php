<?php

header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "101m";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$tc = $_GET['tc'];

if (!isset($tc)) {
  $error = array('Aradığın kişi bulunamadı');
  echo json_encode($error, JSON_UNESCAPED_UNICODE);
  exit;
}

if (!isset($_GET['auth'])) {
  $error = array('amına soktuğum sence girebilirmisin authsuz benim apime .gg/jeust');
  echo json_encode($error, JSON_UNESCAPED_UNICODE);
  exit;
}

if (!checkAuthToken()) {
  $error = array('amına soktuğum sence girebilirmisin authsuz benim apime .gg/jeust');
  echo json_encode($error, JSON_UNESCAPED_UNICODE);
  exit;
}

$sql = "SELECT * FROM 101m WHERE tc = '$tc'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
  }
  echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE, 4);
} else {
  $error = array('Aradığın kişi bulunamadı');
  echo json_encode($error, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE, 4);
}

mysqli_close($conn);

function checkAuthToken() {
  $auth = $_GET['auth'];

  if ($auth == "haha" || $auth == "hahh") {
    return true;
  } else {
    return false;
  }
}
