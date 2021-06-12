<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;

class AdminController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->has('ADMIN_USER')){
            return view('admin.login');
        }else{
            return view('admin.dashboard');
        }
        
    }

    public function login(Request $request){
        $username=$request->post('username');
        $password=$request->post('password');

        $query=DB::table('admin')->get();
        //prx($query[0]->username);
        if($username==$query[0]->username)
        {
            $pwd=Crypt::decrypt($query[0]->password);
            if($password==$pwd){
                $request->session()->put('ADMIN_USER','yes');
                $request->session()->put('ADMIN_USER_ID',$query[0]->id);
                return redirect('admin');          
            }else{
                $request->session()->flash('error','Please enter valid login details');
                return redirect('admin');
            }
        }
        
        /*$arr=[
            "username"=>$username,
            "password"=>Crypt::encrypt($password)
        ];
        $query=DB::table('admin')->insert($arr);*/


        return redirect('admin');   
    }

    public function theater(){
        $result['theater_room']=DB::table('theater_room')->get();
        return view('admin.theater',$result);
    }

    public function theater_process(Request $request,$id=""){
        if($id>0){
           
            $res=DB::table('theater_room')->where('id',$id)->get();
            //prx($res);
            $arr["id"]=$res[0]->id;
            $arr["theater_name"]=$res[0]->theater_name;
            $arr["balacony_sets"]=$res[0]->balcony_sets;
            $arr["mezzanine_sets"]=$res[0]->mezzanine_sets;
            $arr["orchestra_sets"]=$res[0]->orchestra_sets;
            
        }
        else{
            $arr["id"]=0;
            $arr["theater_name"]="";
            $arr["balacony_sets"]="";
            $arr["mezzanine_sets"]="";
            $arr["orchestra_sets"]="";
           
        }
        return view('admin.theater_process',$arr);
    }

    public function add_theater(Request $request){
        
        $arr=[
            "theater_name"=>$request->theater_name,
            "balcony_sets"=>$request->balacony_sets,
            "mezzanine_sets"=>$request->mezzanine_sets,
            "orchestra_sets"=>$request->orchestra_sets,
            "status"=>1,
            "added_on"=>date('Y-m-d h:i:s')
        ];
        if($request->id>0){
            $request->validate([
                "theater_name"=>'required',
                "balacony_sets"=>'required|numeric',
                "mezzanine_sets"=>'required|numeric',
                "orchestra_sets"=>'required|numeric',
               
            ]);
            DB::table('theater_room')
                ->where(['id'=>$request->id])
                ->update(['theater_name'=>$request->theater_name,'balcony_sets'=>$request->balacony_sets,'mezzanine_sets'=>$request->mezzanine_sets,'orchestra_sets'=>$request->orchestra_sets,]);
        }else{
            $request->validate([
                "theater_name"=>'required|unique:theater_room,theater_name,',
                "balacony_sets"=>'required|numeric',
                "mezzanine_sets"=>'required|numeric',
                "orchestra_sets"=>'required|numeric',
               
            ]);
            $query=DB::table('theater_room')->insert($arr);
        }
       
        return redirect('admin/theater');
        // return view('admin.theater_process');
    }

    public function status(Request $request,$status,$id){
        DB::table('theater_room')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        return redirect('admin/theater');
    }

    public function delete(Request $request,$id){
        DB::table('theater_room')
        ->where(['id'=>$id])
        ->delete();

        return redirect('admin/theater');
    }

    
}
