//++++++++++++++++++++++++ view +++++++++++++++++++++++++//
<div class="col-lg-4">
		<?php if(isset($error))
		{ echo $error;}?>

		
		<?php echo form_open_multipart('Panel/do_upload');?>
		<div class="has-success">
		<label>Upload Image</label>
		<input   required type="file" class="form-control" value="dasd" name="userFiles[]" size="20"  multiple />
		</div>
		<br />
		<label>Select Directory to upload in</label>
		<select name="directory" class="form-control">
			
			<?php

					$files = directory_map('./uploads/', 1);
				  foreach ($files as $f) {
					if (is_dir("./uploads/$f")) {
						?>
							<option value="<?php echo "./uploads/".$f?>"><?php echo $f?></option>	
					<?php 
					}
				  }
			?>
		</select>
		<br/>
		<input class="btn btn-sm btn-info" type="submit" value="upload" />

		</form>
		<br/>
</div>


//++++++++++++++++++++++++ view +++++++++++++++++++++++++//


//++++++++++++++++++++++++ controller  +++++++++++++++++++++++++//
<?php 
  public function do_upload()
{
		if(!isset($_SESSION['user']))
  {
	  $this->index();
  }
  else
  {
		if($this->input->post("directory")=="Select")
		{
			$dir="./uploads/";
		}
		else{
			$dir=$this->input->post("directory");
		}
		
		
		 $data = array();
		 $success=0;
		 
			$filesCount = count($_FILES['userFiles']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

				$uploadPath = $dir;
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

				$this->load->view('header' );
				$this->load->view('sidebar');
				$this->load->view('gallery', $error);
				 $this->load->view('footer');
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('header' );
				$this->load->view('sidebar');
				 $this->load->view('success_upload', $data);
				 $this->load->view('footer');
			   
		}
  }
}
?>
//++++++++++++++++++++++++ controller  +++++++++++++++++++++++++//