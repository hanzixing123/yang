<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yanzhengModel;
use App\yanLogin;
class Yanzheng extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $zhi=request()->all();
           // dump($zhi);
            $where=[];
            if(isset($zhi['name'])){
                $where[]=['name',"like","%".$zhi['name']."%"];
            }
             if(isset($zhi['shen'])){
                $where[]=['shen',"like","%".$zhi['shen']."%"];
            }
            //if()
      

         $res= yanzhengModel::where($where)->paginate(3);  
  if(request()->ajax()){
               return view("yan.ajax",['res'=>$res,'zhi'=>$zhi]);
            }

         
         return view('yan.index',['res'=>$res,'zhi'=>$zhi]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //echo "ok";
        return view('yan.create');
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $zhi=request()->except(['_token']);
         $zhi['time']=time();

            if($request->hasFile("img")){
                $zhi['img']=$this->tupian("img");//upload自定义的方法        
                }
          //dd($zhi);
    //dd(request()->all());
       $res=yanzhengModel::insert($zhi);
       if($res){
            return redirect("/Yanzheng");
       }
    }
        function tupian($img){
        //使用 isValid 方法判断文件在上传过程中是否出错
        if(request()->file($img)->isValid()){
            //接受上传文件
            $file=request()->$img;
            //实现上传
            $path=$file->store("tupian");

            return $path;
        }
        die("上传文件出错!!!!!!!!");

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
        $res=yanzhengModel::find($id);
            return view('yan.edit',['res'=>$res]);

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
        
        $zhi=request()->except('_token');
        //dd($zhi);     
        if($request->hasFile("img")){
                $zhi['img']=$this->tupian("img");//upload自定义的方法        
                }   
        $res=yanzhengModel::where('id',$id)->update($zhi);
        if($res!==false){
            return redirect("/Yanzheng");
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
       // $id=request()->id;
        //dd($id);
        $res=yanzhengModel::destroy($id);
        if($res){
            return redirect('/Yanzheng');
        }

    }
    public function Login(){
        $zhi=request()->except('_token');
       //dd($zhi);
     // $res= DB::table('users')->where('user_name',$zhi['user_name'])->get();
        $res=yanLogin::where('user_name',$zhi['user_name'])->first();
       // dd($res);
        if($res==null){
            return redirect("/Login")->with("msg","用户名或密码不正确,请查证后填写.");die;
        }

       // dd($res->user_pwd);
          if($res->user_pwd!=$zhi['user_pwd']){
                return redirect("/Login")->with("msg","用户名或密码不正确,请查证后填写.");die;
            }
    //存session   
                
                //mima 检查是否勾选7天免登陆
                // if(isset($zhi['mima'])){
                //     //走到这里说明已经勾选             
                //     Cookie::queue("user",serialize($curd),7*60*24);
                // }

                //session(['curd'=>$curd]);
                request()->session()->put("users",['name'=>$zhi['user_name'],'pwd'=>$zhi['user_pwd']]);
                return redirect('/Yanzheng');
           // dd(request()->session()->get("curd"));


    }





}
