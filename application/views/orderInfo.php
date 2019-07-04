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

  </head>

  <body class = "nav nav-tabs col-md-6">
    <h1>受注詳細ページ</h1>
    <br>
    <h2>注文内容</h2>
    <table class="table table-bordered">
      <th>商品番号</th>
      <th>品名</th>
      <th>価格</th>
      <th>数量</th>
      <th>小計</th>
    <? foreach ($pro as $ls){?>
      <tr>
        <td><a href="/shop/index.php/Main/proDetail?num=<?=$ls->order_proNum?>"><?=$ls->order_proNum?></a></td>
        <td><a href="/shop/index.php/Main/proDetail?num=<?=$ls->order_proNum?>"><?=$ls->order_pro?></a></td>
        <td><?=$ls->order_proprice?></td>
        <td><?=$ls->order_proqty?></td>
        <td><?=$ls->order_subtotal?></td>
      </tr>
      <?}?>
      <? foreach ($list as $ls){?>
      <tr>
        <td style="text-align:right" colspan="4">合計</td>
        <td><?=$ls->order_price?></td>
      </tr>
     <?}?>
   </table>

   <h2>注文者情報</h2>
   <table class="table table-bordered">
     <? foreach ($user as $ls){?>
     <tr>
     <th>お名前</th>
     <td><?=$ls->order_Uname?></td>
     </tr>
     <tr>
     <th>郵便番号</th>
     <td><?=$ls->order_Upost?></td>
     </tr>
     <tr>
     <th>ご住所</th>
     <td><?=$ls->order_Uadd?></td>
     </tr>
     <tr>
     <th>電話番号</th>
     <td><?=$ls->order_Uphone?></td>
     </tr>
     <tr>
     <th>メールアドレス</th>
     <td><?=$ls->order_Uemail?></td>
     </tr>
     <?}?>
  </table>
  <a href="/shop/index.php/Main/order"><button type="button" class="btn btn-default">戻る</button></a>
  </body>

</html>
