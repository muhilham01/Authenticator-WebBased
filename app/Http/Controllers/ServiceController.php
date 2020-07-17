<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use PHPGangsta_GoogleAuthenticator;

    class ServiceController extends Controller
    {
        public function code() {
            // echo json_encode($_REQUEST['key']);
            $ga = new PHPGangsta_GoogleAuthenticator();
            $code = array();
            foreach($_REQUEST['key'] as $key) {
                $oneCode = $ga->getCode($key);
                array_push($code, $oneCode);
            }
            echo json_encode($code);
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