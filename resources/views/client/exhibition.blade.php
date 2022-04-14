<?php
$YEAR_NUMBER = $_GET["YEAR_NUMBER"];
// echo $YEAR_NUMBER;
?>
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
        #ul1 {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #ui1 {
            list-style: none;
            height: 20px;
            line-height: 20px;
        }
        #etitle:hover{
            background-color:#888888;
        }
        #img:hover{
        transform:scale(1.2,1.2);
        }
        #img{
            transform:scale(1,1);transition: all 1s ease-out;
        }
        #divimg{
            overflow:hidden;
        }
        .card img{
            width: 100%;
            height: 100%;
        }
        .t-card .card{
            display: inline-block;
            margin:0 auto;
        }
        </style>
    <script>
        var request = new XMLHttpRequest();
        request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/Exhibitionlist?YEAR_NUMBER=<?php echo $YEAR_NUMBER?>", true);

        request.onload = function(){

            if(this.status >= 200 && this.status < 400) {

                let response = JSON.parse(this.response)
                console.log(response)
                for (let i=0; i<response['YEAR_ID'].length; i++){
                    // Create a div with a card class
                    const aurl = document.createElement('a');
                    aurl.setAttribute('class', 'nav-link')
                    aurl.href='Exhibition?YEAR_NUMBER='+response['YEAR_ID'][i];

                    const etitle = document.createElement('div');
                    etitle.setAttribute('class', 'col-lg-12 col-sm-3 col-md-3 col-xs-3 mb-4');
                    etitle.setAttribute('id', 'etitle');
                    etitle.innerHTML = response['YEAR'][i];


                    // Append the cards to the container element
                    document.getElementById("leftmeanu").appendChild(aurl);

                    // Each card will contain an h1 and a p
                    aurl.appendChild(etitle);

                };

                // response['EXHIBITION_ID'].forEach(movie => 
                for (let i=0; i<response['EXHIBITION_ID'].length; i++){
                   
                    // Create a div with a card class
                    const card = document.createElement('div');
                    card.setAttribute('class', 't-card col-sm-6 col-md-4 col-sm-12 text-center');

                    const cardtextcenter = document.createElement('div');
                    cardtextcenter.setAttribute('class', 'card text-center');
                    cardtextcenter.setAttribute('id', 'divimg');

                    const img = document.createElement('img');
                    img.setAttribute('class', 'card-img-top');
                    img.setAttribute('id', 'img');
                    img.src = response['EXHIBITION_IMGURL'][i];

                    const cardbody = document.createElement('div');
                    cardbody.setAttribute('class', 'card-body');
                    cardbody.setAttribute('id', 'cardbody');

                    const cardTITLE = document.createElement('h5');
                    cardTITLE.setAttribute('class','card-title');
                    cardTITLE.setAttribute('id','EXHIBITION_TITLE');
                    cardTITLE.innerHTML = response['EXHIBITION_TITLE'][i];;
                    
                    const pT1 = document.createElement('p');
                    pT1.setAttribute('class','card-text');
                    const cardEXHIBITION_T1 = document.createElement('small');
                    cardEXHIBITION_T1.setAttribute('class','text-muted');
                    cardEXHIBITION_T1.setAttribute('id','EXHIBITION_T1');
                    cardEXHIBITION_T1.innerHTML= response['EXHIBITION_T1'][i];

                    // Append the cards to the container element
                    document.getElementById("row").appendChild(card);

                    // Each card will contain an h1 and a p

                    card.appendChild(cardtextcenter).appendChild(img) ;
                    cardtextcenter.appendChild(cardbody);
                    cardbody.appendChild(cardTITLE);
                    cardbody.appendChild(pT1).appendChild(cardEXHIBITION_T1); 

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
            <li class="breadcrumb-item"><a href="{{url('web/Home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">EXHIBITION</li>
            <!-- <li class="breadcrumb-item active" aria-current="page">2019</li> -->
        </ol>
        <div class="row">
            <div class="col-lg-4 mb-4 " id="leftmeanu" >
                <div class="col-lg-12 text-white text-center mb-4 " style="background-color:#888888;" id="ul1">
                    <p id="ui1"> Exhibitions Age</p>
                </div>
               <!--  @if(isset($DBexhibition_year))
                    @foreach($DBexhibition_year as $exhibition_year)
                        <a class="nav-link" href="{{Action('ExhibitionConhtroller@Exhibitionlist', ['year_id' =>$exhibition_year->EXHIBITION_YEAR_ID ])}}">
                            <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3 mb-4"  id="etitle">
                               {{ $exhibition_year->EXHIBITION_YEAR}}
                            </div>
                        </a>
                     @endforeach
                @endif -->
                
            </div>
            <div class="col-lg-8 mb-4">
                <div class="row" id="row">
                    <!-- @if(isset($DBexhibition))
                        @foreach($DBexhibition as $exhibition)
                            <div class="t-card col-sm-6 col-md-6 col-sm-12 text-center mb-4" data-aos="fade-up">
                                <div class="card text-center" id="divimg" style="width: 18rem;">
                                    <img src='{{ $exhibition->EXHIBITION_IMGURL}}' id="img" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $exhibition->EXHIBITION_TITLE}}</h5>
                                        <p class="card-text"><small class="text-muted">{{ $exhibition->EXHIBITION_T1}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif -->
                </div>
            </div>
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