<?php
$ARTIST_ID = $_GET["ARTIST_ID"];
echo $ARTIST_ID;
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
        request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/ArtistContent?ARTIST_ID=<?php echo $ARTIST_ID?>", true);
        request.onload = function(){

            if(this.status >= 200 && this.status < 400) {

                let response = JSON.parse(this.response)
                console.log(response)
                // alert(response['ARTIST_CONTENT']);
                // Create a div with a card class
                const card = document.createElement('div');
                card.setAttribute('class', 'row justify-content-center align-items-center');

                const box_header = document.createElement('div');
                box_header.setAttribute('class', 'col-lg-6 mb-4');

                const header_h2 = document.createElement('h2');
                header_h2.innerHTML = "簡介";

                const artist_content = document.createElement('p');
                artist_content.innerHTML = response['ARTIST_CONTENT'];

                const box_content = document.createElement('div');
                box_content.setAttribute('class', 'col-lg-6 mb-4 text-center');

                const img = document.createElement('img');
                img.setAttribute('class', 'img-fluid');
                img.src = response['ARTIST_IMGURL'];

                const br = document.createElement('br');

                const artist_name = document.createElement('h4');
                artist_name.innerHTML = response['ARTIST_NAME'];

                const artist_ename = document.createElement('small');
                artist_ename.innerHTML = response['ARTIST_ENNAME'];


                // Append the cards to the container element
                document.getElementById("container").appendChild(card);

                // Each card will contain an h1 and a p

                card.appendChild(box_header);
                box_header.appendChild(header_h2);
                box_header.appendChild(artist_content);
                card.appendChild(box_content);
                box_content.appendChild(img);
                box_content.appendChild(br);
                box_content.appendChild(artist_name); 
                box_content.appendChild(artist_ename); 

                
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
                </div>
            </nav>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('web/Home')}}">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">ARTIST</li>   
        </ol>
    </div>
    <div class="container" id="container">
    <button type="button" class="btn btn-primary" id="btn"><a href="{{url('web/Artist')}}" class="text-white">上一頁</a></button>
        <!-- <div class="row justify-content-center align-items-center"> -->
           
        <!-- </div> -->
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