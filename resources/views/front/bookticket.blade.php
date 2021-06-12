@extends('front/layout')
@section('container')
<?php
//prx($room);
//prx($shows[0]->id);
$up=strtoupper($shows[0]->show_name);
$b=$room[0]->balcony_sets;
$m=$room[0]->mezzanine_sets;
$o=$room[0]->orchestra_sets;
 $bal=$booked['bal'];
 $mezz=$booked['mezz'];
 $orch=$booked['orch'];

?>
<h1>Name: <?php echo $up; ?></h1>
<h2>Time: {{$shows[0]->start_time}} {{$shows[0]->start_time_sloat}} To {{$shows[0]->end_time}} {{$shows[0]->end_time_sloat}}<h2>

<div>
<form method="post" action="{{url('book')}}">
@csrf
    @if($b>=$bal)
    <label class="label label-primary">No Balcony Sets</label>
    <input class="form-control" type="text"  name="balcony"><br>
    @endif
     @if($m>=$mezz)
    <label class="label label-primary">No Mezzanine Sets</label>
    <input class="form-control" type="text" name="mezzanine" ><br>
    @endif
    @if($o>=$orch)
    <label class="label label-primary">No Orchestra Sets</label>
    <input  class="form-control" type="text" name="orchestra" >
    @endif
    <button class="btn-success" >Book</button>
    <input type="hidden" value="{{$shows[0]->id}}" name="id">
<form>
</div>
    <div class="col-md-12">
        <div class="row">
        
            <div >
            <h3>Balcony Sets</h3>
            @for($i=1;$i<=$b;$i++)
            
            @if($i<=$bal)
                <img src="{{asset('front_asset/image/seat.png')}}" class="book_seat">
            @else
                <img src="{{asset('front_asset/image/seat.png')}}" class="seat">
            @endif
            
            @if($i%30==0)
            <br>
            @endif
            @endfor
            </div>
<hr>
            <div >
            <h3>Mezzanine Sets</h3>
            @for($i=1;$i<=$m;$i++)
            
           @if($i<=$mezz)
                <img src="{{asset('front_asset/image/seat.png')}}" class="book_seat">
            @else
                <img src="{{asset('front_asset/image/seat.png')}}" class="seat">
            @endif
            @if($i%30==0)
            <br>
            @endif
            @endfor
            </div>

<hr>
            <div >
            <h3>Orchestra Sets</h3>
            @for($i=1;$i<=$o;$i++)
            
           @if($i<=$orch)
                <img src="{{asset('front_asset/image/seat.png')}}" class="book_seat">
            @else
                <img src="{{asset('front_asset/image/seat.png')}}" class="seat">
            @endif
            @if($i%30==0)
            <br>
            @endif
            @endfor
            </div>
      
        </div>
    </div>
    
@endsection