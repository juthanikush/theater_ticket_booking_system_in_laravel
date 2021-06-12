@extends('admin/layout')
@section('page_title','Theater Room')
@section('theater_select','active')
@section('container')
<div class="col-lg-12">
    <div class="card">
  
        <form method="post" action="{{url('admin/add_theater')}}">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$id}}">
        <div class="card-body card-block">
        
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Theater Name</label>
                        <input type="text" id="theater_name" name="theater_name" value="{{$theater_name}}" placeholder="Enter your Theater Name" class="form-control">
                        @error('theater_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="vat" class=" form-control-label">Balcony Total Sets</label>
                        <input type="text" id="balacony_sets" name="balacony_sets" value="{{$balacony_sets}}" placeholder="Total Sets" class="form-control">
                        @error('balacony_sets')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                    <label for="vat" class=" form-control-label">Mezzanine Total Sets</label>
                    <input type="text" id="mezzanine_sets" name="mezzanine_sets" value="{{$mezzanine_sets}}" placeholder="Total Sets" class="form-control">
                    @error('mezzanine_sets')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    
                    <div class="col-md-6">
                    <label for="vat" class=" form-control-label">Orchestra Total Sets</label>
                    <input type="text" id="orchestra_sets" name="orchestra_sets" value="{{$orchestra_sets}}" placeholder="Total Sets" class="form-control">
                    @error('orchestra_sets')
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