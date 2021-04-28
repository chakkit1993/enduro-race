 <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @if($divisions->count()>0)
              <h3 class="text ">{{$divisions->count()}}</h3>
                @else
                <h3 class="text ">0</h3>
            @endif
                <p>ประเภทการแข่งขัน </p>
              </div>
              <div class="icon">
              <i class="fas fa-motorcycle"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              @if($players->count()>0)
              <h3 class="text ">{{$players->count()}}</h3>
                @else
                <h3 class="text ">0</h3>
            @endif
                <p>ผู้เข้าร่วมการแข่งขัน </p>

              </div>
              <div class="icon">
              <i class= "fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
              <i class="fas fa-map-marked-alt"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
        </div>
 <!-- ./row -->