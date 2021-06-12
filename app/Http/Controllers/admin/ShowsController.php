<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;


class ShowsController extends Controller
{
    public function shows(){
        $result['shows']=DB::table('shows')
        ->leftjoin('theater_room','theater_room.id','=','shows.theater_id')
        ->select('shows.*','theater_room.theater_name')
        ->get();
        //prx($result);
        return view('admin.shows',$result);
    }

    public function shows_process(Request $request,$id=""){
       
        if($id>0){
           
            $res=DB::table('shows')->where('id',$id)->get();
            //prx($res);
            $arr["id"]=$res[0]->id;
            $arr["show_name"]=$res[0]->show_name;
            $arr["theater_id"]=$res[0]->theater_id;
            $arr["start_time"]=$res[0]->start_time;
            $arr["start_time_sloat"]=$res[0]->start_time_sloat;
            $arr["end_time"]=$res[0]->end_time;
            $arr["end_time_sloat"]=$res[0]->end_time_sloat;
            $arr["balcony_price"]=$res[0]->balcony_price;
            $arr["mezzanine_price"]=$res[0]->mezzanine_price;
            $arr["orchestra_price"]=$res[0]->orchestra_price;
            
            $s_t=explode(':',$arr["start_time"]);
            $e_t=explode(':',$arr["end_time"]);
            $arr['start_hr']=$s_t[0];
            $arr['start_min']=$s_t[1];
            $arr['end_hr']=$e_t[0];
            $arr['end_min']=$e_t[1];

            
            
        }
        else{
            $arr["id"]=0;
            $arr["show_name"]="";
            $arr["theater_id"]="";
            $arr["start_time"]="";
            $arr["start_time_sloat"]="";
            $arr["end_time"]=0;
            $arr["end_time_sloat"]="";
            $arr["balcony_price"]="";
            $arr["mezzanine_price"]="";
            $arr["orchestra_price"]="";
            $arr['start_hr']="";
            $arr['start_min']="";
            $arr['end_hr']="";
            $arr['end_min']="";
            
           
        }
        $arr['theater_name']=DB::table('theater_room')->where('status',1)->get();
        //prx($arr);
        $arr['time']=DB::table('shows') ->leftjoin('theater_room','theater_room.id','=','shows.theater_id')->get();
        //prx($arr);
        return view('admin.shows_process',$arr);
    }
    public function add_shows(Request $request){

        $request->validate([
            "show_name"=>'required',
            "theater_id"=>'required',
            "start_time_sloat"=>'required',
            "end_time_sloat"=>'required',
            "balacony_price"=>'required|numeric',
            "mezzanine_price"=>'required|numeric',
            "orchestra_price"=>'required|numeric',
           
        ]);
     if(isset($request->image)){
        
        if($request->id>0){
            $arrimg=DB::table('shows')->where(['id'=>$request->id])->get();
            //prx();
            if(Storage::exists('/public/show_img/'.$arrimg[0]->image) ){
                Storage::delete('/public/show_img/'.$arrimg[0]->image);
            }
        }

        $rand=rand(11111,99999);
        $image=$request->image;
        $ext=$image->extension();
        echo $image_name=$rand.'.'.$ext;
        $image->storeAs('/public/show_img',$image_name);
        $img=$image_name;
    }
//prx($request->post());
        
        

        
        //prx($arr);
        if($request->id>0){
            $query=DB::table('shows');
            $query=$query->where(['id'=>$request->id]);
            if(isset($request->image)){
                $query=$query->update(['show_name'=>$request->show_name,'image'=>$img,'theater_id'=>$request->theater_id, 'start_time'=>$request->start_hr.':'.$request->start_min,'start_time_sloat'=>$request->start_time_sloat,'end_time'=>$request->end_hr.':'.$request->end_min,'end_time_sloat'=>$request->end_time_sloat,'balcony_price'=>$request->balacony_price,'mezzanine_price'=>$request->mezzanine_price,'orchestra_price'=>$request->orchestra_price]);
            }
            $query=$query->update(['show_name'=>$request->show_name,'theater_id'=>$request->theater_id, 'start_time'=>$request->start_hr.':'.$request->start_min,'start_time_sloat'=>$request->start_time_sloat,'end_time'=>$request->end_hr.':'.$request->end_min,'end_time_sloat'=>$request->end_time_sloat,'balcony_price'=>$request->balacony_price,'mezzanine_price'=>$request->mezzanine_price,'orchestra_price'=>$request->orchestra_price]);
        }else{
            $arr=[
                "show_name"=>$request->show_name,
                "theater_id"=>$request->theater_id,
                "start_time"=>$request->start_hr.':'.$request->start_min,
                "start_time_sloat"=>$request->start_time_sloat,
                "end_time"=>$request->end_hr.':'.$request->end_min,
                "end_time_sloat"=>$request->end_time_sloat,
                "balcony_price"=>$request->balacony_price,
                "mezzanine_price"=>$request->mezzanine_price,
                "orchestra_price"=>$request->orchestra_price,
                "image"=>$img,
                "status"=>1,
                "added_on"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('shows')->insert($arr);
        }
        return redirect('admin/shows');
    }

    public function status(Request $request,$status,$id){
        
        DB::table('shows')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        return redirect('admin/shows');
    }

    public function delete(Request $request,$id){
        
        DB::table('shows')
        ->where(['id'=>$id])
        ->delete();

        return redirect('admin/shows');
    }

}
