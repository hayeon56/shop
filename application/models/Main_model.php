<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Main_model extends CI_model{

  function __construct(){
    parent::__construct();

    $this->db = $this->load->database('default',TRUE);

  }

  function user(){

  //  $this->load->database();
    $strQuery = "SELECT * FROM user";
    $this->db->query("SELECT * FROM user");

  }
  //로그인
  function login($login_data){

    $User_id = $login_data['userId'];
    $User_pw = $login_data['userPw'];

    //$loginQuery = "SELECT * FROM user WHERE user_id='$User_id' and user_password='$User_pw';";
    $value = $this->db->get_where('user',array('user_id'=>$User_id,'user_password'=>$User_pw))->result();

    return $value;

  }
  //회원가입
  function join($join_data){

    $User_id = $join_data['userId'];
    $User_pw = $join_data['userPw'];
    $User_em = $join_data['userEm'];
    $User_name = $join_data['userName'];
    $User_ad = $join_data['userAd'];
    $User_ph = $join_data['userPh'];
    $User_po = $join_data['userPo'];

    $data = array(
      'user_num' => 0,
      'user_id' => $User_id,
      'user_password' => $User_pw,
      'user_post' => $User_po,
      'user_email' => $User_em,
      'user_name' => $User_name,
      'user_add' => $User_ad,
      'user_phonenum' => $User_ph

    );

    $value = $this->db->insert('user',$data);

    return $value;

  }


  //상품리스트 보여주기
  function list($mm){
$listdata = $this->db->get_where('product',array('pro_category'=>$mm))->result();
   return $listdata;

  }
  //상품 등록하기

  function productRegistration($productData){

    $data = array(
      'pro_pknum' => 0,
      'pro_category' => $productData['proCategory'],
      'pro_name' => $productData['proName'],
      'pro_price' => $productData['proPrice'],
      'pro_detail' => $productData['proDetail'],
      'pro_image' => '/image/'.$productData['proImage'],
      'pro_num' => $productData['proNum'],

    );

    $value = $this->db->insert('product',$data);

    return $value;

  }
  //카트에 넣기
  function cart($cart_data){

    $data= $this->load->library('cart');
    $pro_num = $cart_data['proNum'];
    $pro_data = $this->db->get_where('product',array('pro_num'=>$pro_num))->result();

    $data = array(
        'id'      => $pro_data[0]->pro_num,
        'qty'     => 1,
        'price'   => (int)$pro_data[0]->pro_price,
        'name'    => $pro_data[0]->pro_name,
        'image'   => $pro_data[0]->pro_image
 );



    $this->cart->insert($data);

    $data = $this->cart->contents();

    return $data;

  }

  //구입하기
  function buy($name,$pay,$user_info){

    $this->load->library('cart');

    //주문 저장

    $total = $this->cart->total();

    $query = "INSERT INTO order_list (order_num, order_date, order_price, order_pay, order_status, order_name)
                           VALUES (0, NOW(), $total, '$pay', '未発送', '$name');";
    $this->db->query($query);

    $order_num = $this->db->insert_id($query);
    $this->db->order_by("order_num", "desc");

    $i = 0;

    //주문 상품 저장
    foreach ($this->cart->contents() as $ls) {

      $i++;

      $pro_info=array(
        'order_num' => $order_num,
        'order_pro' => $ls['name'],
        'order_proprice' => $ls['price'],
        'order_proNum' => $ls['id'],
        'order_proqty' => $ls['qty'],
        'order_subtotal' => $ls['subtotal']

      );

      $this->db->insert('order_proinfo',$pro_info);

    }

    //주문 유저정보 저장
    $user_Info=array(
      'order_num' => $order_num,
      'order_Uname' => $user_info['order_Uname'],
      'order_Upost' => $user_info['order_Upost'],
      'order_Uadd' => $user_info['order_Uadd'],
      'order_Uphone' => $user_info['order_Uphone'],
      'order_Uemail' => $user_info['order_Uemail']
    );

    $this->db->insert('order_userinfo',$user_Info);


  }
  //受注台帳リスト
  function orderlist(){
    $query = "SELECT * FROM order_list order by order_num DESC;";
    $listdata = $this->db->query($query)->result();
    return $listdata;

  }
  //注文詳細ページ、商品情報
  function orderInfoPro($mm){

   $pro_data = $this->db->get_where('order_proinfo',array('order_num'=>$mm))->result();


   return $pro_data;

 }

   //注文詳細ページ、ユーザー情報
   function orderInfoUser($mm){
    $user_data = $this->db->get_where('order_userinfo',array('order_num'=>$mm))->result();

    return $user_data;

  }

  //注文詳細ページ、合計金額
  function orderInfolist($mm){
   $user_data = $this->db->get_where('order_list',array('order_num'=>$mm))->result();

   return $user_data;

 }
  //注文詳細ページ、商品情報
 function proDetail($mm){
   $pro_data = $this->db->get_where('product',array('pro_num'=>$mm))->result();

   return $pro_data;

 }
 //商品検索
 function search($search){

   $query = "SELECT * FROM product WHERE pro_name LIKE '%$search%';";
   $searchData = $this->db->query($query)->result();

   return $searchData;


 }

 //最新アルバム
 function newlist(){

   $query = "SELECT * FROM product order by pro_pknum DESC limit 9;";
   $newlist = $this->db->query($query)->result();

   return $newlist;


 }




}



?>
