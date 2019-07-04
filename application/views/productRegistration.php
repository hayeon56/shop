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
  <body class="nav nav-tabs col-md-3 center">
    <br><br><br><br>
    <h1>商品登録</h1>
    <form action="/shop/index.php/Main/productController" method="post" name="form1">
    <div class="form-group">
      <label for="exampleInputEmail1">商品番号</label>
      <input type="textarea" class="form-control" name="proNum" placeholder="商品番号を入力してください。">
    <label for="exampleInputEmail1">商品名</label>
    <input type="textarea" class="form-control" name="proName" placeholder="商品名を入力してください。">
    <label for="exampleInputPassword1">商品価格</label>
    <input type="textarea" class="form-control" name="proPrice" placeholder="商品価格を入力してください。">

    <label for="exampleInputEmail1">商品説明</label>
    <textarea class="form-control" name="proDetail" rows="4" placeholder="商品説明を入力してください。"></textarea>

  <label for="exampleInputFile">カテゴリ</label>
  <select class="form-control" name="proCategory">
  <option value="2">J-POP</option>
  <option value="1">K-POP</option>
  <option value="3">DVD・BLU-LAY</option>
  <option value="4">GOODS</option>
</select>
<br>
    <label for="exampleInputFile">画像アップロード</label>
    <input type="file" id="exampleInputFile" name="proImage">
  <div class="checkbox">
  </div>
  <br>
  <button type="submit" class="btn btn-default">登録</button>
</form>
  </body>
</html>
