
  <div class="col-md-12 ">
    <div class="card">
                        <div class="card-header">
                            <span class="h4">ตารางเวลาการแข่งขัน</span>
                     
                            <!-- <button class="btn btn-success float-right addTime" data-toggle="modal" data-target="#">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadTimeModal">
                            <i class="fas fa-file-upload"><b> Upload</b></i>
                            </button> -->
                     
                            <a href="{{route('timer.calculateTime',$tournament->id)}}" class="btn btn-success   float-left">คำนวณเวลาใหม่ <i class="fas fa-info-circle"></i></i></a>

                            <button class="btn btn-warning float-right genarateTime" data-toggle="modal" data-target="#genaratetimeModal">
                                <i class="fa fa-horse-head"><b> สร้างตารางเวลาลงฐานข้อมูล</b></i>
                            </button>

                  

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- //update data with json at  js/dataTableCustom -->
                            <table id="tabelLeaderboardAdmin" class=" table  table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <!-- <th>Stage</th> -->
                                    <th>Tag RFID</th>
                                    <th>Time Start</th>
                                    <th>Time Finish</th>
                                    <th>Time Result</th>
                                    <th>PC1</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                              
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
                        
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </div> 
  <!-- end col-12 -->