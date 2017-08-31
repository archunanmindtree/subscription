<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

   <div class="main" align='center'  style="width:100%;min-height:100px">
		<div class="container" role="main">
		 <form class="form-horizontal" action="<?php echo base_url();?>user/verify_login" id="login" method="POST">
		 <fieldset>
		 <div class="form-group row">
		  <label for="inputEmail3" class="col-xs-2 col-form-label">Email :</label>
		  <div class="col-xs-4">
			<input type="text" class="form-control" name="username" id="inputEmail3" placeholder="Email">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="inputPassword3" class="col-xs-2 col-form-label">Password:</label>
		  <div class="col-xs-4">
			<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
		  </div>
		 </div>
		 <div class="form-group row">
		  <div class="offset-sm-2 col-sm-6">
			<button type="submit" class="btn btn-primary">Login</button>
		  </div>
		</div>
		 </fieldset>
		</form>
  	
	</div>
	</div>