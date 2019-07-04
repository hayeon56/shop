

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
             <button type="button" class="btn btn-default">LOGOUT</button></a><?php }else{ ?><a href="/shop/index.php/Main/login"><button type="button" class="btn btn-default">LOGIN</button></a><?php } ?>
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
      <li role="presentation"><a href="/index.php/Main/list?list=1">J-POP</a></li>
      <li role="presentation"><a href="/index.php/Main/list?list=2">K-POP</a></li>
      <li role="presentation" ><a href="/index.php/Main/list?list=3">DVD・BLU-LAY</a></li>
      <li role="presentation" ><a href="/index.php/Main/list?list=4">GOODS</a></li>
    </ul>
    </div>
</nav>
<!--카트-->
<div class ="center">
  <br><br>
<h1 >ご注文内容</h1>
</div>
<?php $i = 1; ?>
<div class="center">
  <table class="table table-bordered">
    <tr>
    <th>画像</th>
    <th>品名</th>
    <th>価格</th>
    <th>数量</th>
    <th>小計</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $ls){ ?>
    <input type="hidden" name="rowid[]" value="<?php=$ls['rowid'] ?>">
    <tr>
      <td><img width="100px" src=<?php=$ls['image'] ?>></td>
      <td><?php=$ls['name'] ?></td>
      <td><?php=$ls['price'] ?></td>
      <td><?php=$ls['qty'] ?></td>
      <td><?php=$ls['subtotal'] ?></td>
    </tr>
    <?php $i++; ?>
<?php } ?>
<tr>
  <td style="text-align:right" colspan="4">Total</td>
  <td><?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
</table>

<!--구입자 정보-->
<?php $email = $this->session->userdata('userEmail');
   $address = $this->session->userdata('userAdd');
   $phoneNumber = $this->session->userdata('userPhonenum');
   $post = $this->session->userdata('userPost');
    ?>
<form action="shop/index.php/Main/buyController" method="post" name="form1">
<h1>購入者情報</h1>
<table class="table table-bordered">
  <tr>
  <th bgcolor='#e9e9e9'>お名前</th>
  <td><input type="text" name="buyName" class="form-control" id="exampleInputName2" value=<?php echo $name?>></td>
  </tr>
  <tr>
  <th bgcolor='#e9e9e9'>郵便番号</th>
  <td><input type="text" name="buyPost" class="form-control" id="exampleInputName2" value=<?php echo $post?>></td>
  </tr>
  <tr>
  <th bgcolor='#e9e9e9'>住所</th>
  <td><input type="text" name="buyAdress" class="form-control" id="exampleInputName2" value=<?php echo $address?>></td>
  </tr>
  <tr>
  <th bgcolor='#e9e9e9'>お電話番号</th>
  <td><input type="text" name="buyPhone" class="form-control" id="exampleInputName2" value=<?php echo $phoneNumber?>></td>
  </tr>
  <tr>
  <th bgcolor='#e9e9e9'>メールアドレス</th>
  <td><input type="email" name="buyEmail" class="form-control" id="inputEmail3" value=<?php echo $email?>></td>
  </tr>
  </table>
  <h1>お支払い方法選択</h1>
  <table class="table table-bordered">
    <tr>
    <th bgcolor='#e9e9e9'><input type="radio" name="pay" value="1" ></input>　代金引換</th>
    </tr>
    <tr>
      <td>商品お届けの際、運送会社のドライバーに直接お支払いください。</td>
    </tr>
    <tr>
    <th bgcolor='#e9e9e9'><input type="radio" name="pay"  value="2" ></input>　銀行振込</th>
    </tr>
    <tr>
      <td>当店指定の口座へお振り込みください。おそれいりますが、振込手数料は、ご負担くださいますようお願いいたします。入金確認後、商品を発送いたします。</td>
    </tr>
    <tr>
    <th bgcolor='#e9e9e9'><input type="radio" name="pay" value="3"></input>　郵便振替</th>
    </tr>
    <tr>
      <td>【振替口座】 00000-0-00000　ハヨン<br>当店指定の口座へお振り込みください。おそれいりますが、払込手数料は、ご負担くださいますようお願いいたします。入金確認後、商品を発送いたします。</td>
    </tr>
    </table>
        <input type="submit" class="btn btn-default" value="この内容で注文する" />
  </form>
  <br><br><br><br><br><br><br><br><br>
</body>
</html>
