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
    @yield('style')
    @yield('javascript')
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
                     @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>