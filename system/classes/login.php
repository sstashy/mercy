<?php

namespace jesuzweq;

class JesuLogin extends System{

    protected static $key;

    protected static function date_check(){
        date_default_timezone_set("Europe/Istanbul");
        $date = date('Y-m-d');
        $sqldate = self::table('users')->where('userAuthKey', self::$key)->first();

        if($sqldate->userTime == null) {
            return true;
        }

        if(strtotime($date) > strtotime($sqldate->userTime)) {
            return false;
        }
        return true;
    }

    protected static function checkUserRole() {
        $sqlCheck = self::table('users')->where('userAuthKey', self::$key)->first();

        if($sqlCheck->userRole == 0) {
            return false;
        } else {
            return true;
        }
    }

    protected static function ipcheck(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $sqlip = self::table('users')->where('userAuthKey', self::$key)->first();
        
        if($sqlip->multiCheck == 1) {
            return true;
        }
        $ip = substr($ip, -7);
        
        if($sqlip->userLog == null) {
            $updateIP = self::table('users')->where('userAuthKey', self::$key)->update([
                'userLog' => $ip
            ]);
            return true;
        }

        if($ip != $sqlip->userLog){
            $ban = self::table('users')->where('userAuthKey', self::$key)->update([
                'userVerified' => "0"
            ]);
            return false;
        }
        return true;
    }

    public static function checkUserStatus() {
        $sqlCheck = self::table('users')->where('userAuthKey', self::$key)->first();

        if($sqlCheck->userVerified == 0) {
            return false;
        } elseif ($sqlCheck->userVerified == 1) {
            return true;
        }
    }

    public static function updateBrowserOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "N/A";
        $os = "Unknown";

        $browsers = [
            '/msie/i' => 'Internet explorer',
            '/firefox/i' => 'Mozilla Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Google Chrome',
            '/edge/i' => 'Microsoft Edge',
            '/opera/i' => 'Opera',
            '/mobile/i' => 'Mobile browser',
        ];

        foreach ($browsers as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'Windows') !== false) {
            $os = "Windows OS";
        } elseif (strpos($user_agent, 'Mac') !== false) {
            $os = "Mac OS";
        } elseif (strpos($user_agent, 'Linux') !== false) {
            $os = "Linux";
        } elseif (strpos($user_agent, 'iPhone') !== false) {
            $os = "iPhone";
        } elseif (strpos($user_agent, 'Android') !== false) {
            $os = "Android";
        } else {
            $os = "Unknown";
        }
        $updateBS = self::table('users')->where('userAuthKey', self::$key)->update([
            'userBrowser' => $browser,
            'userOS' => $os
        ]);

        return true;
    }

    public static function login(){
  
      
        $key = self::filter($_POST['password'], true);
        if(empty($key)){
            return 'emptyKey';
        }

        

        self::$key = $key;

        $sqlkey = self::table('users')->where('userAuthKey', $key)->first();

        
        $ip = self::ipcheck();
        $date = self::date_check();
        $checkUser = self::checkUserStatus();
        $BOS = self::updateBrowserOS();
        $checkrole = self::checkUserRole();

        if(!$sqlkey){
            return "wrongKey";
        } elseif ($ip != true) {
            return "multiSecure";
        } elseif($date != true){
            return 'endOfMembership';
        } elseif($checkUser != true) {
            return 'deactiveMembership';
        } elseif($BOS != true) {
            return "databaseError";
        } elseif($checkrole != true) {
            return "freeMember";
        }
        
        $_SESSION['authKey'] = $sqlkey->userAuthKey;
        $_SESSION['userRole'] = $sqlkey->userRole;
        return "success";
    }

    public static function checkCaptcha($captchaResponse) {
        if (!$captchaResponse)
            return false;

        $apiReqURL = "https://www.google.com/recaptcha/api/siteverify";

        $ch = curl_init($apiReqURL);
        curl_setopt($ch, CURLOPT_URL, $apiReqURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "secret" => "6Le1zxElAAAAAH_xwGljIJ5F_3sEcLED1GLu6YX5",
            "response" => $captchaResponse,
            "remoteip" => $_SERVER["REMOTE_ADDR"]
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        if($response->success == false) {
            return false;
        } else {
            return true;
        }
    }
}