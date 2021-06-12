@extends('admin/layout')
@section('page_title','Baner')
@section('baner_select','active')
@section('container')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Baner </strong><br>
            <a href="{{url('admin/baner_process')}}" class="btn btn-success">+Add Baner </a>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        
                        <th scope="col" width="15%">id</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="15%">Time</th>
                        <th scope="col" width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                   
               @foreach($baner as $list)
                
                    <tr>
                        
                        <td>{{$list->id}}</td>
                        
                       
                        <td><img src="{{asset('storage/baner/'.$list->image)}}" height="150px" width="150px"></img></td>
                         <td>{{$list->added_on}}</td>
                        <td>
                            <a href="{{url('admin/baner_process')}}/{{$list->id}}"><button class="btn btn-primary">Edit</button></a>
                            @if($list->status==1)
                            <a href="{{url('admin/baner/status/0')}}/{{$list->id}}"><button class="btn btn-warning">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/baner/status/1')}}/{{$list->id}}"><button class="btn btn-secondary">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/baner/delete/')}}/{{$list->id}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection