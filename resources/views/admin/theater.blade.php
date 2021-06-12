@extends('admin/layout')
@section('page_title','Theater Room')
@section('theater_select','active')
@section('container')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Theater </strong><br>
            <a href="{{url('admin/theater_process')}}" class="btn btn-success">+Add Theater </a>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="15%">Total Sets</th>
                        <th scope="col" width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                @foreach($theater_room as $list)
                    @php
                       
                        $total=0;
                        $total=$list->balcony_sets+$list->mezzanine_sets+$list->orchestra_sets;
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$list->theater_name}}</td>
                        <td>{{$total}}</td>
                        <td>
                            <a href="{{url('admin/theater_process')}}/{{$list->id}}"><button class="btn btn-primary">Edit</button></a>
                            @if($list->status==1)
                            <a href="{{url('admin/theater_room/status/0')}}/{{$list->id}}"><button class="btn btn-warning">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/theater_room/status/1')}}/{{$list->id}}"><button class="btn btn-secondary">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/theater_room/delete/')}}/{{$list->id}}"><button class="btn btn-danger">Delete</button></a>
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