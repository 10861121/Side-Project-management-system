<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <title>Hello, world!</title>
    </head>
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
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <body>
       <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="col-lg-2 col-sm-12 col-md-2 ">
                <a class="navbar-brand" href="{{url('web/Home')}}"><img class="col-lg-12" src="{!! url('/logo/logo.png') !!}"></a>
            </div>
            <div class="col-lg-10 col-sm-12 col-md-10 text-right">
               <a class="navbar-brand" href="{{action('LoginController@Loginout')}}">登出</a>
            </div>
        </div>
    </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 " id="left-meanu" >
                    <ul class="navbar-nav">
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link active h5" aria-current="page"href="{{url('web/Home')}}">前端畫面</a>
                        </li>
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link h5" href="{{action('HomeController@Home')}}">首頁管理</a>
                        </li>
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link h5" href="{{action('NewController@New')}}">訊息管理</a>
                        </li>
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link h5" href="{{action('ExhibitionConhtroller@Exhibition')}}">展覽管理</a>
                        </li>
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link h5" href="{{action('ArtistController@Artist')}}">藝術家管理</a>
                        </li>
                        <li id="left-title" class="nav-item mr-2 col-lg-12 col-sm-2">
                            <a class="nav-link h5" href="{{action('AboutController@About',1)}}">關於我們</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10 mb-4">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mb-12 mt-2"><h3>藝術家管理</h5></div>
                    </div>
                    @if($errors->any())
                        <h5 style="color:red">{{$errors->first()}}</h4>
                    @endif
                    <form action="{{action('ExhibitionConhtroller@ExhibitionAddAction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>標題</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label>展覽時間</label>
                            <input type="text" class="form-control" name="t1" id="title" aria-describedby="emailHelp" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label>年份</label>
                            <select class="form-select" aria-label="Default select example" name="year">
                                @if(isset($exhibition_year))
                                    @foreach($exhibition_year as $year)
                                        <option  value="{{$year->EXHIBITION_YEAR_ID}}">{{$year->EXHIBITION_YEAR}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>圖片上傳</label>
                            <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)">
                            <img id="output" style="width:20%;height: 20%;" />
                        </div>
                        <button type="submit" class="btn btn-primary" style="display: inline; ">Submit</button>
                        <div class="col-lg-2 mb-4 mt-2" style="display: inline; "><a href="javascript:history.back()" class="btn btn-danger">取消</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>