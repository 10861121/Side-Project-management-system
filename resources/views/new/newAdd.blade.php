@extends('layout.background')
@section('style')
<style>
    #left-title:hover
    {
        background-color: #888888;
    }
    #left-title a:hover
    {
        color: white;
    }

</style>
@endsection
@section('javascript')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection
@section('content')
<div class="row align-items-center">
    <div class="col-lg-12 mb-12 mt-2"><h3>訊息管理</h5></div>
</div>
@if($errors->any())
    <h5 style="color:red">{{$errors->first()}}</h4>
@endif
<form action="{{action('NewController@NewAddAction')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>年月</label>
        <input type="text" class="form-control" name="t1" id="title" aria-describedby="emailHelp" placeholder="title">
    </div>
    <div class="form-group">
        <label>標題</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="title">
    </div>
    <div class="form-group">
        <label>開始-結束</label>
        <input type="text" class="form-control" name="t2" id="title" aria-describedby="emailHelp" placeholder="title">
    </div>
    <div class="form-group">
        <label>內容</label>
        <input type="text" class="form-control" name="content" id="title" aria-describedby="emailHelp" placeholder="title">
    </div>
    <div class="form-group">
        <label>圖片上傳</label>
        <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)">
        <img id="output" style="width:20%;height: 20%;" />
    </div>
    <button type="submit" class="btn btn-primary" style="display: inline; ">Submit</button>
    <div class="col-lg-2 mb-4 mt-2" style="display: inline; "><a href="javascript:history.back()" class="btn btn-danger">取消</a></div>
</form>
@endsection