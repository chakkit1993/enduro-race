@extends('layouts.master')


@section('content')
<section class="content">

@if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
<div class="col-md-4 ">
                <div class="form-group">
                    <label for="tour_id"> รายการแข่งขัน</label>
                    <input type="hidden" name="tour_id" value="{{$tournament->id}}">  
                    <input type="text" name="tour_s" class="form-control" id="{{$tournament->id}}" value="{{$tournament->name}}" disabled>
                </div>

</div>

<form  id="updatePlayer10Form" method="POST" action="{{route('players.update10' , 0 )}}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <?php $n = 0; ?>             
@foreach($players as $player)
  <div class="card">
  <div class="card-header">
          <span class="h4">ข้อมูล ผู้เข้าร่วมการแข่งขัน</span>
    
      </div>
           <!--  main card body -->
            <div class="card-body">
                    <input type="hidden" name="_player_id{{$n}}" value="{{$player->id}}">  
        
           
                        <!-- row 1  -->
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                        
                                <div class="form-group">
                                    <label for="labelPlayerName"> ชื่อ</label>
                                    <php $_name = "name".$n ; php?>
                                    <input type="text" name= "_name{{$n}}" class="form-control" id="player_name" value="{{$player->name}}">
                                </div>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <div class="form-group">
                                    <label for="labelPlayerPhone">โทรศัพท์</label>
                                    <input type="text" class="form-control" name="_phone{{$n}}" id="player_phone" value="{{$player->phone}}" >
                                </div>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <div class="form-group">
                                    <label for="labelPlayerNumber">หมายเลขรถ</label>
                                    <input type="text" name="_no{{$n}}" class="form-control" id="{{$player->no}}" value="{{$player->no}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <label for="labelPlayerDivision">ประเภทการแข่งขัน</label>
                                    <select class="form-control selectpicker show-tick"   multiple="multiple"   data-live-search="true" id="exampleFormControlSelect2" name="_division_id{{$n}}[]">
                                    @foreach($divisions as $division)
                                    
                                        <option value="{{$division->id}}"
                                        @if(isset($player))
                                                @if($player->hasDivision($division->id))
                                                selected
                                                @endif
                                                @endif
                                    >{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                
                        <?php $n++; ?>
                      
            </div>
            <!-- End main card body -->

            </div>
            <!-- End main card  -->
            @endforeach
            <input type="hidden" name="count_player" value="{{$n}}">  
            <input type="hidden" name="tour_id" value="{{$tournament->id}}">  
            <div class="modal-footer">
            <a href="{{ redirect()->back()->getTargetUrl() }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">กลับ</button></a>
                <button type="submit" class="btn btn-primary">อัพเดต</button>
            </div>
        
            </form>
</section>






    @endsection




