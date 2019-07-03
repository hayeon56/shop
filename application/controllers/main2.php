<?php


class Main2 extends CI_Controller {

    public function index()
    {
        echo 'Hello World!';

    }

    public function test()
   {
       $this->load->model('model2');
        $data_list['list'] = $this->model2->get_db();
       $this->load->view('view2', $data_list);
   }

}


?>
