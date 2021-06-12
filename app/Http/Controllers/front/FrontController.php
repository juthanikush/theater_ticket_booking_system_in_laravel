<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;
use Crypt;
use Mail;

class FrontController extends Controller
{
    public function baner(){
        $result['baner']=DB::table('baner')->where('status',1)->get();
        $result['shows']=DB::table('shows')->where('status',1)->get();
        return view('front.index',$result);
    }
    public function bookticket(Request $request,$id){
        $result['shows']=DB::table('shows')->where('id',$id)->get();
        //prx($result['shows']);
        $request->session()->put('MOVIE_ID',$result['shows'][0]->id);
         $theater_id=$result['shows'][0]->theater_id;
        
        echo $request->session()->put('THEATER_ID',$theater_id);
        $result['room']=DB::table('theater_room')->where('id',$theater_id)->get();
        $result['book']=DB::table('book')->get();
         
        $b=0;
        $m=0;
        $o=0;
        foreach($result['book'] as $list){
            $b+=$list->balcony_set;
            $m+=$list->mezzanine_set;
            $o+=$list->orchestra_set;
        }
        $result['booked']=[
            'bal'=>$b,
            'mezz'=>$m,
            'orch'=>$o
        ];
        //prx($result);
        return view('front.bookticket',$result);
    }
    public function login(){
        return view('front.login');
    }
    public function sing_up(Request $request){
        $request->validate([
            "username"=>'required',
            "password"=>'required',
            "conpassword"=>'required',
            "email"=>'required|unique:user,email'
        ]);
        if($request->password==$request->conpassword)
        {

        }else{
            $request->session()->flash('message',$msg);
            return redirect('login');
        }
        $arr=[
            "username"=>$request->username,
            "password"=>Crypt::encrypt($request->password),
            "email"=>$request->email,
            "status"=>1,
            "added_on"=>date('Y-m-d h:i:s')
        ];
        $query=DB::table('user')->insert($arr);
        return redirect('login');
    }
    public function loginuser(Request $request){
      //prx($request->post());
        $request->validate([
            "user"=>'required',
            "pwd"=>'required'
        ]);
        $qry=DB::table('user')->where('username',$request->user)->get();
        if(isset($qry[0])){
            if(Crypt::decrypt($qry[0]->password)==$request->pwd){
                if($request->rember===null){
                    setcookie('login_username',$request->user,100);
                    setcookie('login_password',$request->pwd,100);
                }else{
                    setcookie('login_username',$request->user,time()+60*60*24*100);
                    setcookie('login_password',$request->pwd,time()+60*60*24*100);
                }
                $request->session()->put('FORNT_USER_LOGIN','yes');
                $request->session()->put('FORNT_USER_ID',$qry[0]->id);
                $request->session()->put('FORNT_USER_NAME',$qry[0]->username);
            }
            else{
                $msg="Place Enter Correct Password";
                $request->session()->flash('message',$msg);
                return redirect('login');
            }

        }else{
            $msg="Place Enter Correct Details";
            $request->session()->flash('message',$msg);
            return redirect('login');
        }
        
        
        return redirect('/');

    }
    public function book(Request $request){
        $b=$request->balcony;
        $m=$request->mezzanine;
        $o=$request->orchestra;
        $m_id=$request->id;
        $show_id=$request->session()->get('MOVIE_ID');
        $uid=$request->session()->get('FORNT_USER_ID');
         $theater_id=$request->session()->get('THEATER_ID');
        $shows=DB::table('shows')->where('id',$m_id)->get();
        //prx($shows[0]);
        $total=($b*$shows[0]->balcony_price)+($m*$shows[0]->mezzanine_price)+($o*$shows[0]->orchestra_price);

        $result['book']=DB::table('book')->get();
        $bs=0;
        $ms=0;
        $os=0;
        foreach($result['book'] as $list){
            $bs+=$list->balcony_set;
            $ms+=$list->mezzanine_set;
            $os+=$list->orchestra_set;
        }
        $res['theater_id']=DB::table('theater_room')->where('id',$theater_id)->get();
        
        $tbs=0;
        $tms=0;
        $tos=0;
         foreach($res['theater_id'] as $list){
             $tbs+=$list->balcony_sets;
            $tms+=$list->mezzanine_sets;
            $tos+=$list->orchestra_sets;
        }
     $avbs=($tbs-$bs)-$b;

    $avms=($tms-$ms)-$m;
    $avos=($tos-$os)-$o;
      if($avbs>0){

      }else{
        $id=$show_id;
        $request->session()->flash('message','balcony Sets are not available');
        return redirect('/');
      }
    
      if($avms>0){

      }else{
        $request->session()->flash('message1','mezzanine Sets are not available');
        return redirect('/');
      }
      if($avos>0){

      }else{
        $request->session()->flash('message2','orchestra Sets are not available');
        return redirect('/');
      }

        $arr=[
            "u_id"=>$uid,
            "movie_id"=> $show_id,
            "balcony_set"=>$b,
            "mezzanine_set"=>$m,
            "orchestra_set"=>$o,
            "payment_status"=>"panding",
            "added_on"=>date('Y-m-d h:i:s'),
            "total_amt"=>$total

        ];
        $query=DB::table('book')->insertGetId($arr);
        $request->session()->put('BOOK_ID',$query);

        $result['shows']=DB::table('shows')->where('id',$m_id)->get();
        $result['sets']=[
            "balcony"=>$b,
            "mezzanine"=>$m,
            "orchestra"=>$o,
            "total"=>$total
        ];
        //prx($result);
        return view('front.payment',$result);
    }
    function payment(Request $request){
        $user_id=$request->session()->get('FORNT_USER_ID');
        $result['user']=DB::table('user')->where('id',$user_id)->get();
        $result['book']=DB::table('book')->where('u_id',$user_id)->get();
       //prx($result);

        if(isset($user_id)){
           $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("API KEY",
                          "API TOCKEN"));
        $payload = Array(
            'purpose' => 'Buy Domain',
            'amount' => $result['book'][0]->total_amt,
            'phone' => '9999999999',
            'buyer_name' => $result['user'][0]->username,
            'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
            'send_email' => true,
            'send_sms' => true,
            'email' => $result['user'][0]->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        $response=json_decode($response);
        return redirect($response->payment_request->longurl);
        }
       
        
    }
    function instamojo_payment_redirect(Request $request){
      echo "hi";
        if($request->get('payment_id')!==null && $request->get('payment_status')!==null && $request->get('payment_request_id')!==null){
            if($request->get('payment_status')=='Credit'){
                $status="Success";
                $redirect_url="/order_placed";
            }else{
                $status="Fail";
                $redirect_url="/order_fail";
            }
            $request->session()->put('ORDER_STATUS',$status);
            DB::table('book')
                ->where(['u_id'=>$request->session()->get('FORNT_USER_ID')])
                ->update(['payment_status'=>$status]);
                return redirect('ticket');
        }else{
            die('something went wrong');
        }
    }
    function ticket(Request $request){
       $book_id=$request->session()->get('BOOK_ID');
       $movie_id=$request->session()->get('MOVIE_ID');
       $result['book']=DB::table('book')->where('id',$book_id)->get();
       $result['user']=DB::table('user')->where('id',$result['book'][0]->u_id)->get();
       //$result['theater_room']=DB::table('theater_room')->where('id',$result['book'][0]->movie_id)->get();
       $result['shows']=DB::table('shows')->where('id',$movie_id)->get();
       //prx($result);
        return view('front.ticket',$result);
    }

}
