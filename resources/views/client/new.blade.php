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
    request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/Newslist", true);
    request.onload = function(){
        if(this.status >= 200 && this.status < 400) {
            let response = JSON.parse(this.response)
            console.log(response)
                for (let i=0; i<response['NEWS_ID'].length; i++){
                    const card = document.createElement('div');
                    card.setAttribute('class', 't-card col-sm-6 col-md-4 col-sm-12 text-center');


                    const cardtextcenter = document.createElement('div');
                    cardtextcenter.setAttribute('class', 'card text-center');
                    cardtextcenter.setAttribute('id', 'divimg');
                    cardtextcenter.setAttribute('style','width: 18rem;')

                    const img = document.createElement('img');
                    img.setAttribute('class', 'card-img-top NEWS_IMGUR');
                    img.setAttribute('id', 'img');
                    img.src = response['NEWS_IMGURL'][i];

                    const cardbody = document.createElement('div');
                    cardbody.setAttribute('class', 'card-body');

                    const pT1 = document.createElement('p');
                    pT1.setAttribute('class','card-text');
                    const cardNEWS_T1 = document.createElement('small');
                    cardNEWS_T1.setAttribute('class','text-muted');
                    cardNEWS_T1.setAttribute('id','NEWS_T1');
                    cardNEWS_T1.innerHTML = response['NEWS_T1'][i];

                    const cardTITLE = document.createElement('h5');
                    cardTITLE.setAttribute('class','card-title');
                    cardTITLE.setAttribute('id','NEWS_TITLE');
                    cardTITLE.innerHTML = response['NEWS_TITLE'][i];;

                    const pT2 = document.createElement('p');
                    pT2.setAttribute('class','card-text');
                    const cardNEWS_T2 = document.createElement('small');
                    cardNEWS_T2.setAttribute('class','text-muted');
                    cardNEWS_T2.setAttribute('id','NEWS_T2');
                    cardNEWS_T2.innerHTML= response['NEWS_T2'][i];
                  
                    const cardNEWS_CONTENT = document.createElement('p');
                    cardNEWS_CONTENT.setAttribute('class','card-text');
                    cardNEWS_CONTENT.setAttribute('id','NEWS_CONTENT');
                    cardNEWS_CONTENT.innerHTML = response['NEWS_CONTENT'][i];

                    const divurl = document.createElement('div');
                    divurl.setAttribute('class', 'card-footer text-muted');
                    const urla = document.createElement('a');
                    urla.innerHTML = "lalla@nfu.edu.tw"

                    // Append the cards to the container element
                    document.getElementById("row").appendChild(card);

                    // Each card will contain an h1 and a p

                    card.appendChild(cardtextcenter);
                    cardtextcenter.appendChild(img);
                    cardtextcenter.appendChild(cardbody);
                    cardbody.appendChild(pT1);
                    pT1.appendChild(cardNEWS_T1);
                    cardbody.appendChild(cardTITLE);
                    cardbody.appendChild(pT2);
                    pT2.appendChild(cardNEWS_T2);
                    cardbody.appendChild(cardNEWS_CONTENT);
                    cardbody.appendChild(divurl);
                    divurl.appendChild(urla);  
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
    <div class="container" >
        <div class="row"id="row">

               <!--  <div class="t-card col-sm-6 col-md-4 col-sm-12 text-center " data-aos="fade-up">
                    <div class="card text-center " id="divimg" style="width: 18rem;">
                        <img src='' id="img" class="card-img-top NEWS_IMGURL" alt="...">
                        <div class="card-body">
                            <p class="card-text"><small id="NEWS_T1" class="text-muted"></small></p>
                            <h5 class="card-title" id="NEWS_TITLE"></h5>
                            <p class="card-text"><small class="text-muted" id="NEWS_T2"></small></p>
                            <p class="card-text" id="NEWS_CONTENT"></p>
                            <hr>
                            <div class="card-footer text-muted">
                                <a href="#" id="urla">lalla@nfu.edu.tw</a>
                            </div>
                        </div>
                    </div>
                </div> -->

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