
<div class="row">
<div class="col-md-12 ">
    <div class="card">
                        <div class="card-header">
                            <span class="h4">ผู้เข้าร่วมการแข่งขัน จำนวน {{$players->count()}}</span>
                            <form class="delete_form " action="{{route('tournaments.deleteAll',$tournament->id)}}" method="post">
                                            @csrf
                            <input type="hidden" name="_method" value="DELETE">  
                            <button type="submit" name="" value="Delete" class="btn btn-danger   float-right "><i class="fas fa fa-trash"></i> <b> Delete 50 Item</b> </button>

                            </form>

                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addPlayerModal">
                                <i class="fa fa-plus"><b>เพิ่มข้อมูล</b></i>
                            </button>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadPlayerModal">
                            <i class="fas fa-file-upload"><b> Upload</b></i>
                            </button>

                    


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <?php
                        $n = 0; ?>
                              @if($players->count()>0)
                            <table id="tabelPlayer" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Motorcycle No</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl = 1)
                                @foreach($players as $player)
                                <?php $n++; ?>
                                <tr>
                                    <td>{{ $n}}</td>
                                    <td>{{$player->name}}</td>
                                    <td>{{$player->no}} </td>
                                    <td>
                                 

                                   
                                    @foreach($player->divisions()->get() as $division)
                                    
                                         <span class='badge badge-success'  style='background-color:{{$colors[$division->color]}}'>{{$division->code}}</span>
                                        @endforeach
                                 
                                 
                                    </td>
                                    
                                      <td>  
                                        
                                      <a id="{{$player->id}}" href="{{route('players.editPlayer',['tournament'=> $tournament,'player' => $player])}}" class="btn btn-success  float-left  ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form class="delete_form" action="{{route('players.destroy',$player->id)}}" method="post">
                                            @csrf
                                        <input type="hidden" name="_method" value="DELETE">  
                                        <button type="submit" name="" value="Delete" class="btn btn-danger   float-left "><i class="fas fa fa-trash"></i> </button>

                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                                </tbody>
                                <!-- <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>User Role</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot> -->
                            </table>
                            @else
                                <h3 class="text text-center">No Players</h3>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div> 
  <!-- end col-12 -->
  </div>