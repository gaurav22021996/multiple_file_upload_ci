<!DOCTYPE html>
<html lang="en">
<head>
  <title>Image Directory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo  base_url();?>assets/js/script.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Image Directory</h1>
  <p><a href="<?php echo base_url();?>index.php/panel">Home</a>/<?php echo $pagination; ?></p> 
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>index.php/panel">Image Directory</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="<?php echo base_url();?>index.php/panel">Dashboard</a></li>
      <li><a  href="<?php echo base_url();?>index.php/panel/add_images">Add Images</a></li>
	  <?php
			if(isset($_SESSION['name']) && $_SESSION['name']!="")
			{
				?>	
				<li><a href="<?php echo base_url();?>index.php/panel/logout">Logout</a></li>
	<?php	}
			else
			{
				?>	
				<li><a href="<?php echo base_url();?>index.php/panel/login">Login</a></li>
	<?php	}
	  ?>
    </ul>
  </div>
</nav>