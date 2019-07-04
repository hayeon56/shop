<?php $this->load->helper('form');
echo form_open('http://localhost/index.php/Main/cartUpdate'); ?>

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
           if($name){ ?><a href="/index.php/Main/logout">
             <button type="button" class="btn btn-default">LOGOUT</button></a><?php }else{ ?><a href="/index.php/Main/login"><button type="button" class="btn btn-default">LOGIN</button></a><?php } ?>
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
<br><br>

<!--카트-->

<form method="post" action="/shop/index.php/Main/cartUpdate">
<?php $i = 1; ?>
<div class="center">
  <table class="table table-bordered">
    <tr>
    <th>画像</th>
    <th>品名</th>
    <th>価格</th>
    <th>数量</th>
    <th>小計</th>
    <th>削除</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $ls){ ?>
    <input type="hidden" name="rowid[]" value="<?=$ls['rowid']?>">
    <tr>
      <td><img width="100px" src=<?=$ls['image']?>></td>
      <td><?php=$ls['name']?></td>
      <td><?php=$ls['price']?></td>
      <td><input name="qty[]" type="text" value="<?=$ls['qty']?>" maxlenqth="2" size="2"></input></td>
      <td><?php=$ls['subtotal']?></td>
      <td><input type="checkbox" name="del[]" value="<?php echo $i - 1;?>" /></td>
    </tr>
    <?php $i++; ?>
<?php } ?>
<tr>
  <td style="text-align:right" colspan="5">Total</td>
  <td><?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
<tr>
    <td colspan="6" style="text-align: center">
<button type="submit" class="btn btn-default">UPDATE YOUR CART</button>
</td>
<tr>
    <td colspan="6" style="text-align: center">
<a href="/shop/index.php/Main/buy"><button type="button" class="btn btn-default">購入手続へ進む</button></a>
</td>
</tr>
</table>
</form>
</body>
</html>
