<?php
    class Model2 extends CI_Model {

   function __construct()
   {
       // Call the Model constructor
       parent::__construct();
       $this->load->database();
   }

   public function get_db()
   {
     $query = "SELECT * FROM user";
      return $this->db->query($query)->result();

   }
}
?>
