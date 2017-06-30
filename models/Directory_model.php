<?php 
   class Directory_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  public function auth($email, $pwd)
	  {
		   $data=$this -> db
			   -> select('*')
				-> where(array('email'=> $email, 'pwd'=>$pwd))
			   -> limit(1)
			   -> get('user')
			   -> result_array();
			   return $data;
	  }
	  
   }  
 ?>  