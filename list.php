<?php
  require_once 'databaseUtil.php';
  $database = new DatabaseUtil();
  $array = array();

  $array = $database->animalList();
  if (!empty($_POST['type'])) {
    $array = $database->animalSearch($_POST['type']);
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
    <link rel="stylesheet" type="text/css" href="css/list.css">
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
        @font-face {
        font-family: 'MyWebFont';
        src: url('./font/FriendsFu.woff') format('woff');
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
                height:100vh;
                margin-top: -10%;
                position:relative;
                background-color:rgba(0,0,0,0.5);
            }
        
        .box1{
            padding: 1em 1em 1.5em 1em;
            top:-3%;
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
            overflow:hidden;
            width:auto;
            height: auto;
            margin: 10% 0 0 0;
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
        
        td{
             border-bottom: dotted 1px;
            width: 17vh;
             padding-top:10%;
                
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
        tr{
            border-bottom: 1px #000 dotted;
        }
          .s{
            font-family: "MyWebFont" !important;
        }
        .img1{
            width: 147px;
        }
        th{
            color: red;
            text-align: left;
            width: 17vh;
            padding-top:10%;
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
    </style>
</head>
    <body>
        <header>
	<div class="inner">
		<h1><a href="./island.php"><img src="./images/logo2.png" class="img1"></a></h1>
		
	</div><!-- /.inner -->
</header>
        <?php include_once './navi3.html'; ?>
 <div id="container">
      <form class="search-form" action="./list.php" method="post">
        <input type="text" name="type" class="search-field" value="" placeholder="動物の種類・名前">
        <input type="submit" name="" class="search-button" value="検索">
      </form>

      <h2 class="list-title">どうぶついちらん</h2>
      <hr>

      <?php
        for ($i=0; $i < count($array); $i++) {
          if ($i % 3 == 2) {
            echo "<div class='detail last'>";
          } else {
            echo "<div class='detail'>";
          }
      ?>
        <a href='result.php?id=<?php echo $array[$i]["id"] ?>' class='s'>
          <!-- ?id=cat -->
          <div class="centered"> <!-- centered or centered2 -->
            <div>
              <img alt="" src="<?php echo $array[$i]["url"] ?>">
            </div>
          </div>

          <div class="back-image"></div>
          <div class="text">
            <!-- <p><font>種類：</font><?php  echo $array[$i]["ani_kind"] ?></p> -->
            <!-- <p><font>名前：</font><?php  echo $array[$i]["name"] ?></p> -->
             <p><?php  echo $array[$i]["name"] ?></p> 
<!--            <p>たま</p>-->
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
    </body>
</html>