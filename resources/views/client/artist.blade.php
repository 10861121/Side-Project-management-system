<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<style>
    #ul {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #ui {
            list-style: none;
            height: 90px;
            line-height: 90px;
        }
        .box4{
            display: flex;
            align-items:center;
            justify-content:space-between;
            overflow:hidden;
        }
        .box4 .img{
            width: 100%;
            height: 100%;
            background-color: white;
            transition: transform 1.8s ease-in;
        }
        .box4:hover .img{
            transform: translateX(200px);
        }
        .box_content{
            margin-left: -100%;
            visibility:hidden;
            transition: all 2s 1s;        }
        .box4:hover .box_content{
            margin-left: 0%;
            visibility: visible;
            transition: all 0.8s 1.6s;
        }
</style>
<script>
    var request = new XMLHttpRequest();
    request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/Artistlist", true);
    request.onload = function(){
        if(this.status >= 200 && this.status < 400) {
            let response = JSON.parse(this.response)
            console.log(response)
            for (let i=0; i<response['ARTIST_ID'].length; i++){
                // document.getElementById("NEWS_T1").innerHTML = response['NEWS_T1'][movie-1];
                // document.getElementById("NEWS_TITLE").innerHTML = response['NEWS_TITLE'][movie-1];
                // document.getElementById("NEWS_T2").innerHTML = response['NEWS_T2'][movie-1];
                // document.getElementById("NEWS_CONTENT").innerHTML = response['NEWS_CONTENT'][movie-1];
                // document.getElementById("img").src = response['NEWS_IMGURL'][movie-1];
                // document.getElementById("urla").innerHTML = "lalla@nfu.edu.tw";
                // Create a div with a card class

                const card = document.createElement('div');
                card.setAttribute('class', 'col-lg-4 col-sm-3 col-md-4 col-xs-3');
                card.setAttribute('onclick',"$('#suspension').show()");
               
                const aurl = document.createElement('a');
                aurl.setAttribute('class', 'nav-link')
                aurl.href='Artist_CONTENT?ARTIST_ID='+response['ARTIST_ID'][i];
                aurl.setAttribute('style','text-decoration:none;');

                const box = document.createElement('div');
                box.setAttribute('class','box box4 bg-secondary');

                const box_content = document.createElement('div');
                box_content.setAttribute('class','box_content text-center text-white col-lg-12');

                const artist_content = document.createElement('h5');
                artist_content.innerHTML = response['ARTIST_CONTENT'][i];

                const img = document.createElement('img');
                img.setAttribute('class', 'img col-lg-12');
                img.src = response['ARTIST_IMGURL'][i];

                const artist_name = document.createElement('h6');
                artist_name.setAttribute('class','col-lg-12 col-sm-12 col-md-12 col-xs-12 mb-12 text-center');
                artist_name.innerHTML = response['ARTIST_NAME'][i];

                const p = document.createElement('p');
                p.setAttribute('class','col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center');

                const artist_ename = document.createElement('small');
                artist_ename.innerHTML = response['ARTIST_ENNAME'][i];



                // Append the cards to the container element
                document.getElementById("row").appendChild(card);

                // Each card will contain an h1 and a p

                card.appendChild(aurl);
                aurl.appendChild(box);
                box.appendChild(box_content);
                box_content.appendChild(artist_content);
                box.appendChild(img);
                card.appendChild(artist_name);
                card.appendChild(p);
                p.appendChild(artist_ename);
     
            };
        };
    }
    request.send();
</script>
<body class=" bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-4">
                    <a class="navbar-brand" href="{{url('web/Home')}}"><img class="col-lg-12" src="{!! url('/logo/logo.png') !!}"></a>
                </div>
                <div class="col-lg-8 col-sm-12 col-md-8 ">
                    <ul class="navbar-nav ml-auto" id="ul" class="row align-items-center">
                        <li class="nav-item  mr-2" id="ui">
                            <a class="nav-link col" href="{{url('web/Home')}}">|HOME|</span></a>
                        </li>
                        <li class="nav-item active mr-2" id="ui">
                            <a class="nav-link" href="{{url('web/News')}}">|NEWS|</a>
                        </li>
                        <li class="nav-item mr-2" id="ui">
                            <a class="nav-link " href="{{url('web/Exhibition?YEAR_NUMBER=1')}}">|EXHIBITION|</a>
                        </li>
                        <li class="nav-item mr-2" id="ui">
                            <a class="nav-link " href="{{url('web/Artist')}}">|ARTIST|</a>
                        </li>
                        <li class="nav-item mr-2" id="ui">
                            <a class="nav-link " href="{{url('web/About')}}">|ABOUT|</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('web/Home')}}">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">NEWS</li>   
        </ol>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center " id="row">
            <!-- @if(isset($DBartist))
                @foreach($DBartist as $artist)
                    <div class="col-lg-4 col-sm-3 col-md-4 col-xs-3" onclick="$('#suspension').show();">    
                        <a href="artist_content.php?artist_id={{$artist->ARTIST_ID}}" style="text-decoration:none;">
                            <div class="box box4 bg-secondary">
                                <div class="box_content text-center text-white col-lg-12"><h5>{{$artist->ARTIST_CONTENT}}</h5></div>
                                <img class="img col-lg-12" src='{{$artist->ARTIST_IMGURL}}'>
                            </div>
                        </a>
                            <h6 class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mb-12 text-center">{{$artist->ARTIST_NAME}}</h6>
                            <p class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center" ><small>{{$artist->ARTIST_ENNAME}}</small></p>   
                    </div>
                @endforeach
            @endif -->
        </div>
    </div>
    <footer class="py-3 bg-dark">
        <p class="text-center text-white">國立虎尾科技大學 National Formosa University © All RIGHTS RESERVED.</br>
                校務資訊聯絡單位：秘書室</br>
                E-Mail：secretary@nfu.edu.tw</br>
                電話：886-5-6315000</br>
                傳真：886-5-6315999</br>
                統一編號：64967512</br>
                地址：632 雲林縣虎尾鎮文化路64號 No.64</br>
                版權聯絡單位：電算中心網路組</br>
                E-Mail：network@nfu.edu.tw，若您對本站資料之版權有疑慮，請與網路組聯絡。</p>
        <p class="text-center text-white">Copyright &copy; NFU 2019</p>
    </footer>
    <script>
        AOS.init();
    </script>
</body>

</html>