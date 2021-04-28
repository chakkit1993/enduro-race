@extends('layouts.master')


@section('content')
<section class="content">

  <div class="card">
  @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

 



  <div class="card-header">
          <span class="h4">Edit Player</span>
      </div>
           <!--  main card body -->
            <div class="card-body">

            <form  id="updatePlayerForm" method="POST" action="{{route('players.update' , $player->id)}}"  enctype="multipart/form-data">
                @csrf
                  @method('PUT')
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name</label>
                        <input type="text" name="name" class="form-control" id="player_name" value="{{$player->name}}">
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="player_phone" value="{{$player->phone}}" >
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">No</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="exampleFormControlSelect2" name="no">
                            @for($x = 0; $x <= 1000; $x++)
                            <option value="{{$x}}" {{($player->no == $x)?'selected':''}} >{{$x}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag RFID</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="exampleFormControlSelect2" name="tag_id">
                            @for($x = 0; $x <= 1000; $x++)
                            <option value="{{$x}}"  {{($player->tag_id == $x)?'selected':''}} >{{$x}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>
                    </div>

    

                    <div class="form-group">
                        <label for="tour_id"> Tournament</label>
                        <input type="hidden" name="tour_id" value="{{$tournament->id}}">  
                        <input type="text" name="tour_s" class="form-control" id="{{$tournament->id}}" value="{{$tournament->name}}" disabled>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Division</label>
                        <select class="form-control selectpicker show-tick"   multiple="multiple"   data-live-search="true" id="exampleFormControlSelect2" name="division_id[]">
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

                    <div class="row">
                    <div class="col ml-auto">

                    <div class="form-group">

                        <label for="title">Image</label>
                        <input type="file" name="image" value="" class="form-control">
                        </div>
                     </div>
                    </div>

                   
    <div class="card">
                        <div class="card-header">
                            <span class="h4">Checkpoint List</span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                              @if($leaderboards->count()>0)
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Stage</th>
                                    <th>PC1</th>
                                    <th>PC2 </th>
                                    <th>PC3</th>
                                    <th>PC4</th>
                                    <th>PC5</th>
                                    <th>t1</th>
                                    <th>t2</th>
                                    <th>tResult</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl = 1)
                                @foreach($leaderboards as $leaderboard)
                                <tr>
                                    <td>{{$leaderboard->id}}</td>
                                    <td>{{$leaderboard->stage}}</td>
                                    <td>
                                    <select class="form-control selectpicker show-tick"  id="exampleFormControlSelect2" name="{{$leaderboard->stage}}_pc1">

                                            <option value="0" data-content="<span class='badge badge-danger'>Not Check</span>"  {{($leaderboard->pc1 == '0')?'selected':''}} >Not Check</option>
                                            <option value="1" data-content="<span class='badge badge-success'> Check</span>" {{($leaderboard->pc1 == '1')?'selected':''}}>Check</option>

                                    </select>
                                    </td>
                                    <td>
                                    <select class="form-control selectpicker show-tick"      id="exampleFormControlSelect2" name="{{$leaderboard->stage}}_pc2">

                                            <option value="0" data-content="<span class='badge badge-danger'>Not Check</span>"  {{($leaderboard->pc2 == '0')?'selected':''}} >Not Check</option>
                                            <option value="1" data-content="<span class='badge badge-success'> Check</span>" {{($leaderboard->pc2 == '1')?'selected':''}}>Check</option>

                                    </select>
                                    </td>
                                    <td>
                                    <select class="form-control selectpicker show-tick"    id="exampleFormControlSelect2" name="{{$leaderboard->stage}}_pc3">

                                            <option value="0" data-content="<span class='badge badge-danger'>Not Check</span>"  {{($leaderboard->pc3 == '0')?'selected':''}} >Not Check</option>
                                            <option value="1" data-content="<span class='badge badge-success'> Check</span>" {{($leaderboard->pc3 == '1')?'selected':''}}>Check</option>

                                    </select>
                                    </td>
                                    <td>
                                    <select class="form-control selectpicker show-tick"     id="exampleFormControlSelect2" name="{{$leaderboard->stage}}_pc4">

                                            <option value="0" data-content="<span class='badge badge-danger'>Not Check</span>"  {{($leaderboard->pc4 == '0')?'selected':''}} >Not Check</option>
                                            <option value="1" data-content="<span class='badge badge-success'> Check</span>" {{($leaderboard->pc4 == '1')?'selected':''}}>Check</option>

                                    </select>
                                    </td>
                                    <td>
                                    <select class="form-control selectpicker show-tick"    id="exampleFormControlSelect2" name="{{$leaderboard->stage}}_pc5">

                                            <option value="0" data-content="<span class='badge badge-danger'>Not Check</span>"  {{($leaderboard->pc5 == '0')?'selected':''}} >Not Check</option>
                                            <option value="1" data-content="<span class='badge badge-success'> Check</span>" {{($leaderboard->pc5 == '1')?'selected':''}}>Check</option>

                                    </select>
                                    </td>
                                    <td> <input type="text" class="form-control input_time" id="{{$leaderboard->stage}}_t1" name="{{$leaderboard->stage}}_t1" placeholder="hh:mm:ss" value=" {{$leaderboard->t1}}">  </td>
                                    <td> <input type="text" class="form-control input_time" id="{{$leaderboard->stage}}_t2" name="{{$leaderboard->stage}}_t2" placeholder="hh:mm:ss" value=" {{$leaderboard->t2}}">  </td>
                                    <td> <input type="text" class="form-control input_time" id="input_tResult" name="input_tResult" placeholder="hh:mm:ss" value=" {{$leaderboard->tResult}}" disabled>  </td>
                                   
                                </tr>
                           @endforeach
                                </tbody>
             
                            </table>
                            @else
                                <h3 class="text text-center">No Leaderboard</h3>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>



                <div class="modal-footer">
                <a href="{{route('tournaments.show',$tournament)}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>


  </div>
  

            </div>
            <!-- End main card body -->
        </section>






    @endsection




