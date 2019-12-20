<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }
    public function create()
    {
        $post=request()->except('_token');
//        dd($post);
        $user=Admin::where($post)->first();
        if($user){
            session(['user'=>$user]);
            request()->session()->save();
            return redirect('/brand');
        }
//        if (Auth::attempt($post)) {
//            //$user = Auth::user();
//            $user_id= Auth::id();
////            dd($user_id);
//        // 认证通过...
//            return redirect()->intended('/brand');
//        }



    }



//    public function  logindo(){
//        $post = redquest()->except('_token');
//        dd($post);
//    }
}
