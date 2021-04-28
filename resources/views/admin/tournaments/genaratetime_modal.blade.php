<div class="modal fade" id="genaratetimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">สร้างตารางเวลาลงฐานข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Id_genarateTime"action="{{route('tournaments.genarateTime' , $tournament->id)}} " method="post">
                @csrf
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">จำนวนรถ</label>
                        <input class="form-control " type="text" name="name" class="form-control" id="exampleInputEmail1">
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                  <!-- Date -->
                  <div class="form-group">
                        <label for="time">เวลา</label>
                        <input type="text" class="form-control" id="s_time" name="s_time" placeholder="hh:mm:ss" value="12:00:00">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="BikePerRound">จำนวนรถ ต่อ รอบ</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="BikePerRound" name="BikePerRound">
                            @for($x = 1; $x <= 10; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                            @endfor
                        </select>
                    </div>
         
                    </div> <!--   End col   -->
                    
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="TimePerRound">เวลา ต่อ รอบ</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="TimePerRound" name="TimePerRound">
                            @for($x = 1; $x <= 5; $x++)
                            <option value="{{$x * 30 }}">{{$x * 30}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>
                    </div>




              
                    <div class="form-group">
                        <label for="tour_id"> รายการแข่งขัน</label>
                        <input type="hidden" name="tour_id" value="{{$tournament->id}}">  
                        <input type="text" name="tour_s" class="form-control" id="{{$tournament->id}}" value="{{$tournament->name}}" disabled>
                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">สร้าง</button>
                </div>
            </form>
            </div>
        </div>
    </div>
 
</div>


