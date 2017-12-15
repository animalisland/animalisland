<?php
	// データーベース
	require_once './databaseUtil.php';
	$databasea = new DatabaseUtil();
	$arrayList = $databasea->animalList();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="./css/style2.css">
<link rel="stylesheet" href="./css/island.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.scrollshow.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.slidewide.js"></script>
<script>
$(function($){
	if ($('#spMenu').css('display') == 'block') {
		$('html').smoothscroll({easing : 'swing', speed : 1000, margintop : 10, headerfix : $('header')});
	} else {
		$('html').smoothscroll({easing : 'swing', speed : 1000, margintop : 10, headerfix : $('nav')});
	}
	$('.totop').scrollshow({position : 500});
	$('.slide').slidewide({
		touch         : true,
		touchDistance : '80',
		autoSlide     : true,
		repeat        : true,
		interval      : 3000,
		duration      : 500,
		easing        : 'swing',
		imgHoverStop  : true,
		navHoverStop  : true,
		prevPosition  : 0,
		nextPosition  : 0,
		viewSlide     : 1,
		baseWidth     : 980,
		navImg        : false,
		navImgCustom  : false,
		navImgSuffix  : ''
	});
	$('.slidePrev img').rollover();
	$('.slideNext img').rollover();
	});
</script>
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
    <style>

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background:-moz-linear-gradient(top, rgba(0,171,235,0.5), #fff);
       background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,171,235,0.5)), to(#fff));
        background: -o-linear-gradient(top, rgba(0,171,235,0.5), #fff);
        background: linear-gradient(top, rgba(0,171,235,0.5), #fff);
        font-family: "MyWebFont" !important;
    }

    li {
        float: left;
        margin-top: 4%;
        width: 13%;
        
        font-size: 25px;
        padding-left: 10px;
    }
        



    li a:hover:not(.active) {
        background-color: #111;
    }

    

        .r{
            float: right;
        }
        h1{
            font-family: "MyWebFont" !important;
        }
        .img1{
            width: 147px;
        }
        .ab{
            position: absolute;
            z-index: 1;
            margin-left: -80px;
        }
        
        .gnav{
            position: fixed;
            z-index: 1;
            border-radius: 20% 20% 0 0;
            height: 20.5%;
            width: 100%;
            margin-top:38%;
            margin-left:-21%;
          
        }
        h1{
            top:0%;
            bottom:0;
            right: 0;
            left:0;
            margin: auto;
            color: white;
            font-size: 30px;
            position: absolute;
            z-index: 0;
        }
        
A
    </style>
</head>
<body>

	<!-- ナビゲーション呼び出し -->
		<?php include_once './navi.html'; ?>

		<main role="main">
            <div class="map">
                <div id="contents">
                    <img src="https://wedding-design.non-rhetoric.jp/wp-content/themes/nonrhetoric/img/lp/naoshima/photo-about.png" id="main">
                    <h1 >しまぜんたいず</h1>

                  

                    <?php
                        foreach ($arrayList as $key) {
                    ?>
                    <div class='rect <?php echo $key['id'] ?>'>
                        <a href='./result.php?id=<?php echo $key['id'] ?>' class='s'>
                            <div class='cro'>
                                <img src='<?php echo $key['url'] ?>' class='sub'>
                                <!-- バルーン -->
                                <span class='s-balloon'>
                                    <table>
                                        <tr>
                                            <th>名前</th>
                                            <td><?php echo $key['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>コメント</th>
                                            <td><?php echo $key['id'] ?></td>
                                        </tr>
                                    </table>
                                </span>
                                <!-- バルーン -->
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                </div><!-- /#contents -->
            </div>
    <footer>

    </footer>

<div class="totop"><a href="#"><img src="images/totop.png" alt="ページのトップへ戻る"></a></div><!-- /.totop -->

<script type="text/javascript">
      var array = <?php echo json_encode($arrayList, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
      var size = [];
      console.log(array); // Object { hoge: "fuga" }
      // ジャバスクリプト記述
      $(function () {
        //setTimeout(rect('cat')); //アニメーション実行
        for (var i = 0; i < array.length; i++) {
          size[array[i]['id']] = {
            "width": Math.floor(Math.random() * (window.parent.screen.width + 1 - 600))+300,
            "height": Math.floor(Math.random() * (window.parent.screen.height + 1 - 600))+300,
          };
          $('.' + array[i]['id']).css('top', size[array[i]['id']]["height"] + 'px');
          $('.' + array[i]['id']).css('left', size[array[i]['id']]["width"] +'px');
          setTimeout(movement(array[i]['id']));
          console.log(array[i]['id']);
        }
      });

      function movement(type) {
         console.log(size);
        var point = 20;
        var probability = 3;
        var speed = 500;

        var left = 0;

        var wp = 300; // 左
        var wm = 300; // 右
        var hp = 300; // 上制限
        var hm = 300; // 下制限

        // 上
        if (Math.floor(Math.random() * probability) == 1) {
          var pp = 0;
          if (window.parent.screen.height - hm < size[type]["height"]) {
            console.log("上に戻す");
          } else {
            pp = Math.random() * point;
            size[type]["height"] += pp;
          }

          $('.' + type).animate({
            top: size[type]["height"] + 'px'
          }, speed);
        }

        // 右方向
        if (Math.floor(Math.random() * probability) == 1) {
          var pp = 0;
          if (window.parent.screen.width - 250 - wm < size[type]["width"] || left < 0) {
            left += 10;
            console.log("左に戻す");
          } else {
            left--;
            pp = Math.random() * point;
            size[type]["width"] += pp;
          }

          $('.' + type).animate({
            left: size[type]["width"] + 'px'
          }, speed);
        }

        // 下
        if (Math.floor(Math.random() * probability) == 1) {
          // $('.' + type).animate({
          //   top: '-=' + Math.random() * point + 'px'
          // }, speed);

          var pp = 0;
          if (hp > size[type]["height"]) {
            console.log("下に戻す");
          } else {
            pp = Math.random() * point;
            size[type]["height"] -= pp;
          }

          $('.' + type).animate({
            top: size[type]["height"] + 'px'
          }, speed);
        }

        // 左方向
        if (Math.floor(Math.random() * probability) == 1) {
          var pp = 0;
          if (wp > size[type]["width"]) {
            console.log("右に戻す！");
          } else {
            pp = Math.random() * point;
            size[type]["width"] -= pp;
          }
          $('.' + type).animate({
            left: size[type]["width"] + 'px'
          }, speed, function() { // callbackによりコールスタック解決
            setTimeout(movement(type));
          });
        }else {
          setTimeout(movement(type));
        }
        //setTimeout(rect(type), 1000); //アニメーションを繰り返す間隔
      }


        $(document).ready(function() {
             $('.drawer').drawer();
        });

         $(function(){
            $('.container:not(body.drawer drawer--left .container)').css({display:'block',marginLeft:$(window).width(),opacity:'0'});
            $('.container:not(body.drawer drawer--left .container)').animate({marginLeft:'0px',opacity:'1'},500);

            $('body.drawer drawer--left #container').css({display:'block',opacity:'0'});
            $('body.drawer drawer--left .container').animate({opacity:'1'},500);

            
        });

        $(window).bind('load',function(){
        // ここで文字を<span></span>で囲む
        $('.tgt').children().andSelf().contents().each(function() {
        if (this.nodeType == 3) {
        $(this).replaceWith($(this).text().replace(/(\S)/g, '<span>$1</span>'));
        }
        });
        // 一文字ずつフェードインさせる
        $('.tgt').css({'opacity':1});
        for (var i = 0; i <= $('.tgt').children().size(); i++) {
        $('.tgt').children('span:eq('+i+')').delay(i).animate({'opacity':1},50);
        };
        });
    
    
    document.getElementById("cl").onclick = function() {
    document.getElementById("text").innerHTML = "クリックされた！";
    };
    
        

    </script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
    </main>
</body>
</html>
