<br>
<br>

  <div class="container col-md-12 ">
    <div class="card   border-dark ">
                        <div class="card-header text-white " style="background-color:#060c22;">
                        <i class="fas fa-angle-down"> </i> <i class="fas fa-angle-up"></i>    <span class="h4">ผลการแข่งขัน 
                        @isset($tournament)
                            {{$tournament->name}}
                        @endif


</span>
                      
                        <!-- <input type="text" name="name" class="form-control"id="FrontDate"> -->
                        <span class="badge badge-danger blink_badge "> <a href="/live-online" target="_blank" class="text-white">  Live</a>
                        </span>
               
                        <span class="h4 blink_me "  id="FrontDate" ></span>

                        <span class="text float-right"> (update every 30 second)</span>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                      
                          
                            <table id="tabelLeaderboardFront" class=" table  table-bordered table-striped">
                                <thead>
                                <tr>
                                    <!-- <th>No.</th> -->
                                    <th>Name</th>
                                    <!-- <th>Stage</th> -->
                                    <th>Tag RFID</th>
                                    <th>Time Start</th>
                                    <th>Time Finish</th>
                                    <th>Time Result</th>
                                    <!-- <th>PC1</th> -->
                                    <!-- <th> Action</th> -->
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