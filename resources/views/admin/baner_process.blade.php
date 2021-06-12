@extends('admin/layout')
@section('page_title','Baner')
@section('baner_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
    
        <form method="post" action="{{url('admin/add_baner')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value={{$id}}>
        <div class="card-body card-block">
        
           
            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-12">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file"  class="form-control" aria-required="true" aria-invalid="false" >
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-sm mb-17">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
                       
@endsection