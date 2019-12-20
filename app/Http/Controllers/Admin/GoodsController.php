<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Brand;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=Goods::get();

        return view('goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandInfo=Brand::get();
        return view('goods.create',['brandInfo'=>$brandInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        //dd($post);
        // dd($request->hasFile('a_img'));
        //文件上传
        if($request->hasFile('goods_img')){
            $post['goods_img']=$this->upload('goods_img');
        }
//dd($img);
        $admin=new Goods;
        $admin->goods_name=$post['goods_name'];
        $admin->goods_price=$post['goods_price'];
        $admin->goods_num=$post['goods_num'];
        $admin->goods_img=$post['goods_img']??'';
//        $admin->brand_id=$post['brand_id'];
        $admin->goods_desc=$post['goods_desc'];
        $admin=$admin->save();
        //dd($res);
        if($admin){
            return redirect('/goods/index')->with('msg','添加成功');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Goods::destroy('goods_id',$id);
        if($res){
            echo "<script>alert('删除成功');location.href='/goods/index';</script>";
        }
        
    }

    public  function upload($goods_img){
        if (request()->file($goods_img)->isValid()){
            $photo = request()->file($goods_img);
            $store_result = $photo->store('goods_img');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');

    }
}
