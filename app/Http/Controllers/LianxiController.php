<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fu;
use App\Lianxi;
use App\Http\Requests\StoreLianxiPost;
use Validator;//第三种
use Illuminate\Validation\Rule;//第三种
//use App\Http\Requests\StoreGoodsPost;
use Illuminate\Support\Facades\Cache;
class LianxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page=request()->page??1;
       // $zhi=request()->all(); dump($zhi);
        $title=request()->title??'';
        $c_id=request()->c_id??'';
        //dd($c_id);
        $fu=Fu::all();
      
     //   dump(request()->all());
       // Cache::flush('tiaojain');
            $tiaojain=Cache::get("tiaojain_".$page.'_'.$title.'_'.$c_id);
        if(!$tiaojain){
             $where=[];
                     if($title){
                                $where[]=["title","like","%$title%"];
                                 }   
                     if($c_id){
                                $where[]=["fu.c_id","like","%$c_id%"];
                                 } 

           // echo "正在缓存中 ";
            $tiaojain=Lianxi::join('fu',"lianxi.c_id",'=',"fu.c_id")->where($where)->paginate(2);
            Cache::put("tiaojain_".$page.'_'.$title.'_'.$c_id,$tiaojain,50);
        }//else{
               //echo "缓存过";
        //}
if(!$tiaojain){
    if(request()->ajax()){
        return view("lianxi.ajaxindex",['res'=>$tiaojain,'fu'=>$fu,'title'=>$title,'c_id'=>$c_id]);
         }
      }   
        return view("lianxi.index",['res'=>$tiaojain,'fu'=>$fu,'title'=>$title,'c_id'=>$c_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $fu=Fu::all();
       
        //dd($fu);
        return view("lianxi.create",['fu'=>$fu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLianxiPost $request)
    {
        //
        $aa=request()->except('_token');
        if($request->hasFile("img")){
                $aa['img']=$this->tupian("img");//upload自定义的方法
            }
        //dd($aa);
        $res=Lianxi::insert($aa);
        if($res){
            return redirect("/lianxi");
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

        $fu=Fu::all();
        $res=Lianxi::find($id);
        return view("lianxi.edit",['fu'=>$fu,'res'=>$res]);
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
      $res=request()->except('_token');
           $validaor=Validator::make($res,[  // 排除自身ID
            'title'=>["required",Rule::unique("lianxi")->ignore($id,'id'),
            "regex:/^[\x{4e00}-\x{9fa5}\w]{2,20}$/u",
            ],
            "c_id"=>"required",
        ],[
            "title.required"=>"文章名称必填",
            "title.unique"=>"文章已存在",
            "title.regex"=>"品牌名称最大为20位",
            "c_id.required"=>"类型不可为空",  
                          ]);

            if($validaor->fails()){//有错走这个判断
                return redirect("lianxi/edit/".$id)->withErrors($validaor)->withInput();
            }

  if($request->hasFile("img")){
                $res['img']=$this->tupian("img");//upload自定义的方法
            }

     
        //dd($res);
        $jie=Lianxi::where("id",$id)->update($res);
        
        if($jie!==false){
            return redirect("/lianxi");
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
        //
        //return 'ok';
        // dd("ok");
        $res=Lianxi::destroy($id);
        if($res){
        return redirect("/lianxi");
        }
    }
}
