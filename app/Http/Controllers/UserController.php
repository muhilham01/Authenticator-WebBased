<?php

namespace App\Http\Controllers;

use PHPGangsta_GoogleAuthenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $secret = $ga->createSecret();

        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);

        $oneCode = $ga->getCode($secret);

        $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
        echo $oneCode;
    }
}
