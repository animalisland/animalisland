<?php $id = $_GET["id"];?>

<?php
	// データーベース
	require_once './databaseUtil.php';
	$databasea = new DatabaseUtil();
	$arrayList = $databasea->st($id);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="css/style1.css">
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
        #main{
            width:100%;
            position: relative;
        }
        #sub{
            width:30%;
        }
        
        div.sample {
                        width:15.2%; height:67.3vh;
                         padding:10px; border:1px solid black;
                        background-color:lightgray;
                        float: right;
                        
                       }
        
         div.sample2 {
                        width:5.1%; height:97.8vh;
                         padding:10px; border:1px solid black;
                        background-color:lightgray;
                       float: right;
                        margin-right: 93.5%;
                        margin-top: -50.25%
                        
                        
                       } 
            .st{
                padding: 10px,0,0,0;
                margin-left: 6.60%;
               width:1045px;
                height:810x;
                margin-top: -7%;
            }
        .st2{
                padding: 10px,0,0,0;
                margin-left: 6.60%;
               width:1046px;
                height:624px;
                margin-top: -4%;
            }
        #contents{
            position: relative;
            height: 525px;
        }
        
        .img1{
            width: 147px
        }
        
        #video {
          // 以下、画面いっぱいにするためのCSS設定
          min-height: 100%;
          min-height: 100vh;
          min-width: 60%;
          min-width: 60vw;
          // wrapperのサイズに応じて、leftの位置をjQueryで指定するため、positionはabsoluteにします。
          position: absolute;
          top: 0;
          // z-indexは調整してください。
          z-index: 1;
        }
        p{
            font-size: 19px;
        }
        
         @font-face {
        font-family: 'MyWebFont';
       src: url('./font/GN-KillGothic-U-KanaNA.ttf'); 
        }
         .gnav{
             font-family: "MyWebFont" !important;
            }
        
        
    </style>
</head>
<body>
    
<header>
	<div class="inner">
		<h1><a href="island.php"><img src="images/logo2.png" alt="サイト名" class="img1"></a></h1>
		
	</div><!-- /.inner -->
</header>

<div id="spMenu"><span id="navBtn"><span id="navBtnIcon"></span></span></div>
<nav>
	<div class="inner">
		<ul class="gnav">
					<li><a href="island.php">topへ</a></li>
					 <?php
                         echo "<li><a href='result.php?id=".$id. "'>";
                            echo "結果へ";
                            echo "</a>";
                      ?>
            </li>
		</ul>
	</div><!-- /.inner -->
</nav>



<div id="contents">
	<div id="main">
        <?php if($id=="cat"){
                echo "<video id='video' src=./st.mp4 class='st'>";
                echo "</video>";
              }else{
                echo "<video src=./dog.mp4 class='st2'>";
                echo "</video>";
              }
        ?>
        <div class="sample" >
            
         <?php
            foreach ($arrayList as $key) {
                echo "<p>名前:".$key['name']."</p>";
               
                echo "<img style='width:100%' src=./".$key['url'].">";
            }
         ?>

        <p>脈拍:<?php
                  echo rand(100,120).'/分';
            ?>
            </p>
        <p>体温:<?php echo rand(35,40).'度';?></p>
        </div>
         <div class="sample2" ></div>
	
	</div><!-- /#main -->
    <div id="sub">
		
	</div><!-- /#sub -->
	
</div><!-- /#contents -->

<footer>
	<div class="copyright" ></div><!-- /.copyright -->
</footer>

<div class="totop"><a href="#"><img src="images/totop.png" alt="ページのトップへ戻る"></a></div><!-- /.totop -->
    
    <script>
    var mediaElement = document.getElementsByTagName("video")[0];
    mediaElement.currentTime = 7; // 2 秒の位置にシークする
    mediaElement.loop = true;
    mediaElement.play();
        
    $(function() {
  var getWindowMovieHeight = function() {
    // ここでブラウザの縦横のサイズを取得します。
    var windowSizeHeight = $(window).outerHeight();
    var windowSizeWidth = $(window).outerWidth();

    // メディアの縦横比に合わせて数値は変更して下さい。(メディアのサイズが width < heightの場合で書いています。逆の場合は演算子を逆にしてください。)
    var windowMovieSizeWidth = windowSizeHeight * 1.76388889;
    var windowMovieSizeHeight = windowSizeWidth / 1.76388889;
    var windowMovieSizeWidthLeftMargin = (windowMovieSizeWidth - windowSizeWidth) / 2;

    if (windowMovieSizeHeight < windowSizeHeight) {
      // 横幅のほうが大きくなってしまう場合にだけ反応するようにしています。
      $("#video").css({left: -windowMovieSizeWidthLeftMargin});
    }
  };

  // 以下画面の可変にも対応できるように。
  $(window).on('load', function(){
    getWindowMovieHeight();
  });

  $(window).on('resize', function(){
    getWindowMovieHeight();
  });
}); 

    
    </script>
</body>
</html>