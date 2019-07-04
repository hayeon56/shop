<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="/shop/css/indexStyle.css" rel="stylesheet">
    <link href="/shop/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/shop/css/loginStyle.css" rel="stylesheet" >
  </head>

  <body>
  <header>
    <br>
    <div class="center">
        <a href="/shop/index.php/Main"><div class="logo"></div></a>
      <div class="input-group test">
        <input type="text" class="form-control" placeholder="☆彡">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">♡</button>
        </span>
      </div>
        <div class="botton test" style="z-index:100; position:relative;" >
        <a href="/shop/index.php/Main/cart"><button type="button" class="btn btn-default">CART</button></a>
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

<!--로그인폼-->
<article>
 <form action="/shop/index.php/Main/loginController" method="post" name="form1">
 <div class="contact-form">
 <h1>LOGIN</h1>
 <div class="txtb">
  <label>ID :</label>
  <input type="text" name="U_id" value="" placeholder="">
 </div>
 <div class="txtb">
  <label>PASSWORD :</label>
  <input type="password" name="U_pw" value="" placeholder="">
 </div>
 <a href="javascript:form1.submit()" class="btnn">Send</a>
 <a href="/shop/index.php/Main/join"><button type="button" class="btn btn-default">JOIN</button></a>
</div>
</form>
</article>


  <footer>
  </footer>


  </body>

</html>
