<?php 
	class Panel  extends CI_Controller {
	
		  function __construct() { 
			 parent::__construct();
			 
			 $this->load->helper('url'); 
			 $this->load->database(); 
			  $this->load->helper('form'); 
			 $this->load->library('session');
			 $this->load->model("directory_model");
			 $this->load->helper('directory');
		  } 
		  public function index()
		  {
			   $data['pagination']="Dashboard";
				$this->load->view('header', $data );	
				 $this->load->view('dashboard' );
				 $this->load->view('footer' );
		  }
		  
		  public function login()
		  {
			  $data['pagination']="Login";
				$this->load->view('header', $data );	
				$this->load->view('login' );
				$this->load->view('footer' );
		  }
		  public function auth()
		  {
			 $this->load->library("form_validation");
			 
			 $this->form_validation->set_rules('email', "EMail", "required");
			 $this->form_validation->set_rules('pwd', "Password", "required");
			 if($this->form_validation->run()==FALSE)
			 {
				 $this->login();
			 }
			 else
			 {
				  $responce=$this->directory_model->auth($this->input->post('email'), md5($this->input->post('pwd')));
				  if(count($responce)!=0)
				  {
					  $this->session->set_userdata("name", $responce[0]['name']);
					  redirect("panel/index");
				  }
				  else
				  {
						$data['pagination']="Login";
						$data['denied']="Access Denied !!";
						$this->load->view('header', $data );	
						$this->load->view('login', $data );
						$this->load->view('footer' );
				  }

			 }
		  }
		  public function logout()
		  {
			  $this->session->unset_userdata("name");
			  redirect("panel/index");
		  }
		  public function dir_listing()
		  {
				$data['fold']=$this->uri->segment(3);
				$data['pagination']="Directory Listing/".$this->uri->segment(3);
				$this->load->view('header', $data );	
				 $this->load->view('dir_listing', $data);
				 $this->load->view('footer' );
		  }
		  public function add_images()
		  {
			  if(isset($_SESSION['name']))
			  {
					$data['pagination']="Add Images";
					$this->load->view('header', $data );	
					$this->load->view('add_images' );
					$this->load->view('footer' );
			  }
			  else
			  {
					$data['pagination']="Login";
					$data['denied']="Need to login first!!";
					$this->load->view('header', $data );	
					$this->load->view('login', $data );
					$this->load->view('footer' );
			  }
		  }
		  
		  public function do_upload()
		{
				$this->load->library("form_validation");
			 
				 $this->form_validation->set_rules('dir', "Directory", "required");
				 if($this->form_validation->run()==FALSE)
				 {
					 $this->add_images();
				 }		
				 else
				 {
					$dir=$this->input->post("dir");
					$new_dir="./assets/uploads/$dir";
					if (!mkdir($new_dir, 0777, true)) {
						$data['pagination']="Add Images";
						$data['denied']="Error Occured in creating directory !!";
						$this->load->view('header', $data );	
						$this->load->view('add_images', $data );
						$this->load->view('footer' );
					}

					else
					{
						$data = array();
						 $success=0;
						 
							$filesCount = count($_FILES['userFiles']['name']);
							for($i = 0; $i < $filesCount; $i++){
								$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
								$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
								$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
								$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
								$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

								$dir=$this->input->post("dir");
								$new_dir="./assets/uploads/$dir";
								$uploadPath = $new_dir;
								$config['upload_path'] = $uploadPath;
								$config['allowed_types'] = 'gif|jpg|png';
								
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								
								$this->upload->do_upload('userFile');
								++$success;
							}
						
						if ( $success==0)
						{
								$error = array('error' => $this->upload->display_errors());

								$data['pagination']="Add Images";
								$this->load->view('header', $data );	
								$this->load->view('add_images', $error );
								$this->load->view('footer' );
						}
						else
						{
							   redirect("panel/index"); 
						}		
					}
				 }
		}
		  
	}	
?>