@extends('admin/layout')
@section('page_title','Shows')
@section('shows_select','active')
@section('container')
<div class="col-lg-12">
    <div class="row">
    @if(isset($time))
    @foreach($time as $list1)
        <div class="col-md-2 bd">
        <h5>Booked Time</h5>
            Start Time:{{$list1->start_time}} {{$list1->start_time_sloat}} <br>
            End Time:{{$list1->end_time}} {{$list1->end_time_sloat}} <br>
            Theater Name: {{$list1->theater_name}}
            Movie Name:{{$list1->show_name}}
        </div>
    @endforeach
    
    @else
        <h5>Nothing is Booked</h5>
    @endif
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
    
        <form method="post" action="{{url('admin/add_shows')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value={{$id}}>
        <div class="card-body card-block">
        
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Show Name</label>
                        <input type="text" id="show_name" value="{{$show_name}}" name="show_name"  placeholder="Enter your Theater Name" class="form-control">
                        @error('theater_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="vat" class=" form-control-label">Theater Name</label>
                    <select  class="standardSelect  form-control" name="theater_id">
                        <option value="">Select Theater </option>
                        @foreach($theater_name as $list)
                        @if($theater_id==$list->id)
                            <option value="{{$list->id}}" selected>{{$list->theater_name}}</option>
                        @else
                            <option value="{{$list->id}}">{{$list->theater_name}}</option>
                        @endif
                        
                        @endforeach
                    </select>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label">Stat Time</label>
                    <select  class="standardSelect  form-control" name="start_hr">
                       <?php
                       for($i=1;$i<24;$i++){
                           if($start_hr==$i){
                            echo '<option value='.$i.' selected>'.$i.'</option>';
                           }else{
                            echo '<option value='.$i.'>'.$i.'</option>';
                           }
                        
                       }
                       
                       ?>
                    </select>
                    </div>
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label"></label>
                    <select  class="standardSelect  form-control mt5" name="start_min">
                       <?php
                       for($i=1;$i<60;$i++){
                        if($start_min==$i){
                            echo '<option value='.$i.' selected>'.$i.'</option>';
                           }else{
                            echo '<option value='.$i.'>'.$i.'</option>';
                           }
                       }
                       
                       ?>
                    </select>

                    
                    </div>
                    
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label">Start Time Sloat</label>
                    <select  class="standardSelect  form-control" name="start_time_sloat">
                    @if($start_time_sloat=="AM")
                        <option value="AM" selected>AM</option>
                        <option value="PM">PM</option>
                    @elseif($start_time_sloat=="PM")
                        <option value="AM">AM</option>
                        <option value="PM" selected>PM</option>
                    @else
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    @endif
                    </select>
                    
                    </div>
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label">End Time</label>
                    <select  class="standardSelect  form-control" name="end_hr">
                       <?php
                       for($i=1;$i<24;$i++){
                        if($end_hr==$i){
                         echo '<option value='.$i.' selected>'.$i.'</option>';
                        }else{
                         echo '<option value='.$i.'>'.$i.'</option>';
                        }
                     
                    }
                       
                       ?>
                    </select>
                    </div>
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label"></label>
                    <select  class="standardSelect  form-control mt5" name="end_min">
                       <?php
                       for($i=1;$i<60;$i++){
                        if($end_min==$i){
                            echo '<option value='.$i.' selected>'.$i.'</option>';
                           }else{
                            echo '<option value='.$i.'>'.$i.'</option>';
                           }
                       }
                       
                       ?>
                    </select>

                    
                    </div>
                    
                    <div class="col-md-2">
                    <label for="vat" class=" form-control-label">End Time Sloat</label><br>
                    <select  class="standardSelect  form-control" name="end_time_sloat"> 
                   
                    @if($end_time_sloat=="AM")
                        <option value="AM" selected>AM</option>
                        <option value="PM">PM</option>
                    @elseif($end_time_sloat=="PM")
                         <option value="AM">AM</option>
                        <option value="PM" selected>PM</option>
                    @else
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    @endif
                    </select>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <label for="company" class=" form-control-label">Balcony Price</label>
                        <input type="text" id="theater_name" name="balacony_price" value="{{$balcony_price}}"  placeholder="Enter your Theater Name" class="form-control">
                        @error('theater_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="vat" class=" form-control-label">Mezzanine Price</label>
                        <input type="text" id="balacony_sets" value="{{$mezzanine_price}}" name="mezzanine_price" placeholder="Total Sets" class="form-control">
                        @error('balacony_sets')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="vat" class=" form-control-label">Orchestra Price</label>
                        <input type="text" id="balacony_sets" value="{{$orchestra_price}}" name="orchestra_price" placeholder="Total Sets" class="form-control">
                        @error('balacony_sets')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
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