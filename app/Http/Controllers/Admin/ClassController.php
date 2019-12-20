<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Pareax;
use App\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $data=Classes::select();
        $data = DB::table('Classes')->get();
//        dd($data);
        return view('class.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $post=$request->except('_token');
//        dd($post);
        $validatedData = $request->validate([
            'w_name' => 'required|unique:paper|max:12|min:2',

        ],[
            'w_name.required'=>'标题名称必填',
            'w_nama.max'=>'标题名称最大12位',
            'w_name.unique'=>'标题名称已存在',
            'w_name.min'=>'标题名称最小2位',
        ]);
        if($request->hasFile('brand_logo')){
            $post['w_logo']=$this->upload('w_logo');
        }
//        $admin=new Pareax;
//        $admin->w_name=$post['w_name'];
//        $admin->c_id=$post['c_id'];
//        $admin->w_zyx=$post['w_zyx'];
//        $admin->w_show=$post['w_show'];
//        $admin->w_about=$post['w_about'];
//        $admin->w_email=$post['w_email'];
//        $admin->w_key=$post['w_key'];
//        $admin->w_logo=$post['w_logo'];
//        $admin=$admin->save();
        $admin=Pareax::insert($post);
        if($admin){
            echo "<script>alert('添加成功');location.href='/class/show';</script>";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


        $data = DB::table('Classes')->get();
        //分页
        $w_name=request()->w_name;
        $where=[];
        if($w_name){
            $where[]=['w_name','like',"%$w_name%"];
        }
        $pageSize = config('app.pageSize');
        $data=pareax::join("classes","paper.c_id","=","classes.c_id")
            ->orderBy('w_id','desc')
            ->select('paper.*','c_name')
            ->where($where)
            ->paginate($pageSize);
        $query = request()->all();
        return view('class.show',['data'=>$data,'query'=>$query]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Pareax::where('w_id',$id)->first();

        return view('class.edit',['data'=>$data]);

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
        $post=$request->except('_token');
        $res = Pareax::where('w_id',$id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location.href='/class/show';</script>";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res  = Pareax::destroy('w_id',$id);
        if($res){
            echo "<script>alert('删除成功');location.href='/class/show';</script>";
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


}