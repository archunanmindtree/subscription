  <?php // Main body ?>
  <div class="container mycontainer_inner">
     <div class="container-fluid" role="main">

        <?php // Main content ?>
	
	     <div >
		   <h3>My Subscription</h3>
	   </div>
	
		<div class="col-xs-12 " >
		<form method="post" id="frm_unsubscribe" class="form-inline" >
		<div class="row">
		<div class="form-group  col-xs-4 col-md-4">
		<label class="control-label">Category</label>
		<?php echo form_multiselect('category[]', $categories, '','class="form-control" id="usercategory" tabindex="1" style="width:250px;"');?>		  
		
		</div>
		<div class="form-group  col-xs-4 col-md-4">
		<label class="control-label">Brand</label>
	
	     <?php echo form_multiselect('brand[]', $brands, '','class="form-control" id="userbrand" tabindex="2" style="width:250px;"');?>		  
		
		</div>
		<div class="form-group  col-xs-4 col-md-4 ">
		<label class="control-label">Site</label>
		
	    <?php echo form_multiselect('site[]', $sites, '','class="form-control " id="usersite" tabindex="3" style="width:250px;"');?>		  
	
		</div>
	   </div>
	   <div class="row">
		<div class="form-group  col-xs-4 col-md-4 ">
		<label class="control-label">Solutions</label>
		
	    <?php echo form_multiselect('solution[]', $solutions, '','class="form-control" id="usersolution" tabindex="4" style="width:250px;"');?>		  

		</div>
		<div class="form-group  col-xs-4 col-md-4 ">
		<label class="control-label">Communication</label>

	    <?php echo form_multiselect('communication[]', $communications, '','class="form-control" id="usercommunication" tabindex="5" style="width:250px;"');?>		  
		 </div>
	  
       </div>
		 <div class="form-group col-xs-8 "> 
		 <div class="col-xs-12 " style="padding-left: 10px;padding-bottom: 10px;padding-top: 10px;">
		 <button type="submit" id="btnunsubSave" class="btn btn-warning" >Unsubscribe</button>
		 </div>
		</div>
		</form>

		</div>

	</div>
   </div>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                Your unsubsribed Details
            </div>
            <div class="modal-body">
                 <span class="panel-heading">Are you sure you want to submit the following details?</span>

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th>Category</th>
                        <td id="category_selected"></td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td id="brand_selected"></td>
                    </tr>
					 <tr>
                        <th>Sites</th>
                        <td id="site_selected"></td>
                    </tr>
					 <tr>
                        <th>Solutions</th>
                        <td id="solution_selected"></td>
                    </tr>
					 <tr>
                        <th>Communication</th>
                        <td id="communication_selected"></td>
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

