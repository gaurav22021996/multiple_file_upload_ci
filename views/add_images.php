<div class="container">
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		  <h2 class="text-center">Add Images form</h2>
		  <h6 class="text-center text-danger">
			<?php echo validation_errors();
				if(isset($denied))
				{
					echo $denied;
				}
			?>
		  </h6>
		  
			
			<?php echo form_open_multipart('Panel/do_upload');?>
				
				<label>Directory</label>
				<input class="form-control" type="text" name="dir" placeholder="Input Name of the directory" />
				<br/>
				<div >
				<label>Select Images</label>
				</div>
				
				<div class="input_field">
					<button class="btn btn-sm btn-primary add_field">Add</button>
					<br/>
					<br/>
					<div>
						<input   required type="file" class="form-control" value="dasd" name="userFiles[]" size="20"  multiple />
					</div>
				</div>
				<br />
				<input class="btn btn-sm btn-info" type="submit" value="upload" />

			</form>
	</div>
</div>
</div>
