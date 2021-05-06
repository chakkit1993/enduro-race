@extends('layouts.app')

@section('content')
<!-- Page Content -->
<section class="content">

  


  <div class="container-fluid">


  @if(isset($live))
  <form method="POST"  action="{{ route('live-online.update', $live->id) }}">
  {{ csrf_field() }}
			{{ method_field('PUT') }}
  <div class="row">
  <div class="col-md-1 col-lg-1 ">   <label for="live_link"> Live Link</label> </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="live_link" class="form-control" id="live_link" value='{{$live->src}}'>

                    </div>
                    </div>
                    <div class="col-md-6 ">
                    <button type="submit" class="btn btn-success float-left">
                    <i class="fas fa-save"></i></button>
                  </div>
                    </div>
  
                    </form>
  @else 
  <form method="POST"  action="{{ route('live-online.store') }}">
  @csrf
  <div class="row">
  <div class="col-md-1 col-lg-1 ">   <label for="live_link"> Live Link</label> </div>
            <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="live_link" class="form-control" id="live_link" value=''>

            </div>
            </div>
            <div class="col-md-6 ">
            <button type="submit" class="btn btn-success float-left">
            <i class="fas fa-save"></i></button>
          </div>
            </div>

            </form>

  @endif

    <!-- <div style="height: 50px;"></div> -->
    <div class="card">
      <div class="card-header">
        <span class="h4">รายการแข่งขัน</span>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addTournamentModal">
          <i class="fa fa-plus"><b>เพิ่มข้อมูล</b></i>
        </button>

      </div>
      <!--  main card body -->
      <div class="card-body">


        <div class="row">
          @foreach($tournaments as $tournament)
          <div class="col-sm-4">
            <div class="card" style="width: 18rem;  ">
              <div class="card-header">
                
                @if($tournament->active)
                <a href="{{route('tournaments.setFrontLeaderboard',$tournament->id)}}" class="btn btn-success float-left">
                  <i class="fas fa-eye"></i></a>
                
                @else
                <a href="{{route('tournaments.setFrontLeaderboard',$tournament->id)}}" class="btn btn-danger float-left">
                <i class="fas fa-eye-slash"></i></a>
                @endif
              
                <a href="" class="btn btn-info float-right text-white">
                <i class="fas fa-copy"></i></a>

              </div>
              <img src="{{$disk->url($tournament->img)}}" class="card-img-top" alt="..." style="width: 100%;  height: 10vw;    object-fit: scale-down; ">
              <div class="card-body">
                <h5 class="card-title">{{$tournament->name}}</h5>
                <p class="card-text">{{$tournament->description}}</p>



              </div>
              <div class="card-footer ">

                <a href="{{route('tournaments.show',$tournament->id)}}" class="btn btn-primary   float-left">รายละเอียดเพิ่มเติม <i class="fas fa-info-circle"></i></i></a>


                <form class="delete_form" action="{{route('tournaments.destroy',$tournament->id)}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" name="" value="Delete" class="btn btn-danger float-right  "><i class="fas fa fa-trash"></i> </button>

                </form>
              </div>

            </div>
          </div>
          @endforeach

        </div>
        <!-- row -->

      </div>
      <!-- End main card body -->
    </div>
    <!-- card -->
  </div>
  <!-- container-fluid -->
</section>
@include('admin.tournaments.modal.add-tournament')
@endsection