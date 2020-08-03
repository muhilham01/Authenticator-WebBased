<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use PHPGangsta_GoogleAuthenticator;
    use Zxing\QrReader;

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
            $service = DB::table('service')->where('user_id', Auth::user()->id)->get();
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
            $name = $request->name;
            $secret = $request->secret;
            if(!(is_string($request->qr_text)) && isset($_POST["submitBtn"])){
                $target_dir = "assets/";
                $target_file = $target_dir . basename($_FILES["qr"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                // Check if image file is a actual image or fake image
                if(isset($_POST["submitBtn"])) {
                    $check = getimagesize($_FILES["qr"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
    
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    // unset($check);
                    // unlink($target_file);
                    $uploadOk = 1;
                }
    
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["qr"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["qr"]["name"]). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                }
                if(empty($secret)) {
                    $qrcode = new QrReader($target_file);
                    $text = $qrcode->text(); //return decoded text from QR Code
                    preg_match('/otpauth:\/\/totp\/(.*?)\?secret=(.*?)\&issuer=(.*)/', $text, $m);
                    if(count($m) != 0) {
                        $name = $m[1].PHP_EOL;
                        $secret = $m[2].PHP_EOL;    
                    }
                }
            }
            else {
                preg_match('/otpauth:\/\/totp\/(.*?)\?secret=(.*?)\&issuer=(.*)/', $request->qr_text, $m);
                if(count($m) != 0) {
                    $name = $m[1];
                    $secret = $m[2];
                }
            }
            // echo $request->qr;
            
            
            if(!($name == null || $secret == null)) {
                DB::table('service')->Insert([
                        'service' => $name,
                    ],
                    [
                    'service' => $name,
                    'secret' => $secret,
                    'user_id' => Auth::user()->id
                ]);
            }
            // if (file_exists('assets/qr.png')) {
            //     unlink('assets/qr.png');
            // }
            return redirect('/user/home');
        }

        public function edit_secret($id)
        {
            // mengambil data pegawai berdasarkan id yang dipilih
            $secret = DB::table('service')->where('id', $id)->get();
            // passing data pegawai yang didapat ke view edit.blade.php
            return $secret;
        
        }

        public function put_secret(Request $request) {

            if(isset($_POST['btnDelete'])) {
                DB::table('service')->where('id', $request->id)->delete();
            }
            else {
                DB::table('service')->where('id', $request->id)->update([
                    'service' => $request->name,
                    'secret' => $request->secret
                ]);
            }            
            return redirect('/user/home');
        }

        public function delete_secret(Request $request) {

            DB::table('service')->where('id', $request->id)->delete();
            
            return redirect('/user/home');
        }

        public function put_profile(Request $request) {

            DB::table('users')->where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            
            return redirect('/user/home');
        }

        public function qr_code() {
            // echo json_encode($_REQUEST['key']);
            // $qrcode = new QrReader('assets/qr.png');
            $qrcode = new QrReader($_REQUEST['qr']);
            $text = $qrcode->text(); //return decoded text from QR Code
            // echo json_encode($_REQUEST['key']);
            // echo ($text);
            $str = "otpauth://totp/Twitter:@Mustofaalhaddad?secret=JMF3WBHEZ3F6RHS7&issuer=Twitter";
            preg_match('/otpauth:\/\/totp\/(.*?)\?secret=(.*?)\&issuer=(.*)/', $str, $m);
            // preg_match('/otpauth:\/\/totp\/(.*?)\?/', $str, $m);
            // print_r($m);
            $name = $m[1].PHP_EOL;
            $secret = $m[2].PHP_EOL;
            $issuer = $m[3].PHP_EOL;
            // echo $name;
            // echo $secret;
            // echo $issuer;
            return json_encode(array('name' => $name, 'secret' => $secret));
        }
    }
?>