<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\DB;
    use PHPGangsta_GoogleAuthenticator;

    class ServiceController extends Controller
    {
        public function code() {
            // echo json_encode($_REQUEST['key']);
            $ga = new PHPGangsta_GoogleAuthenticator();
            $code = array();
            foreach($_REQUEST['key'] as $key) {
                $oneCode = $ga->getCode($key['secret']);
                array_push($code, array('id' => $key['id'], 'code' => $oneCode));
            }
            // echo json_encode($_REQUEST['key']);
            echo json_encode($code);
        }

        public function get_secret() {
            Session::forget('service');
            $service = DB::table('service')->where('user_id',$id = 1)->get();
            // echo $secret;
            // $service = array();
            // foreach($secret as $s) {
                // echo $s->id;
            //     array_push($service, array(code($s[0]), $s[1]));
            // }
            Session::put('service', $service);
            // echo $service;
            // echo json_encode($service);
        }

        public function post_secret(Request $request) {
            // if(!(Session::get('service') == null)) {
            //     $secret = Session::get('service');
            // }
            // echo $request->secret;
            // echo $request->name;
            // $secret = array();
            // array_push($secret, array($request->secret, $request->name));
            // Session::put('service',$secret);
            // return view('post');
            DB::table('service')->insert([
                'service' => $request->name,
                'secret' => $request->secret,
                'user_id' => 1
            ]);
            
            return redirect('/home');
        }
    }
?>