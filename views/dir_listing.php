  
<div class="container">
  <div class="row">
    
  
      <?php

		if(isset($fold))
		{
			$i=0;
			$dir="./assets/uploads/$fold";
			$files = directory_map($dir, 1);
			foreach ($files as $f) {
				if (!is_dir("./assets/uploads/$fold/$f")) {
					$i++;
					?>
					  <a data-toggle="modal" data-target="#<?php echo $i?>" style="cursor:pointer" class="col-sm-2">
						<div> 
							<img src="<?php echo base_url()?>assets/uploads/<?php echo $fold?>/<?php echo $f?>" class="img-responsive" />
						</div>	
						<p class="text-center h4"><?php echo $f?></p>	
						
					</a>
					
					<div id="<?php echo $i?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						  </div>
						  <div class="modal-body">
							<img src="<?php echo base_url()?>assets/uploads/<?php echo $fold?>/<?php echo $f?>" class="img-responsive" />
						  </div>
						</div>

					  </div>
					</div>
				<?php 
				}
			  }
		}
		else
		{
			echo "Error Occured";
		}
		?>
  </div>
</div>