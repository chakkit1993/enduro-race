<div class="modal fade" id="editTournamentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล รายการแข่งขัน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateTournamentsForm" method="POST" action=""  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- @method('PATCH') -->
                    
                    <div class="row">
                    <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <label for="name">ชื่อ</label>
                        <input type="text" name="name" class="form-control" id="e_name" >
                    </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                    <!-- <div class="form-group">
                        <label for="exampleInputPassword1">Date</label>
                        <input type="text" class="form-control" name="date" id="exampleInputPassword1" >
                    </div> -->
                           <div class="form-group">
                        <label for="date">วันที่จัดการแข่งขัน</label>
                        <input type="text" class="form-control" name="date" id="e_date"/>
                    </div>
               

                    </div>
                    </div>

                    <div class="row">
                    <div class="col ml-auto">
           
                    <div class="form-group">
                        <label for="address">ที่อยู่</label>
                        <textarea type="text" name="address" class="form-control" id="e_address"  ></textarea>
                    </div>
                    </div>
         
                    </div>

                    <div class="row">
                    <div class="col ml-auto">
           
                    <div class="form-group">
                        <label for="description">รายละเอียด</label>
                        <textarea type="text" name="description" class="form-control" id="e_description" ></textarea>
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
                    
            
        
      
                   
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">อัพเดต</button>
                </div>
            </form>
            </div>
        </div>
    </div>


</div>



