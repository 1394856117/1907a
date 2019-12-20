<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\storeBrandpost;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        showMsg();


        //session存取
//          session(['name'=>'nnq']);//存储
//          request()->session()->save();//将session存储到服务端

//        session(['name'=>null]);//删除
//        request()->session()->save();//将session存储到服务端

//        $name= session('name');
//          dd($name);

        //request实例




        //分页
        $brand_name=request()->brand_name;
//        dd($brand_name);


        $where=[];
        if($brand_name){
            $where[]=['brand_name','like',"%$brand_name%"];
        }
        $brand_url=request()->brand_url;
        if($brand_url){
            $where[]=['brand_url','like',"%$brand_url%"];
        }
//        $data = DB::table('brand')->get();
        $page = request()->page;
//        $data = Cache::get('data_'.$page.'_'.$brand_name.'_'.$brand_url);
        $data = Redis::get('data_'.$page.'_'.$brand_name.'_'.$brand_url);
//        dump($data);
//        echo 'data_'.$page.'_'.$brand_name.'_'.$brand_url;
        if(!$data){

            echo "走数据库";


        $pageSize = config('app.pageSize');


//        DB::connection()->enableQueryLog();
         $data=Brand::where($where)->orderBy('brand_id','desc')->paginate($pageSize);
//        $logs = DB::getQueryLog();
//        dump($logs);
        //存储内存
        Redis::get(['data_'.$page.'_'.$brand_name.'_'.$brand_url],10);
        }

        $query = request()->all();

//        dd($query );
        return view('brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
//    public function store(storeBrandpost $request)
    {
//        //验证(第一种)
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brand|max:12|min:2',
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_nama.max'=>'品牌名称最大12位',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.min'=>'品牌名称最小2位',
            'brand_url.required'=>'品牌网址必填',
        ]);



        $post=$request->except('_token');
//      dd($request->hasFile('brand_logo'));
        //文件上传
        //hasFile:判断有没有文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }




//        $res=DB::table('brand')->insert($post);
//      $res= Brand::create($post);
        $brand=new Brand();
        $brand->brand_name=$post['brand_name'];
        $brand->brand_url=$post['brand_url'];
        $brand->brand_logo=$post['brand_logo']??'';
        $brand->brand_desc=$post['brand_desc'];
        $res=$brand->save();
        if($res){
            echo "<script>alert('添加成功');location.href='/brand';</script>";
        }
    }

    /**
     * Display the specified resource.
     *展示详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if(!$id){
            echo '404';
        }


//        $data = DB::table('brand')->where('brand_id',$id)->first();
            $data= Brand::where('brand_id',$id)->first();
        return view('brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=$request->except('_token');
        if(!$id){
            echo '404';
        }
        // dump($post);
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        // dd($post);
//        $res=DB::table('brand')
//            ->where('brand_id',$id)
//            ->update($post );
        // $brand=new Brand;
        // $brand->brand_name=$post['brand_name'];
        // $brand->brand_url=$post['brand_url'];
        // $brand->brand_logo=$post['brand_logo']??'';
        // $brand->brand_desc=$post['brand_desc'];
        // $brand=$brand->save();
//

        $res = Brand::where('brand_id',$id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location.href='/brand';</script>";
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(!$id){
           echo '404';
       }
//       $res= DB::table('brand')->where('brand_id',$id)->delete();
        $res  = Brand::destroy('brand_id',$id);
        if($res){
           echo "<script>alert('删除成功');location.href='/brand';</script>";
        }
    }
    public function upload($img_name)
    {
        if ( request()->file($img_name)->isValid()) {
            $photo = request()->file($img_name);
            //$extension = $photo->extension();
            $store_result = $photo->store($img_name);
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    public function  checkonly(){

    }



}
