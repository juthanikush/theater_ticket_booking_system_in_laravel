@extends('admin/layout')
@section('page_title','Shows')
@section('shows_select','active')
@section('container')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Theater </strong><br>
            <a href="{{url('admin/shows_process')}}" class="btn btn-success">+Add Shows </a>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="15%">Theater Name</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="15%">Time</th>
                        <th scope="col" width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                @foreach($shows as $list)
                
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$list->show_name}}</td>
                        <td>{{$list->theater_name}}</td>
                        <td><img src="{{asset('storage/show_img/'.$list->image)}}" height="150px" width="150px"></img></td>
                        <td>{{$list->start_time}} {{$list->start_time_sloat}}<br>{{$list->end_time}} {{$list->end_time_sloat}}</td>
                        <td>
                            <a href="{{url('admin/shows_process')}}/{{$list->id}}"><button class="btn btn-primary">Edit</button></a>
                            @if($list->status==1)
                            <a href="{{url('admin/shows/status/0')}}/{{$list->id}}"><button class="btn btn-warning">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/shows/status/1')}}/{{$list->id}}"><button class="btn btn-secondary">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/shows/delete/')}}/{{$list->id}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection