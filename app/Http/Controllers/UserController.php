<?php

namespace App\Http\Controllers;

use PHPGangsta_GoogleAuthenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    	// mengambil data dari table user
    	$user = DB::table('user')->get();

    	// mengirim data user ke view index
    	return view('index',['user' => $user]);

    }

    public function code() {
        $ga = new PHPGangsta_GoogleAuthenticator();
        // $secret = $ga->createSecret();
        $secret = "O45KWYL4RXKFEANB";

        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        // echo $qrCodeUrl;

        $oneCode = $ga->getCode($secret);

        $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
        echo $oneCode;
    }

    public function home()
    {
    	// mengambil data dari table user
    	// Session::flush();
        $service = DB::table('service')->where('user_id', Auth::user()->id)->get();

        // mengirim data user ke view index
        Session::put('service', $service);
    	return view('dashboard');

    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/home');
    }
}
