<?php // Main body ?>
  <div class="container mycontainer_inner">
     <div class="container-fluid" role="main">
        <?php // Main content ?>
	
		<div class="col-xs-12 " >
		<form method="post" id="frm_unsubscribe" class="form-inline" >
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
		<div class="row">
			<div class="form-group col-md-4">
			<label class="control-label dropdownTitle">Category</label>
			 <div class="category" id="category" >
				<div class="scrollbar" id="style">
					<div class="force-overflow">

						<ul class="list-group myUL" id="category">
							<?php echo  $categories;?>
						</ul> 
					</div>
				</div>
			</div>
			</div>
			<div class="form-group brandclass col-md-4">
			<label class="control-label dropdownTitle">Brand</label>
			<div class="category">
				<div class="scrollbar" id="style">
					<div class="force-overflow">
						
					   <ul class="list-group myUL"   id="brand">
					     <div id="brands">
							<?php echo  $brands;?>
						 </div>
						</ul>
						
					</div>
				</div>
			 </div>
			</div>
			<div class="form-group  col-md-4" >
			<label class="control-label dropdownTitle">Site</label>
			<div class="category">
				<div class="scrollbar" id="style">
					<div class="force-overflow">
					 <ul class="list-group myUL"   id="site">
					 <div  id="sites">
							<?php echo  $sites;?>
						</div> 
						</ul>
					</div>
				</div>
			 </div>
			</div>
		</div>
	   <div class="row">
	     <div class="form-group col-md-5">
           <label class="control-label dropdownTitle">Solution</label>
				<div class="category" >
				<div class="scrollbar" id="style">
					<div class="force-overflow">
						<ul class="myUL"  id="solution">
							<?php echo  $solutions;?>
						</ul>
					</div>
				</div>
			</div>
          </div>
    
	     <div class="form-group col-md-5">
          <label class="control-label dropdownTitle">Communication</label>
				<div class="category"  >
				<div class="scrollbar" id="style">
					<div class="force-overflow">
						<ul class="myUL" id="communication">
								<?php echo  $communications;?>
						</ul>
					</div>
				</div>
			</div>
          </div>
		 </div> 
		 <div class="row col-xs-8 col-md-8"> 
		 <div class="col-xs-12 " style="padding-left: 10px;padding-bottom: 10px;padding-top: 10px;">
		 <center>
		 <button type="submit" id="btnunsubSave" class="btn btn-warning" >Unsubscribe</button>
		 </center>
		 </div>
		</div>
	  </form>
	</div>
   </div>
</div>
<div class="modal fade" id="category-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">Are you sure you want to submit the following details?</h4>
            </div>
            <div class="modal-body">
                

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th style="border-top:0;">Category</th>
                        <td id="category_selected" style="border-top:0;"></td>
                    </tr>
                    <tr>
                        <th style="border-top:0;">Brand</th>
                        <td id="brand_selected" style="border-top:0;"></td>
                    </tr>
					 <tr>
                        <th style="border-top:0;">Sites</th>
                        <td id="site_selected" style="border-top:0;"></td>
                    </tr>
					 <tr>
                        <th style="border-top:0;">Solutions</th>
                        <td id="solution_selected" style="border-top:0;"></td>
                    </tr>
					 <tr>
                        <th style="border-top:0;">Communication</th>
                        <td id="communication_selected" style="border-top:0;"></td>
                    </tr>
                </table>
            </div>
	        <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" id="submit" class="btn btn-success success pull-right">Submit</a>
			</div>
		</div>
	</div>
</div>

