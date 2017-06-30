  
<div class="container">
  <div class="row">
    
  
      <?php

			$dir='./assets/uploads/';
			$files = directory_map($dir, 1);
			foreach ($files as $f) {
				if (is_dir("./assets/uploads/$f")) {
					?>
					  <a href="<?php echo base_url()?>index.php/panel/dir_listing/<?php echo $f?>" class="col-sm-2">
						<div> 
							<img src="<?php echo base_url()?>assets/images/folder.png" class="img-responsive" />
						</div>	
						<p class="text-center h4"><?php echo $f?></p>	
						
					</a>
				<?php 
				}
			  }
		?>
  </div>
</div>
