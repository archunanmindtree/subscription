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
	<link rel="stylesheet" href="<?php //echo base_url();?>public/assets/css/font-awesome.css?45" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/bootstrap/css/bootstrap-responsive.min.css?sss" />
    <!--<link rel="stylesheet" href="<?php //echo base_url();?>public/assets/bootstrap/css/bootstrap-chosen.css?12" />-->
	<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/subscription.css?234324" /> 

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

</head>
<body>

<nav class="navbar navbar-inverse menubar-top">
	<div class="container">
		<ul class="nav navbar-nav">    
		</ul>
	</div>
</nav>

<nav class="navbar navbar-inverse menubar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>      
    </div>
	<div class="row bottomnav">
    <div class="container">
    <div class="collapse navbar-collapse" id="myNavbar">   
	
      <ul class="nav navbar-nav col-sm-10">
	        <a class="navbar-brand header-logo" href="http://subscription.local/#"><img src="<?php echo base_url();?>public/assets/images/logopggide.png" alt="logo"/></a>
		   <li class="item <?php echo $classhome;?>"> <a class="" href="<?php echo base_url();?>">Home</a></li>
		   <li class="item <?php echo $classcategory;?>"><a href="<?php echo base_url();?>subscription/category">Subscribe By Category</a></li>
		   <li class="item <?php echo $classsolution;?>"><a href="<?php echo base_url();?>subscription/solution">Subscribe By Solution</a></li>
		   <li class="item <?php echo $classmysubscription;?>"><a href="<?php echo base_url();?>subscription/index">My Subscriptions</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right col-sm-3 navbar-right-login">
		  <?php //if(!empty($userdata['id'])>0){ ?>
		   <li><a href="<?php echo base_url();?>user">User <?php //echo ucfirst($userdata['username']);?> </a></li>
		   <li><a href="<?php echo base_url();?>user/logout"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
		  <?php //}else { ?>
		     <!--<li><a href="<?php echo base_url();?>user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
		  <?php //} ?>

      </ul>
    </div>
  </div>
  </div>
  </div>
 </div>
</nav>

<nav class="navbar navbar-inverse menubar-bottom-one">
	<div class="container home-breadcrumb">
	 
		<h2 ><?php echo $title;?></h2>    
	 
  </div>
</nav>
<nav class="navbar navbar-inverse menubar-bottom-two ">
  <div class="container home-breadcrumb">
  <?php echo $breadcrumb;?>
  </div>
</nav>

     