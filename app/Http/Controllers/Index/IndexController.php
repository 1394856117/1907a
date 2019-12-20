<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Users;
use App\Goods;
use App\Cate;
use App\Cart;



class IndexController extends Controller
{
    public function index(){
        $data=Goods::get();
        $parent=Cate::where('parent_id','=',0)->get();//查询顶级分类
//        dd($parent);
//        dd($data);
        return view('index.index',['data'=>$data,'parent'=>$parent]);
    }
    public function login(){
        return view('index.login');
    }
    public function logindo(){
        $post=request()->except('_token');
        $user=Users::where($post)->first();
//        dd($user);
        if($user){
            session(['user'=>$user]);
            request()->session()->save();
            return redirect('/');
        }
    }


    public function reg(){
        return view('index.reg');
    }
   public  function regd(){
    $post=request()->except('_token');
//    dd($post);
   $res=Users::insert($post);
       if($post){
           return redirect('/login')->with('msg','注册成功');
       }
   }
    public function proinfo($id){

        $post=Goods::where('goods_id',$id)->first();
//        $order_sub=request()->order_sub;
//        dd($order_sub);


       return view('index.proinfo',['post'=>$post]);
    }
    public function prolist(){
        $post=Goods::get();
//        dd($post);
        return view('index/prolist',['post'=>$post]);
    }
    //购物车
    public function car (){
//        $order_id=request()->goods_id;
//        $order_sub=redirect()->goods_price;
//        $user=session('user');
//        $user_id=$user['user_id'];
//
//        $cartInfo=Order::where('order_id',$order_id)->first();
//        if(empty($cartInfo)){
//
//            $arr=['user_id'=>$user_id,'order_id'=>$order_id,'order_time'=>time(),'goods_price'=>$order_sub];
//            $info=Cart::insert($arr);
//            //dd($info);
//
//            if($info){
//                echo 1;
//            }else{
//                echo 2;
//            }
//        }





        return view('index.car');
    }
    public function pay(){
        return view('index.pay');

    }
    public function success(){
        return view('index.success');

    }




}

