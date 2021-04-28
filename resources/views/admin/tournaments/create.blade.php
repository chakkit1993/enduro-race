@extends('layouts.master')
@section('content')
<div id="content">
<div class="container">
<div id="app">

    <h2>สร้าง รายการแข่งขัน</h2>
    <form action="" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="name" id="name" value=""placeholder="Tournaments Name">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียด</label>
            <input type="text" class="form-control" name="description" value="" id="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="description"><Address></Address></label>
            <input type="text" class="form-control" name="address" value="" id="address" placeholder="Address">
        </div>
        <div class="form-group ">
        <div class="row">

             <div class="col-md-4">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control" name="image" id="image" value="" >
            </div>
            </div>
        </div>
     
        <div class="form-group">
            <label for="type">ราคา</label>
            <input type="text" class="form-control" name="price" id="price" value="" placeholder="Price" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>

</div>
</div>
</div>

@endsection