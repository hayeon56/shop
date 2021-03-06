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
    <div class="center">
      <a href="/shop/index.php/Main"><div class="logo"></div></a>
      <div class="input-group test">
        <input type="text" class="form-control" placeholder="☆彡">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">♡</button>
        </span>
      </div>
      <div class="botton test" style="z-index:100; position:relative;" >
        <? $name = $this->session->userdata('userName');
           if($name){?><a href="/index.php/Main/logout">
             <button type="button" class="btn btn-default">LOGOUT</button></a><?}else{?><a href="/index.php/Main/login"><button type="button" class="btn btn-default">LOGIN</button></a><?}?>
        <button type="button" class="btn btn-default">CART</button>
        <? $name = $this->session->userdata('userName');

        if($name){ echo "<p>$name"?>様こんにちは!</p><?}?>
      </div>
    </div>
</header>
<br><br><br><br>
  <nav>
    <div class="center">
   <ul class="nav nav-tabs col-md-12">
      <li role="presentation"><a href="/shop/index.php/Main/list?list=1">J-POP</a></li>
      <li role="presentation"><a href="/shop/index.php/Main/list?list=2">K-POP</a></li>
      <li role="presentation" ><a href="/shop/index.php/Main/list?list=3">DVD・BLU-LAY</a></li>
      <li role="presentation" ><a href="/shop/index.php/Main/list?list=4">GOODS</a></li>
      <li role="presentation" ><a href="/index.php/Main/list?list=5">あああ</a></li>
    </ul>
    </div>
  </nav>
  <!--상품리스트 보여주기-->
  <article>
<?php $user_num = $this->session->userdata('userID'); ?>
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

</div>
  </article>
 <footer>
 </footer>


</body>

</html>
