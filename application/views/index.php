
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/shop/css/indexStyle.css">
    <link rel="stylesheet" media="screen" href="/shop/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/shop/bootstrap/js/bootstrap.js"></script>
    <script src="/shop/bootstrap/js/bootstrap.min.js"></script>
    <script src="/shop/bootstrap/js/npm.js"></script>
    <style>
    .carousel-control.left{background-image:none;}
    .carousel-control.right{background-image:none;}
    </style>

  </head>

  <body>
  <header>
    <form action="/shop/index.php/Main/search" method="post" name="form1">
    <div class="center">
      <a href="/shop/index.php/Main"><div class="logo"></div></a>
      <div class="input-group test">
        <input type="text" class="form-control"  name="search" placeholder="☆彡">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">♡</button>
        </span>
      </div>
      <div class="botton test" style="z-index:100; position:relative;" >
        <?php $name = $this->session->userdata('userName');
           if($name){?><a href="/shop/index.php/Main/logout">
             <button type="button" class="btn btn-default">LOGOUT</button></a><?php }else{ ?>
               <a href="/shop/index.php/Main/login"><button type="button" class="btn btn-default">LOGIN</button></a><?php } ?>
        <a href="/shop/index.php/Main/cart"><button type="button" class="btn btn-default">CART</button></a>
        <?php $name = $this->session->userdata('userName');

        if($name){ echo "<p>$name" ?>様こんにちは!</p><?php }; ?>
      </div>
    </div>
  </form>

</header>



<br><br><br><br>

  <nav>

    <div class="center">
   <ul class="nav nav-tabs col-md-12">
      <li role="presentation"><a href="/shop/index.php/Main/list?list=1">K-POP</a></li>
      <li role="presentation"><a href="/shop/index.php/Main/list?list=2">J-POP</a></li>
      <li role="presentation" ><a href="/shop/index.php/Main/list?list=3">DVD・BLU-LAY</a></li>
      <li role="presentation" ><a href="/shop/index.php/Main/list?list=4">GOODS</a></li>
    </ul>
    </div>
</nav>

<article>
<session>
  <!--캐러셀 시작-->
  <div id="carousel-example-generic" class="carousel slide nav nav-tabs col-md-6 center" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/shop/image/asd.png" width="100%">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="/shop/image/soueve.jpg" width="100%">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="/shop/image/cherrybombalbumcover.jpg" width="100%">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="/shop/image/ddddd.jpg" width="100%">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</session>
<!--캐러셀 끝-->

<!--상품 보여주기-->
<?php foreach($list as $ls) : ?>
<div class="center">
<div class="nav nav-tabs col-md-3 test">
  <div class="thumbnail">
    <a href="/shop/index.php/Main/proDetail?num=<?=$ls->pro_num ?>"><img src=<?=$ls->pro_image ?>></a>
    <div class="caption">
      <a href="/shop/index.php/Main/proDetail?num=<?=$ls->pro_num ?>"><h3><?=$ls->pro_name ?></h3></a>
      <p><a href="/shop/index.php/Main/cartController?pro_num=<?=$ls->pro_num ?>" class="btn btn-primary" role="button" name="">CART</a>
        <a href="#" class="btn btn-default" role="button">お気に入り</a></p>
    </div>
  </div>
</div>
</div>
<?php endforeach ?>
</article>
  <footer>
  </footer>


  </body>

</html>
