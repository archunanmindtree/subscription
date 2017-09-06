  <?php // Main body ?>
  <div class="container mycontainer_inner">
     <div class="container-fluid" role="main">
        <?php // Main content ?>

	    <div >
		   <h3 style="padding-left: 2px;">Subscribe By Category </h3>
	   </div>
		<div class="row">
		<div class="col-xs-12 " >
		<form method="post" id="frm_add" class="form-inline" >
			<div class="form-group  col-xs-4 col-md-4">
			<label class="control-label">Category</label>
			 <div class="category" >
			<?php echo form_multiselect('category[]', $categories, '','class="form-control required" size="20" id="category" tabindex="1" style="display:inline;width:250px;"');?>		  
			</div>
			</div>
			<div class="form-group brandclass  col-xs-4 col-md-4">
			<label class="control-label">Brand</label>
			<select  id="brand" multiple="multiple" name="brand[]" style="width:250px;" size="20"  tabindex="2">
			</select>
			</div>
			<div class="form-group siteclass  col-xs-4 col-md-4" >
			<label class="control-label">Site</label>
			<select  id="site" multiple="multiple" name="site[]" style="width:250px;" size="20" tabindex="3">
			</select>
			</div>
			 <div class="row"> 
			 <div class="col-sm-offset-2 " >
			 <button type="submit" id="btnSave" class="btn btn-warning" >Subscribe</button>
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
                Your Subscription Details. 
            </div>
            <div class="modal-body">
                <span class="panel-heading"> Are you sure you want to submit the following details?</span>
				 <!-- The Latest list will be updated to the system, all your old subcriptions will be removed. -->

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
                </table>

            </div>
	        <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" id="submit" class="btn btn-success success">Submit</a>
			</div>
		</div>
	</div>
</div>