<?php

class Main extends CI_Controller{

  public function __construct()
      {
           parent::__construct();

            $this->load->library('session');

           // 세션 초기화
      }

  //메인페이지
  public function index()
  {
      $this->load->model('Main_model');
      $newlist['list'] = $this->Main_model->newlist();
       $this->load->view('index.html',$newlist);
  }


  //로그인페이지보여주기
  public function login(){

   $this->load->view('login.html');

  }

  //로그인컨트롤러
  public function loginController(){

    $U_id = $_POST['U_id'];
    $U_pw = $_POST['U_pw'];
    $login_data = array(
    'userId'=> $_POST['U_id'],
    'userPw'=> $_POST['U_pw']

   );

  $this->load->model('Main_model');
  $temp = $this->Main_model->login($login_data);

  if($temp){

    $user_num = $temp[0]->user_num;
    $user_name = $temp[0]->user_name;
    $user_email = $temp[0]->user_email;
    $user_add = $temp[0]->user_add;
    $user_phonenum = $temp[0]->user_phonenum;
    $user_post = $temp[0]->user_post;
    $user_point = $temp[0]->user_point;



    $sessiondata = array(
      'userID'=>$user_num,
      'userName'=>$user_name,
      'userEmail'=>$user_email,
      'userAdd'=>$user_add,
      'userPhonenum'=>$user_phonenum,
      'userPost'=>$user_post
    );

     $this->session->set_userdata($sessiondata);
     $this->load->model('Main_model');
     $newlist['list'] = $this->Main_model->newlist();
     echo "<script>alert('ログイン完了');</script>";
     $this->load->view('index.html',$newlist);

  }
  else{
    echo "<script>alert('ログイン失敗');</script>";
    $this->load->view('login.html');
  }

 }

 //로그아웃
 public function logout(){

   $this->session->unset_userdata('userID');
   $this->session->unset_userdata('userName');

   $this->session->sess_destroy();

   $this->load->model('Main_model');
   $newlist['list'] = $this->Main_model->newlist();
   echo "<script>alert('ログアウト完了');</script>";
   $this->load->view('index.html',$newlist);
 }


 //회원가입
 public function join(){

   $this->load->view('join.html');

 }

 //회원가입 컨트롤러
 public function joinController(){

   $join_data = array(
   'userId'=> $_POST['U_id'],
   'userPw'=> $_POST['U_pw'],
   'userEm'=> $_POST['U_em'],
   'userName'=> $_POST['U_name'],
   'userAd'=> $_POST['U_ad'],
   'userPh'=> $_POST['U_ph'],
   'userPo'=> $_POST['U_post']

  );

   $this->load->model('Main_model');
   $temp = $this->Main_model->join($join_data);

   if($temp){

      $this->load->view('joinS.html');
   }
   else{
      $this->load->view('login.html');
   }

 }
 //상품 출력
 // public function list(){
 //   $mm = $_GET['list'];
 //   $this->load->model('Main_model');
 //   $listdata['list'] = $this->Main_model->list($mm);
 //
 //   $this->load->view('list.html',$listdata);
 // }
 //관리 메인페이지
 public function management(){

   $this->load->view('management.html');

 }
//상품등록페이지로드
 public function productRegistration(){

   $this->load->view('productRegistration.html');


 }
//상품등록
public function productController(){

  $productData = array(
  'proNum'=> $_POST['proNum'],
  'proName'=> $_POST['proName'],
  'proPrice'=> $_POST['proPrice'],
  'proDetail'=> $_POST['proDetail'],
  'proCategory'=> $_POST['proCategory'],
  'proImage'=> $_POST['proImage']
 );

 $this->load->model('Main_model');
 $temp = $this->Main_model->productRegistration($productData);

 if($temp){
   echo "<script>alert('登録完了');</script>";
    $this->load->view('productRegistration.html');
 }
 else{
   echo "<script>alert('登録失敗');</script>";
    $this->load->view('productRegistration.html');
  }
 }
//카트페이지 로드
 public function cart(){

   $this->load->library('cart');
  $this->load->view('cart.html');

 }
//카트 컨트롤러
 public function cartController(){

    $this->load->library('cart');

    $user_num = $this->session->userdata('userID');
    $pro_num=$_GET['pro_num'];

    $cart_data = array(
      'userNum'=> $user_num,
      'proNum'=> $pro_num
    );

    $this->load->model('Main_model');
    $temp = $this->Main_model->cart($cart_data);
    //print_r($this->cart->contents());
    $this->load->view('cart.html');

 }
//카트 업데이트
  public function cartUpdate(){
      $this->load->library('cart');

       $cart_data = array();
       $qty = $this->input->post('qty');
       $rowid = $this->input->post('rowid');
       $del = $this->input->post('del');

       for($i=0; $i < count($del); $i++) {
            $qty[$del[$i]] = 0;
        }

       for($i=0; $i < count($rowid); $i++){

         $cart_data[$i] = array('qty'=>$qty[$i],'rowid'=>$rowid[$i]);

       }

       $this->cart->update($cart_data);     //$this->cart->update($data);
       $this->load->view('cart.html');

  }

