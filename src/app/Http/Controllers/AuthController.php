<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加

class AuthController extends Controller
{
    public function index()
    {

        $user = Auth::user();// 現在のユーザーを取得
        return view('index', compact('user'));// ビューにユーザーを渡す
    }
}
