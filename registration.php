
<?php
  session_start();
  if (!isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    $_SESSION['msg'] = null;
  }else{
      $_SESSION['msg'] ="";
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="css/style3.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.scrollshow.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.slidewide.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css">
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
    @font-face {
        font-family: 'MyWebFont';
       src: url('./font/GN-KillGothic-U-KanaNA.ttf'); 
    }
        
  body
        {
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            margin: 0px;
            padding: 0px;

        }
        .a{
                width:100%;
                height:140vh;
                margin-top: 0%;
                position:absolute;
                background-color:rgba(0,0,0,0.5);
            }

        .box1{
            padding: 1em 1em 1.5em 1em;
            top:-2%;
            bottom: 0;
            right: 0;
            left: 0;
            margin: 2% auto 0;
            color: #5d627b;
            background: white;
            border-top: solid 5px #5d627b;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
            text-align: center;
            width: auto;
            height: auto;
            position: absolute;
            float: left;
            width: 60%;
            height: 70vh;
            border-radius: 10%;

        }

        .box1 p {
            margin: 0;
            padding: 0;

        }

        .box1 table {
            top: 0;
            left 0;
            right: 0;
            bottom 0;
           margin: auto;
            float: right;

        }
        #contents {
            position: relative;
            overflow:hidden;
            width:auto;
            height: auto;
            margin: 0 0 0 0;
            background:#fff;
            
        }

        tbody{
            float: right;
            margin-top: -45%;
            margin-right: 4%


        }


        a{
            top:10%;
            bottom: 0;
            right: 0;
            left: 0;

        }
        table{
            top:10%;
            bottom:0;
            right:0;
            left:20%;
            font-size: 15px;
            border-collapse: collapse;
        }

       
        ul{
            list-style-type:none;
            text-align: center;
        }
        li{
         text-align: center;
            width: 500px;

        }
        li.1{
            padding-left: 10px;
        }
        li.2{
           padding-left: 10px;
        }
        
          .s{
            font-family: "MyWebFont" !important;
        }
        .img1{
            width: 147px;
        }
        
        th{
            color: black;
            text-align: center;
            width: 20vh;
/*            padding-top:6%;*/
            background: pink;
            border-radius: 50% 0 0 50%;
            height: 47px;
            font-size: 20px;
        }
         td{
            width: 20vh;
             background: aqua;
            border-radius: 0 50% 50% 0; 
             color: black;
             font-size: 20px;
             height: 47px;
        }

        .ss{
            float: right;
            margin-right: -7%;
        }
        .p1{
            position: absolute;
            z-index: 1;
            margin-left: 88%;
            font-size: 20px;
            margin-top: 30%;
            color: white;
        }

				.centered{
				  position: relative;
				  width: 400px;/*　幅（100%以下で指定 or px）　*/
				  padding-top: 400px;/*　高さ（100%以下で指定 or px）　*/
				  overflow: hidden;
				  margin: 20px auto 0 auto;
					border-radius: 50%;
                    margin-right:50%; 
                    
				}
				.centered img{
				/* 画像を上下左右に中央配置する（絶対指定） */
				  position: absolute;
				  top: 50%;
				  left: 50%;
				  -webkit-transform: translate(-50%, -50%);
				  -ms-transform: translate(-50%, -50%);
				  transform: translate(-50%, -50%);
				  /* 画像の最大サイズは枠の1.5倍まで */
				  min-width: 100%;
				  max-width: 150%;
				  max-height: 150%;
				}
        .ainfo{
            font-family: "MyWebFont" !important;
        }
        
        .form-control{
            width: 115%;
        }
/*
        .form-group2{
           
        }
        
         .form-control2{
           
        }
*/  
        


    </style>
</head>
<body>

<header>
	<div class="inner">
		<h1><a href="index.html"><img src="./images/logo2.png" class="img1"></a></h1>
		
	</div><!-- /.inner -->
</header>

<div id="spMenu"><span id="navBtn"><span id="navBtnIcon"></span></span></div>
<main role="main">
<nav>
	<div class="inner">
		<ul class="gnav">
              <li class="s"><a class="active" href="island.php">　</a></li>



		</ul>
	</div><!-- /.inner -->
</nav>


    

    <div id="contents">
         <img src="./images/sima.png" id="main">
        <img src="images/btn.png" style="position:absolute; margin-left:-15%; z-index:1; margin-top:26%; width:140px"><a href="./island.php"><p class="p1">もどる</p></a>

        <div class="a">
          <div class="box1">

                <p style="font-size:45px" class="ainfo">居住確認書</p>
              <img src="./images/ga2.jpg" style="position:absolute; width:27%;right:58%;top:27%" id="disp1">
					<div class="centerd">
                       
                    </div>
                                <form method="post" enctype="multipart/form-data" action="confirm.php" style="margin-top:5%; float:right; margin-right:10%">
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000024" />

                              <div class="form-group">
                                <input type="text" class="form-control" name="id" placeholder="id" required />
                              </div>
                              <div class="form-group">
                                <input type="text"  class="form-control" name="name" placeholder="名前" required />
                              </div>

                                <div class="form-group">
                                <input type="text" class="form-control" name="ani_kind" placeholder="種類" required />
                              </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="sex" placeholder="性別" required />
                              </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="age" placeholder="年齢" required />
                              </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="health" placeholder="健康状態" required />
                              </div>

                             <div class="form-group2">
                                <input type="file" class="form-control2" name="up" onclick="hyoji1(0)" placeholder="画像選択" required />
                                <button type="submit" class="btn btn-default" onclick="hyoji2(0)" name="signup" style="float:right;margin-top:-11%;margin-right:-19%;">登録</button>
                                <?php echo $_SESSION['msg'];?>
                              </div>
                              
                              
                            </form>
            <?php
              $mes="";
              $mes = $_SESSION["msg"];
              echo $_SESSION['msg'];
             if($mes="登録しました。"){
                 echo "<img src='./images/syou.png' style='position:absolute; width:51%;right:25%;top:13%;visibility:hidden;' id='ss'>";
             }else if($mes!="登録しました。"){
                  echo "<img src='./images/syou2.png' style='position:absolute; width:51%;right:25%;top:13%;visibility:hidden;' id='ss'>";
             }
              $_SESSION['msg']="";
              ?>   
                
          </div>
        </div>
    </div>
    <script>
   function hyoji1(num)
          {
            if (num == 0)
            {
               document.getElementById("disp1").style.display="none";
              }
        
          }
        
        
        
         function hyoji2(num)
          { 
            if(num==0){
              $('#ss').css({'visibility':'visible'}) 
                      .animate({opacity: 1}, 500);
                 
            }         
            $('#ss').css({'visibility':'hidden'});
          }
         $('#ss').css({'visibility':'hidden'}).animate({opacity: 0}, 5000);
        
    $(function() {
  $('input[type=file]').after('<span></span>');

  // アップロードするファイルを選択
  $('input[type=file]').change(function() {
    var file = $(this).prop('files')[0];

    // 画像以外は処理を停止
    if (! file.type.match('image.*')) {
      // クリア
      $(this).val('');
      $('span').html('');
      return;
    }

    // 画像表示
    var reader = new FileReader();
    reader.onload = function() {
      var img_src = $('<img>').attr('src', reader.result).width(250).css('margin-left','-230%').css('margin-top','-120%');
      $('span').html(img_src);
    }
    reader.readAsDataURL(file);
  });
});
    </script>

    </body>
</html>

    