  //상품 구입
  public function buy(){
    $this->load->library('cart');

     $cart_data = array();
     $qty = $this->input->post('qty');
     $rowid = $this->input->post('rowid');
     $del = $this->input->post('del');

     for($i=0; $i < count($del); $i++) {
          $qty[$del[$i]] = 0;
      }

     for($i=0; $i < count($rowid); $i++){

       $cart_data[$i] = array('qty'=>$qty[$i],'rowid'=>$rowid[$i]);

     }

     $this->cart->update($cart_data);

    $this->load->view('buy.html');

  }
  //구입정보 디비에 저장
  public function buyController(){

    $this->load->helper('date');

    $this->load->library('cart');
    //주문리스트 정보
    $pay = $this->input->post('pay');

    if($pay == 1){

      $pay = '代金引換';

    }
    else if($pay == 2){

      $pay = '銀行振込';

    }

    else {

      $pay = '郵便振替';

    }


    $name = $this->input->post('buyName');

    //유저정보
    $user_info = array(
      'order_Uname' => $this->input->post('buyName'),
      'order_Upost' => $this->input->post('buyPost'),
      'order_Uadd' => $this->input->post('buyAdress'),
      'order_Uphone' => $this->input->post('buyPhone'),
      'order_Uemail' => $this->input->post('buyEmail'),
    );



    $this->load->model('Main_model');
    $temp = $this->Main_model->buy($name,$pay,$user_info);
    $this->cart->destroy();
    echo "<script>alert('注文完了しました。ありがとうございます。(*_*)');</script>";
    $this->load->model('Main_model');
    $newlist['list'] = $this->Main_model->newlist();
    $this->load->view('index.html',$newlist);

  }

  //受注台帳ページに移動
  public function order(){

    $this->load->model('Main_model');
    $orderdata['list'] = $this->Main_model->orderlist();

    $this->load->view('order.html',$orderdata);


  }
  //受注台帳詳細ページ
  public function orderInfo(){

    $mm = $_GET['num'];
    $this->load->model('Main_model');

    $orderInfoData['pro'] = $this->Main_model->orderInfoPro($mm);

    $orderInfoData['user'] = $this->Main_model->orderInfoUser($mm);

    $orderInfoData['list'] = $this->Main_model->orderInfolist($mm);

    $this->load->view('orderInfo.html',$orderInfoData);

  }
  //商品詳細ページ
  public function proDetail(){

    $mm = $_GET['num'];
    $this->load->model('Main_model');
    $proData['list'] = $this->Main_model->proDetail($mm);
    $this->load->view('proDetail.html',$proData);

  }
  //商品検索
  public function search(){

    $search = $this->input->post('search');
    $this->load->model('Main_model');
    $searchData['list'] = $this->Main_model->search($search);
    $this->load->view('search.html',$searchData);

  }

  public function aa(){

    $this->load->view('aa.html');

  }



}

?>
