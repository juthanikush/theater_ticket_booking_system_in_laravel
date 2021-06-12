<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BanerController extends Controller
{
    public function baner(){
        $result['baner']=DB::table('baner')->get();
        return view('admin.baner',$result);
    }
    public function baner_process(Request $request,$id=''){
        if($id>0){
            $arr['id']=$id;
        }else{
            $arr['id']=0;
        }

        return view('admin.baner_process',$arr);
    }
    public function add_baner(Request $request){

        if(isset($request->image)){
            //echo $request->id;
            if($request->id>0){
                $arrimg=DB::table('baner')->where(['id'=>$request->id])->get();
                //prx($arrimg);
                if(Storage::exists('/public/baner/'.$arrimg[0]->image) ){
                    Storage::delete('/public/baner/'.$arrimg[0]->image);
                }
            }

            $rand=rand(11111,99999);
            $image=$request->image;
            $ext=$image->extension();
            echo $image_name=$rand.'.'.$ext;
            $image->storeAs('/public/baner',$image_name);
            $img=$image_name;
        }
        if($request->id>0){
            DB::table('baner')
            ->where(['id'=>$request->id])
            ->update(['image'=>$img]);
        }else{
            $arr=[
            "image"=>$img,
            "status"=>1,
            "added_on"=>date('Y-m-d h:i:s')
            ];
            
            $query=DB::table('baner')->insert($arr);
        }
        return redirect('admin/baner');
    }
      public function status(Request $request,$status,$id){
        
        if($id>0){
                $arrimg=DB::table('baner')->where(['id'=>$id])->get();
                //prx();
                if(Storage::exists('/public/baner/'.$arrimg[0]->image) ){
                    Storage::delete('/public/baner/'.$arrimg[0]->image);
                }
            }
        DB::table('baner')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        return redirect('admin/baner');
    }

    public function delete(Request $request,$id){
        
        DB::table('baner')
        ->where(['id'=>$id])
        ->delete();

        return redirect('admin/baner');
    }
}
