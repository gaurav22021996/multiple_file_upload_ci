<div class="container">
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		  <h2 class="text-center">Login form</h2>
		  <h6 class="text-center text-danger">
			<?php echo validation_errors();
				if(isset($denied))
				{
					echo $denied;
				}
			?>
		  </h6>
		  
		  <form method="post" action="<?php echo base_url()?>index.php/panel/auth">
			<div class="form-group">
			  <label for="email">Email:</label>
			  <input type="email"  class="form-control" id="email" placeholder="Enter email" name="email">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
			</div>
			<button type="submit" class="btn btn-default">Login</button>
		  </form>
	</div>
</div>
</div>