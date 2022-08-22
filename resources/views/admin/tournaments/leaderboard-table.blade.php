
  <div class="col-md-12 ">
    <div class="card">
                        <div class="card-header">
                            <span class="h4">ตารางการแข่งขัน</span>
                     
                            <button class="btn btn-success float-right addTime" data-toggle="modal" data-target="#">
                                <i class="fa fa-plus"><b>เพิ่มข้อมูล</b></i>
                            </button>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadTimeModal">
                            <i class="fas fa-file-upload"><b> Upload</b></i>
                            </button>
                            <button class="btn btn-warning float-right genarateTime" data-toggle="modal" data-target="#genaratetimeModal">
                                <i class="fa fa-horse-head"><b> สร้างตารางเวลาลงฐานข้อมูล</b></i>
                              
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                      
                            @if($leaderboards->count()>0 && $players->count()>0)
                            <table id="tabelLeaderboard" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Stage</th>
                                    <th>Tag RFID</th>
                                    <th>Check Point</th>
                                    <th>Time Start</th>
                                    <th>Time Finish</th>
                                    <th>Time Result</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl = 1)
                                @foreach($leaderboards as $leaderboard)
                                <tr>
                                     
                                    <td>{{$leaderboard->id}}</td>
                                    <td>{{$leaderboard->player_id}}   </td>
                                    <td> {{$leaderboard->stage}}  </td>
                                    <td>   </td>
                                    <td>
                                    <span class="badge {{($leaderboard->pc1)?'badge-success':'badge-danger'}} ">PC1</span>
                                    <span class="badge {{($leaderboard->pc2)?'badge-success':'badge-danger'}} ">PC2</span>
                                    <span class="badge {{($leaderboard->pc3)?'badge-success':'badge-danger'}} ">PC3</span>
                                    <span class="badge {{($leaderboard->pc4)?'badge-success':'badge-danger'}} ">PC4</span>
                                    <span class="badge {{($leaderboard->pc5)?'badge-success':'badge-danger'}} ">PC5</span>
                                      </td>
                                      <td>{{$leaderboard->t1}}</td>
                                      <td>{{$leaderboard->t2}}</td>
                                      <td>{{$leaderboard->tResult}}</td>
                                      <td>  
                                      <a id="{{1}}" href="{{}}" class="btn btn-success  float-left  ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                             
                                    </td>
                                </tr>
                           @endforeach
                                </tbody>
                                 <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Stage</th>
                                        <th>Tag RFID</th>
                                        <th>Check Point</th>
                                        <th>Time Start</th>
                                        <th>Time Finish</th>
                                        <th>Time Result</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> 
                            </table>
                            @else
                                <h3 class="text text-center">No Players</h3>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div> 
  <!-- end col-12 -->