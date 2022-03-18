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
</style>
<script>
    var request = new XMLHttpRequest();
    request.open("GET", "http://127.0.0.1/blog/public/api/a1/v1/AboutList", true);
    request.onload = function(){
        if(this.status >= 200 && this.status < 400) {
            let response = JSON.parse(this.response)
            console.log(response)

            const content = document.createElement('p');
            content.innerHTML = response['ABOUT_CONTENT'];

            const img = document.createElement('img');
            img.setAttribute('class', 'img-fluid');
            img.src = response['ABOUT_IMGURL'];


            // Append the cards to the container element
            document.getElementById("content").appendChild(content);
            document.getElementById("image").appendChild(img);
            // Each card will contain an h1 and a p

            
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
            <li class="breadcrumb-item active" aria-current="page">ABOUT</li>   
        </ol>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 mb-4" id="content">
                <h2>ABOUT</h2>
                <!-- <p>In 1989, ESLITE GALLERY was founded along with the eslite bookstore in Taipei. It was the first to dedicate itself to contemporary and modern Chinese art in Taiwan. ESLITE GALLERY relocated in 2009 to a larger three-hall space in the eslite Xinyi store, where it is still located today. The gallery represents major international artists as well as rising young artists from Greater China, including Cai Guo-Qiang, Liu Xiaodong, Michael Lin, Zhan Wang, Xu Bing, Su-Mei Tse, Kuang-Yu Tsui and Wong Hoy Cheong, among others.

ESLITE also collaborates with overseas art spaces and organizations to offer a wide range of exciting works for collectors. Some past collaborations include Michael LIN’s first retrospective at Centro Pecci Prato, a Southeast Asian contemporary show entitled “Cigarettes, Coffee, Pad Thai” curated by Eugene Tan, and a CAI Guo-Qiang retrospective at the Taipei Fine Arts Museum.</p> -->
            </div>
            <div class="col-lg-6 mb-4" id="image">
                <!-- <img class="img-fluid" src="https://601115282-image.r.worldssl.net/en/wp-content/uploads/2017/09/1521702554-1764.jpg" alt=""> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 mb-4 text-center">
                <h3>問題回覆</h3>
            </div>
            <div class="col-lg-3 mb-4">
            </div>
            <div class="col-lg-6 mb-4">
                <form class="w-100" method="post" action="" >
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Steven">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <input type="submit" name="submit" class="form-control btn btn-primary" id="exampleFormControlInput1">
                </form>
            </div>
            <div class="col-lg-3 mb-4">
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