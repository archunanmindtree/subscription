<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Default Public Template
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/bootstrap/css/bootstrap.min.css?ssnf" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/font-awesome.css?45" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/bootstrap/css/bootstrap-responsive.min.css?sss" />
    <!--<link rel="stylesheet" href="<?php //echo base_url();?>public/assets/bootstrap/css/bootstrap-chosen.css?12" />-->
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/subscription.css?897824" /> 
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/scrollbar.css" /> 
	
    <?php // CSS files 
	
	
	  $classhome = ($title =='Subscription System')?"active":"";
	  $classhome_breadcrumb = ($title =='Subscription System')?"home_breadcrumb":"";
	  $classcategory = ($title =='Subscribe By Category')? "active":'';
	  $classsolution = ($title =='Subscribe By Solution')?"active":'';
	  $classmysubscription = ($title =='My Subscriptions')?"active":'';
	
	?>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>public/assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/respond.min.js"></script>
    <![endif]-->
   <title><?php echo $title;?></title>
   
<script>
                					
                     
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<body>
	<nav class="topnav"></nav>
<div class="container-fluid">
<div class="row">
<div class="col-md-6 Logoheader">
				<a class="header-logo" href="http://subscription.local/#">
				<img src="<?php echo base_url();?>public/assets/images/logopggide.png" alt="logo"/> </a>
				<h2 class="header">Consumer Solution Subscription System</h2>
			</div>
	<div class="col-md-6 welcomeContainer">	
			<span class="welcomeTxt">
		Welcome Rajesh!
		</span>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="<?php echo base_url();?>">Home</a>
	<a href="<?php echo base_url();?>subscription/category">Subscribe By Brands</a>
	<a href="<?php echo base_url();?>subscription/solution">Subscribe By Solution</a>
	<a href="<?php echo base_url();?>subscription/index">My Subscriptions</a>
	<a href="<?php echo base_url();?>user/logout"><span class="glyphicon glyphicon-log-out"></span> logout</a>
  </div>
</div>	
</div>
</div>
</div>
	<div class="container titleBar">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo $title;?></h2>
		</div>
	</div>
	</div>
	<div class="container breadcrumbBar">
	<div class="row">
		<div class="col-md-12">
			<?php if($breadcrumb == "Home") {?>
				<div class = "breadcrumbBarHome">
					<?php echo $breadcrumb;?>
				</div>
			<?php } else { 
			echo $breadcrumb; }?>
		</div>
	</div>
</div>
     