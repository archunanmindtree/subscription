<?php // Main body ?>
  <div class="container mycontainer_inner">
     <div class="container-fluid" role="main">
        <?php // Main content ?>
	   
	   <div class="row">
		<div class="col-md-12" >
		<form method="post" id="frm_unsubscribe" class="form-inline" >
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
			<div class="form-group col-md-4">
			<label class="control-label dropdownTitle">Brands</label>
			 <div class="category" id="category" >
				<div class="demo">
					<div class="scrollbar-inner">
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
				<div class="demo">
					<div class="scrollbar-inner">						
					   <ul class="list-group myUL" id="brand">
					     <div id="brands">
							<?php echo  $brands;?>
						 </div>
						</ul>
						
					</div>
				</div>
			 </div>
			</div>
			<div class="form-group siteclass col-md-4" >
			<label class="control-label dropdownTitle">Site</label>
			<div class="category">
				<div class="demo">
					<div class="scrollbar-inner">
					 <ul class="list-group myUL" id="sites">
					
							<?php echo  $sites;?>
						
						</ul>
					</div>
				</div>
			 </div>
			</div>
			<div class="form-group col-md-6">
           <label class="control-label dropdownTitle">Solution</label>
				<div class="category" >
				<div class="demo">
					<div class="scrollbar-inner">
						<ul class="myUL"  id="solution">
							<?php echo  $solutions;?>
						</ul>
					</div>
				</div>
			</div>
          </div>
    
	     <div class="form-group col-md-6">
          <label class="control-label dropdownTitle">Communication</label>
				<div class="category"  >
				<div class="demo">
					<div class="scrollbar-inner">
						<ul class="myUL" id="communication">
								<?php //echo  $communication;?>
						</ul>
					</div>
				</div>
			</div>
         </div>
			 <div class="row"> 
			 <div class="col-md-12">
			 <button type="submit" id="btnSave" class="btn catsubcriptionBtn">Unsubscribe</button>
			 </div>
			</div>
		 </form>
		</div>
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
                
			 <div class="progress" id="submit_progress" style="width:100%;display:none">
			  <div class="progress-bar progress-bar-success " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="load" style="width:0%">
				0%
			  </div>
			</div>	

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th style="border-top:0;">Category</th>
                        <td id="category_selected" style="border-top:0;"></td>
                    </tr>
                    <tr id ="brand_msg">
                        <th style="border-top:0;">Brand</th>
                        <td id="brand_selected" style="border-top:0;"></td>
                    </tr>
					 <tr id ="site_msg">
                        <th style="border-top:0;">Sites</th>
                        <td id="site_selected" style="border-top:0;"></td>
                    </tr>
					 <tr id ="sol_msg">
                        <th style="border-top:0;">Solutions</th>
                        <td id="solution_selected" style="border-top:0;"></td>
                    </tr>
					 <tr id ="com_msg">
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

