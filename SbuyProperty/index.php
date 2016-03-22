<?php 
	include('include/variable.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $titleProject;?></title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <style type="text/css">
		.swiper-container,.swiper-wrapper {
        	width: 100%;
			margin:0px;
			padding:0px;
		}
	</style>
</head>
<body>
<!-------START Nav Bar Header-->
<nav class="navbar navbar-default">
  <div class="container-fluid" style="border:0px solid #F00; max-width:1200px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $titleProject;?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-bell"></span>&nbsp;มาใหม่</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-certificate"></span>&nbsp;แฟชั่น</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">อื่นๆ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><span class="glyphicon glyphicon-phone"></span>&nbsp;อุปกรณ์-มือถือ</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-road"></span>&nbsp;รถยนต์</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;คอนโด</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;ของสะสม</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;เข้าระบบ</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;สมัครสมาชิก</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" style="padding:3px;"></span></button>
        </span>
        </div>
      </form>
      <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-------END Nav Bar Header-->
<div class="row">
         <!-- Swiper -->
            <div class="swiper-container span12"  style="border:1px solid #F00;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="img/banner/s01.jpg" /></div>
                    <div class="swiper-slide"><img src="img/banner/s02.jpg" /></div>
                    <div class="swiper-slide"><img src="img/banner/s03.jpg" /></div>
                    <div class="swiper-slide"><img src="img/banner/s04.jpg" /></div>
             	</div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
		</div>
</div>
<div style="max-width:1200px;margin:0 auto;">
<div class="container-fluid">
        
        
          <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
              <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
              <div class="caption">
                <h3>Thumbnail label</h3>
                <p>...</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
              </div>
            </div>
          </div>
      
          <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
              <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
              <div class="caption">
                <h3>Thumbnail label</h3>
                <p>...</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
              </div>
            </div>
      </div>
      
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/yUkAAOSw7ThUeZsw/$_58.JPG" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>

    </div>
</div>
</div>
<div class="panel-footer">
	<div style="max-width:1200px;margin:0 auto;">Panel footer</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });
    </script>
</body>
</html>