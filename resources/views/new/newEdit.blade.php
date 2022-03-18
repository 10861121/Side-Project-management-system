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
    var checkorder = function(order){
        // alert("http://127.0.0.1/blog/public/admin/checkorder?order="+order);
        var request = new XMLHttpRequest();
        request.open("GET", "http://127.0.0.1/blog/public/admin/checkorder?order="+order, true);
        request.onload = function(){

            if(this.status >= 200 && this.status < 400) {
                let response = JSON.parse(this.response)
                console.log(response)
                $message = response['message'];
                // alert($message);
                document.getElementById("message").innerHTML=$message;       
            };
        }
        request.send();

    }
</script>
@endsection
@section('content')
<div class="row align-items-center">
    <div class="col-lg-12 mb-12 mt-2"><h3>訊息管理</h5></div>
</div>
@if($errors->any())
    <h5 style="color:red">{{$errors->first()}}</h4>
@endif
<form action="{{action('NewController@NewEditAction')}}" method="post" enctype="multipart/form-data">
    @csrf
     <input type="hidden" class="form-control" name="id" aria-describedby="emailHelp" placeholder="title" value="{{$DBnew->NEWS_ID}}">
    <div class="form-group">
        <label>年月</label>
        <input type="text" class="form-control" name="t1" id="title" aria-describedby="emailHelp" placeholder="t1" value="{{$DBnew->NEWS_T1}}">
    </div>
    <div class="form-group">
        <label>標題</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="title" value="{{$DBnew->NEWS_TITLE}}">
    </div>
    <div class="form-group">
        <label>開始-結束</label>
        <input type="text" class="form-control" name="t2" id="title" aria-describedby="emailHelp" placeholder="t1" value="{{$DBnew->NEWS_T2}}">
    </div>
    <div class="form-group">
        <label>內容</label>
        <input type="text" class="form-control" name="content" id="title" aria-describedby="emailHelp" placeholder="title" value="{{$DBnew->NEWS_CONTENT}}">
    </div>
    <div class="form-group">
        <label>圖片上傳</label>
        <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)">
        <label>目前影像：</label><img style="width:20%;height: 20%;" src="{{url('image/new/',$DBnew->NEWS_IMGURL)}}" />
        <label>更換影像：</label><img id="output" style="width:20%;height: 20%;" src="{{$DBnew->NEWS_IMGURL}}" />
    </div>
    
    </br>
    <button type="submit" class="btn btn-primary" style="display: inline; ">Submit</button>
    <div class="col-lg-2 mb-4 mt-2" style="display: inline; "><a href="javascript:history.back()" class="btn btn-danger">取消</a></div>
</form>
@endsection
              