@extends('layouts.master')

@section('content')
 <!-- Page Content -->
 <div id="content">
 <div class="card">


 <div class="card-header">
   <div class="row">

   <div class="col-md-4 ">
   <span class="h4">Tournament : {{$tournament->name}}</span>
   <br>
   <span class="h4">Date : {{$tournament->date}}</span>
   <br>
   <span class="h4">Address : {{$tournament->address}}</span>
   <br>
   <span class="h4">Description : {{$tournament->description}}</span>
   </div>
   <div class="col-md-4 ">
   <img src="" class="card-img-top" alt="..."    style="width: 100%;  height: 180px;    object-fit: scale-down; "  >
   </div>
   <div class="col-md-4 ">
   <a id="{{$tournament->id}}" href="#editTournamentsModal" class="btn btn-success editTournaments" data-toggle="modal">
            <i class="fa fa-edit"></i>
        </a>

   </div>
   </div>
      </div>

  


   <!--  main card body -->
   <div class="card-body">
   
 
   
    <div class="form-group">
    <div class="row">
   {{--@include('admin.tournaments.division-table')--}}
   <!-- <projects></projects> -->

      </div> 
      </div>
      </div>   
    </div>

    
    
    
 </div>



@endsection