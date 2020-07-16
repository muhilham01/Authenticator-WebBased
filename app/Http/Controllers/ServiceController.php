<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use PHPGangsta_GoogleAuthenticator;

    class ServiceController extends Controller
    {
        public function code($key) {
            $ga = new PHPGangsta_GoogleAuthenticator();
            // $secret = $ga->createSecret();
            $secret = $key;

            $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
            // echo $qrCodeUrl;

            $oneCode = $ga->getCode($secret);

            $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
            echo $oneCode;
        }
        public function get_secret() {
            Session::flush();
            $secret = localStorage.getItem("secret");
            $service = array();
            foreach($secret as $s) {
                array_push($service, array(code($s[0]), $s[1]));
            }
            Session::put('service',$service);
        }

        public function post_secret(Request $request) {
            if(!(Session::get('service') == null)) {
                $secret = Session::get('service');
            }
            // echo $request->secret;
            // echo $request->name;
            $secret = array();
            array_push($secret, array($request->secret, $request->name));
            Session::put('service',$secret);
            return view('post');
        }
    }
?>