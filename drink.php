<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ドリンク</title>
<link rel="stylesheet" type="text/css" href="/css/drink.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include("header.php");
    ?>

    <?php
        include("drink_back.php");
    ?>


    <div id = "wrap">
        <a href = "#" class = "hb">
            <div class = "c">
                <img src = "/img/2438985.png" alt = "チャイナブルー" style = "width:200px;height:100%;">
                <div class = "txt">
                    <h1>China Blue</h1>
                    <p>チャイナブルー</p>
                </div>
            </div>
        </a>
        <div class="fullBg">
            <img src = "/img/2438985.png" alt = "">
        </div>
        <a href="#" class="hb">
            <div class="c">
                <img src="/img/2436161.png" style = "width:200px;height:100%;" alt=""/>
                <div class="txt">
                    <h1>Screw Driver</h1>
                    <p>スクリュードライバー</p>
                </div>
            </div>
        </a>
        <div class="fullBg">
          <img src="/img/2436161.png" alt=""/>
        </div>
        <a href="#" class="hb">
            <div class="c">
                <img src="/img/2429321.png" alt="" style = "width:200px;height:100%;">
                <div class="txt">
                    <h1>Mojito</h1>
                    <p>モヒート</p>
                </div>
            </div>
        </a>
        <div class="fullBg">
            <img src="/img/2429321.png" alt="">
        </div>
        <a href="#" class="hb">
            <div class="c">
                <img src="/img/2431890.png" alt=""  style = "width:200px;height:100%;">
                <div class="txt">
                    <h1>Kamikaze</h1>
                    <p>カミカゼ</p>
                </div>
            </div>
        </a>
        <div class="fullBg">
            <img src="/img/2431890.png" alt=""/>
        </div>

    </div>



    <script>
    $(document).ready(function(){
        var docWidth = $('body').width(),
        $wrap = $('#wrap'),
        $images = $('#wrap .hb'),
        slidesWidth = $wrap.width();

        $(window).on('resize', function(){
            docWidth = $('body').width();
            slidesWidth = $wrap.width();
        })

        $(document).mousemove(function(e) {
            var mouseX = e.pageX,
                offset = mouseX / docWidth * slidesWidth - mouseX / 2;

            $images.css({
              '-webkit-transform': 'translate3d(' + -offset + 'px,0,0)',
                      'transform': 'translate3d(' + -offset + 'px,0,0)'
            });
        });
    })


</script>



<body>
</html>
