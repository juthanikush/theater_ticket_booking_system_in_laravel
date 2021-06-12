@extends('front/layout')
@section('container')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   <!-- Indicators -->
   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
      <div class="item active">
         <img  src="{{asset('storage/baner/'.$baner[0]->image)}}" height="150px" width="150px"  >
         <div class="carousel-caption">
            ...
         </div>
      </div>
      <?php
         $count=count($baner);
             for($i=1;$i<$count;$i++){
                 ?>
      <div class="item ">
         <img  src="{{asset('storage/baner/'.$baner[$i]->image)}}" height="150px" width="150px"  >
         <div class="carousel-caption">
            ...
         </div>
      </div>
      <?php
         }
         ?>
   </div>
   <!-- <img src="{{asset('storage/baner/'.$baner[0]->image)}}" alt="..." >
      Controls -->
   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control ri" href="#carousel-example-generic" role="button" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
   </a>
</div>
<section id="shows">
   <h1>Shows</h1>
   @if(session()->has('message'))
<div class="message">
{{session('message')}}
</div>
@endif
@if(session()->has('message1'))
<div class="message">
{{session('message1')}}
</div>
@endif
@if(session()->has('message2'))
<div class="message">
{{session('message2')}}  
</div>
@endif

   <div class="col-md-12 tm-10">
      <div class="row">
    @foreach($shows as $list)
         <div class="col-md-3 con">
            <img src="{{asset('storage/show_img/'.$list->image)}}" class="theater_show">
            <a href="{{url('bookticket')}}/{{$list->id}}" class="btn"> Book Show</a>
         </div>
    @endforeach
         
      </div>
   </div>
</section>
@endsection