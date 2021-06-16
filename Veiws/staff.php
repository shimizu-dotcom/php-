<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スタッフ</title>
<link rel="stylesheet" type="text/css" href="/css/staff.css">
<meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include("header.php");
    ?>

    <?php
      include("drink_back.php")
    ?>


    <div id = "wrap">
        <a href = "#" class = "hb">
            <div class = "c">
                <img src = "/img/akitosan.jpeg" alt = "" style = "width:300px;height:300px;">
                <div class = "txt">
                    <h1>CEO Akito</h1>
                    <p></p>
                </div>
            </div>
        </a>
        <div class="fullBg">
            <img src = "/img/akitosan.jpeg" alt = "">
        </div>
        <a href="#" class="hb">
            <div class="c">
                <img src="/img/chibasan.jpeg" alt = "" style = "width:300px;height:100%;">
                <div class="txt">
                    <h1>Chibatti</h1>
                    <p></p>
                </div>
            </div>
        </a>
        <div class="fullBg">
          <img src="/img/chibasan.jpeg" alt=""/>
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
