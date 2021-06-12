@extends('front/layout')
@section('container')
<?php
//prx($room);
//prx($shows[0]->id);
$up=strtoupper($shows[0]->show_name);
/*$b=$room[0]->balcony_sets;
$m=$room[0]->mezzanine_sets;
$o=$room[0]->orchestra_sets;*/
?>
<h1>Name: <?php echo $up; ?></h1>
<h2>Time: {{$shows[0]->start_time}} {{$shows[0]->start_time_sloat}} To {{$shows[0]->end_time}} {{$shows[0]->end_time_sloat}}<h2>
<h3>Balcony  Price:{{$shows[0]->balcony_price}}</h3>
<h3>Mezzanine Price:{{$shows[0]->mezzanine_price}}</h3>
<h3>Orchestra Price:{{$shows[0]->orchestra_price}}</h3>
<h3>Balcony  Set:{{$sets['balcony']}}</h3>
<h3>Mezzanine Set:{{$sets['mezzanine'] }}</h3>
<h3>Orchestra   Set:{{$sets['orchestra']}}</h3>
<img src="{{asset('storage/show_img/'.$shows[0]->image)}}" class="imgbook">
<h3>Total : {{$sets['total']}}</h3>
<a href="{{url('payment')}}">Instamojo</a>
@endsection