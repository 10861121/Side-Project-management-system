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
<style>
    #ul{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    #ui{
        list-style: none;
        height: 90px;
        line-height: 90px;
    }
    hr.style-four {
        height: 12px;
        border: 0;
        box-shadow: inset 0 12px 12px -12px rgba(0,0,0,0.5);
    }
    .row #img{
        width: 500px;
        height: 200px;
    }
</style>
<script>



    var request = new XMLHttpRequest();
    request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/Homelist", true);
    request.onload = function(){
        if(this.status >= 200 && this.status < 400) {
            let response = JSON.parse(this.response)
            console.log(response)
            for (let i=0; i<3; i++){
                // Create a div with a card class

                const news_card = document.createElement('div');
                news_card.setAttribute('class', 'col-lg-4 mb-4 text-center');
                const news_img = document.createElement('img');
                news_img.setAttribute('class', 'img-fluid');
                news_img.src = response['NEWS_IMGURL'][i];
                const news_title = document.createElement('h5');
                news_title.innerHTML = response['NEWS_TITLE'][i];

                const exhibiton_card = document.createElement('div');
                exhibiton_card.setAttribute('class', 'col-lg-4 mb-4 text-center');
                const exhibiton_img = document.createElement('img');
                exhibiton_img.setAttribute('class', 'img-fluid');
                exhibiton_img.src = response['EXHIBITION_IMGURL'][i];
                const exhibiton_title = document.createElement('h5');
                exhibiton_title.innerHTML = response['EXHIBITION_TITLE'][i];

                const artist_card = document.createElement('div');
                artist_card.setAttribute('class', 'col-lg-4 mb-4 text-center');
                const artist_img = document.createElement('img');
                artist_img.setAttribute('class', 'img-fluid');
                artist_img.src = response['ARTIST_IMGURL'][i];
                const artist_name = document.createElement('h5');
                artist_name.innerHTML = response['ARTIST_NAME'][i];

            
                // Append the cards to the container element
                document.getElementById("new_row").appendChild(news_card);
                document.getElementById("exhibiton_row").appendChild(exhibiton_card);
                document.getElementById("artist_row").appendChild(artist_card);
                
                // Each card will contain an h1 and a p

                news_card.appendChild(news_img);
                news_card.appendChild(news_title);

                exhibiton_card.appendChild(exhibiton_img);
                exhibiton_card.appendChild(exhibiton_title);

                artist_card.appendChild(artist_img);
                artist_card.appendChild(artist_name);

                
     
            };

            for (let i=0; i<response['ca_file'].length; i++){

                const carousel_div_after = document.createElement('div');
                if (i==0) 
                {
                    carousel_div_after.setAttribute('class','carousel-item active');
                }
                else
                {
                    carousel_div_after.setAttribute('class','carousel-item');
                }
                
                const carousel_img_after = document.createElement('img');
                carousel_img_after.setAttribute('class', 'd-block w-100');
                carousel_img_after.src = response['ca_file'][i];
                document.getElementById("carousel").appendChild(carousel_div_after);
                carousel_div_after.appendChild(carousel_img_after);
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
                        <li class="nav-item mr-2 active" id="ui">
                            <a class="nav-link " href="{{url('web/Exhibition?YEAR_NUMBER=1')}}">|EXHIBITION|</a>
                        </li>
                        <li class="nav-item mr-2 active" id="ui">
                            <a class="nav-link " href="{{url('web/Artist')}}">|ARTIST|</a>
                        </li>
                        <li class="nav-item mr-2 active" id="ui">
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
        </ol>
        <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" id="carousel">
               
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        
        <div class="row" id="new_row">
            <div class="col-lg-12 mb-4 text-center">
                <h3>NEWS</h3>
            </div>
        </div>
        <hr>
        <div class="row" id="exhibiton_row">
            <div class="col-lg-12 mb-4 text-center">
                <h3>EXHIBITIONS</h3>
            </div>
        </div>
        <hr>
        <div class="row" id="artist_row">
            <div class="col-lg-12 mb-4 text-center">
                <h3>ARTIST</h3>
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

</body>

</html>