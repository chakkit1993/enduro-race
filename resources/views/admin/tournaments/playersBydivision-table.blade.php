@extends('layouts.master')

@section('content')

    <div class="container-fluid">
    <a href="{{ redirect()->back()->getTargetUrl() }}">
<button type="button" class="btn btn-secondary" data-dismiss="modal">กลับ</button></a>
<br><br>
</div>


<div class="col-md-12 ">
    <div class="card">
                        <div class="card-header">
                            <span class="h4">รายชื่อ ผู้เข้าร่วมการแข่งขัน</span>
                            <!-- <form class="delete_form " action="{{route('tournaments.deleteAll',$tournament->id)}}" method="post">
                                            @csrf
                            <input type="hidden" name="_method" value="DELETE">  
                            <button type="submit" name="" value="Delete" class="btn btn-danger   float-right "><i class="fas fa fa-trash"></i> <b> Delete 50 Item</b> </button>

                            </form> -->

                            <!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#addPlayerModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadPlayerModal">
                            <i class="fas fa-file-upload"><b> Upload</b></i>
                            </button> -->

                    


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tablePlayerByDivision" class="table  table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Motorcycle No</th>
                                    <th>Tag RFID</th>
                                    <th>T1</th>
                                    <th>T2</th>
                                    <th>TReuslt</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                             
                
                                </tbody>
                                </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div> 
  <!-- end col-12 -->

  
  @endsection