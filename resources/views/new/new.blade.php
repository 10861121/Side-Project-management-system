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
    
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
</script>
@endsection
@section('content')
<div class="row align-items-center">
    <div class="col-lg-12 mb-12 mt-2"><h3>訊息管理</h5></div>
</div>
<div class="col-lg-2 mb-4 mt-2"><a href="{{action('NewController@NewAdd')}}" class="btn btn-primary">+ 新增</a></div>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>image</th>
            <th>Year-Month</th>
            <th>title</th>
            <th>Time Start-End</th>
            <!-- <th>CONTENT</th> -->
            <th>edit</th>
            <th>del</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($DBnew))
            @foreach($DBnew as $new)
                <tr>
                    <td><img src="{{url('image/new/',$new->NEWS_IMGURL)}}" style="width:50px;"></td>
                    <td>{{$new->NEWS_T1}}</td>
                    <td>{{$new->NEWS_TITLE}}</td>
                    <td>{{$new->NEWS_T2}}</td>
                    <!-- <td>{{$new->NEWS_CONTENT}}</td> -->
                    <td><a href="{{action('NewController@NewEdit',$new->NEWS_ID)}}" class="btn btn-warning">+ 修改</a></td>
                    <td><a href="{{action('NewController@NewDeleteAction',$new->NEWS_ID)}}" class="btn btn-danger">+ 刪除</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
                