@extends('layouts.master')

@section('content')
<?php
use Illuminate\Support\Facades\Config;
?>
<?php $colors =  Config::get('constants.color'); $class =  Config::get('constants.class'); ?>
 <!-- Page Content -->
 <div id="content">
 <div class="card">


 <div class="card-header">

 @include('admin.tournaments.header-tournamnet')

      </div>
 <!--  .card-header -->
  


   <!--  main card body -->
   <div class="card-body">
   
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
            
            <img src="{{$disk->url($tournament->img)}}" class="card-img-top" alt="..."    style="width: 100%;  height: 180px;    object-fit: scale-down; "  >
            </div>
            <div class="col-md-4 ">
            <a id="{{$tournament->id}}" href="#editTournamentsModal" class="btn btn-success editTournaments" data-toggle="modal">
                    <i class="fa fa-edit"><b>ตั้งค่า</b></i>
                </a>
            <button class="btn btn-warning  createtimeModal" data-toggle="modal" data-target="#createtimeModal">
                <i class="fa fa-horse-head"><b>สร้างตารางเวลา Excel</b></i>
                
            </button>



            </div>
            </div>
    @include('admin.tournaments.division-table')
    @include('admin.tournaments.players-table')
    {{--@include('admin.tournaments.leaderboard-table')--}}


  
     
      </div>   
    </div>

    
    
    
 </div>

 @include('admin.tournaments.modal.add-player')
 @include('admin.tournaments.modal.add-division')
 @include('admin.tournaments.modal.edit-division')
 @include('admin.tournaments.modal.edit-tournament')
 @include('admin.tournaments.modal.upload-file-division')
 @include('admin.tournaments.modal.upload-file-player')
 @include('admin.tournaments.modal.create_time_modal')


@endsection