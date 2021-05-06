<div class="modal fade" id="addDivisionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม ประเภทการแข่งขัน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('divisions.store' , $tournament->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"> ชื่อประเภทการแข่งขัน</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="row">
                    <div class="col ml-auto">
           
                    <div class="form-group">
                        <label for="description">รายละเอียด</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    </div>
         
                    </div>

                    <div class="row">
                    <div class="col ml-auto">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">สี</label>
                        <select class="form-control selectpicker show-tick"      data-live-search="true" id="exampleFormControlSelect2" id="color"  name="color">
                        @for($x = 0 ; $x < 20; $x++)
                                    
                                    <option value="{{$x}}" data-content="<span class='badge badge-success'  style='background-color:{{$colors[$x]}}'>Color</span>"></option>

                         @endfor
                        </select>
                    </div>
                    </div>
                  
                    </div>


                    <div class="row">
                    <div class="col ml-auto">

                    <div class="form-group">

                        <label for="title">รูปภาพ</label>
                        <input type="file" name="image" value="" class="form-control">
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
                    <button type="submit" class="btn btn-primary">เพิ่ม</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>

