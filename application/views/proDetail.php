
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
        <?php $name = $this->session->userdata('userName');
           if($name){ ?><a href="/shop/index.php/Main/logout">
             <button type="button" class="btn btn-default">LOGOUT</button></a><?php }else{ ?>
               <a href="/shop/index.php/Main/login"><button type="button" class="btn btn-default">LOGIN</button></a><?php } ?>
        <a href="/shop/index.php/Main/cart"><button type="button" class="btn btn-default">CART</button></a>
        <?php $name = $this->session->userdata('userName');

        if($name){ echo "<p>$name" ?>様こんにちは!</p><?php } ?>
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
    </ul>
    </div>
</nav>

<article>
  <!--商品詳細-->
  <section class="center">
    <?php foreach($list as $ls) : ?>
    <table class="table">
      <td><img width="500px" height="500px" src="<?=$ls->pro_image ?>"></td>
      <td><h1><?=$ls->pro_name ?></h1>
          <h2>価格：<?=$ls->pro_price ?>￥</h2>
          <h3><?=$ls->pro_detail ?></h3>
          <p><a href="/shop/index.php/Main/cartController?pro_num=<?=$ls->pro_num ?>" class="btn btn-primary" role="button" name="">カートに入れる</a>
            <a href="#" class="btn btn-default" role="button">お気に入り</a></p>
      </td>
    <?php endforeach ?>
    </table>
  </section>

</article>
  <footer>
  </footer>


  </body>

</html>
