
    <div class="row">
     
   


<div class="col-md-12 ">
    <div class="card">
                        <div class="card-header">
                            <span class="h4">ประเภทการแข่งขัน จำนวน {{$divisions->count()}} รายการ</span>
                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addDivisionModal">
                                <i class="fa fa-plus"><b>เพิ่มข้อมูล</b></i>
                            </button>
                            
<!-- 
                            <form class="" action="" method="post">
                                @csrf
                            <input type="hidden" name="_method" value="{{$tournament->id}}">  
                            <button type="submit" name="" value="ID" class="btn btn-danger   float-left "><i class="fas fa fa-trash"></i> </button>

                            </form> -->


                            <a class="btn btn-danger float-right" href="{{route('divisions.export',$tournament->id)}}"   >
                            <i class="fas fa-file-download"><b> Download</b></i>
                            </a>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadDivisionModal">
                            <i class="fas fa-file-upload"><b> Upload</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        @if($divisions->count()>0)
                            <table id="tabelDivision" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <!-- <th>Image</th> -->
                                    <th>Name</th>
                                    <th>Count</th>
                                    <th>Download</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl = 1)
                                        <?php
                                
                                        $n = 0; ?>
                                       
                                        @foreach($divisions as $division)
                                                <tr>
                                                <?php $n++; ?>
                                                    <td>{{$n}}</td>
                                                    <td> <span class='badge badge-success'  style='background-color:{{$colors[$division->color]}}'> {{$division->code}}</span> </td> 
                                                    <td>{{$division->name}}</td>
                                                    <td>{{$division->players()->count()}}</td>
                                                    <td>
                                                    <a class="btn btn-danger" href="{{route('players.export',$division->id)}}"   >
                                                        <i class="fas fa-file-download"><b> Download</b></i>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{route('tournaments.playersByDivision',['tournament'=> $tournament,'division' =>$division])}}"   >
                                                        <i class="fas fa-file-info"><b> S1</b></i>
                                                        </a>
                                                    </td>
                                                    <td>  
                                        
                                                        <a id="{{$division->id}}" href="#editDivisionModal" class="btn btn-success  float-left  editDivision" data-toggle="modal">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <form class="delete_form" action="{{route('divisions.destroy',$division->id)}}" method="post">
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
                                <th>No.</th>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot> -->
                            </table>
                            @else
                                <h3 class="text text-center">No Division</h3>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
    </div> 
    </div> 
      <!-- /.row -->