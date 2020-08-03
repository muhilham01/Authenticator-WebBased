<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')->count();
        return view('pages.admin.dashboard',[
                'users' => $users
        ]);
    }
}
