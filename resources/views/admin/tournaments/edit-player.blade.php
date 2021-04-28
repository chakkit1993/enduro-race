<div class="modal fade" id="editPlayerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล ผู้เข้าร่วมการแข่งขัน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form  id="updatePlayerForm" method="POST" action=""  enctype="multipart/form-data">
                @csrf
                  @method('PUT')
                

                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1"> ชื่อ</label>
                        <input type="text" name="name" class="form-control" id="player_name">
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="exampleInputPassword1">โทรศัพท์</label>
                        <input type="text" class="form-control" name="phone" id="player_phone" >
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">หมายเลข</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="exampleFormControlSelect2" name="no">
                            @for($x = 0; $x <= 1000; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag RFID</label>
                        <select class="form-control selectpicker show-tick"     data-live-search="true" id="exampleFormControlSelect2" name="tag_id">
                            @for($x = 0; $x <= 1000; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TEST</label>
                        <input type="text" name="test" class="form-control" id="_id">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_id"> รายการแข่งขัน</label>
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


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Player</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>