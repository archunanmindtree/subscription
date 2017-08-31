<?php // Main body ?>
  <div class="container mycontainer_inner">
     <div class="container-fluid" role="main">
        <?php // Main content ?>
	   
	   <div class="row col-md-12" > 
			    <div class="btn-group col-md-offset-5">
				 
			   </div>
		</div>
	   
		<div class="col-xs-12" >
		<form method="post" id="frm_admin" class="form-inline" >
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
								<?php //echo  $brands;?>
							 </div>
							</ul>
							
						</div>
					</div>
				 </div>
				</div>
				<div class="form-group siteclass col-md-4" >
				<label class="control-label dropdownTitle">Site</label>
				<div class="category">
					<div class="scrollbar" id="style">
						<div class="force-overflow">
						 <ul class="list-group myUL"   id="site">
						 <div  id="sites">
								<?php //echo  $sites;?>
							</div> 
							</ul>
						</div>
					</div>
				 </div>
				 </div>
			 </div>
			 <div class="row col-md-12"> 
			   <div class="form-group col-md-offset-4" >
			    <label class="control-label">Email  </label>
				<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			    <input type="text" class="form-control"  placeholder="Enter email address" id="email_address" name="email_address"/>
			    </div>
			   </div>
			   <div class="form-group " >
			     <div class="btn-group btn-group-sm">
			     <button type="button" id="btnaddSave" class="btn btn-primary bt_save" onclick="add_subscription()">Add</button>
				 <button type="button" id="btnremoveSave" class="btn btn-primary bt_save"  onclick="remove_subscription()">Remove</button>
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
								<?php echo  $com_list;?>
						</ul>
					</div>
				</div>
			</div>
          </div>
         </div>
			 
			  <div class="row col-md-12" > 
			    <div class="btn-group col-md-offset-5">
				  <button type="button" id="import"  class="btn btn-primary" onclick="import_excel()" >Upload list</button>
				  <button type="button" id="export"  name ="export" value="export" class="btn btn-primary" onclick="export_excel()"  >Export list</button>
			   </div>
			
	    	</div>
			 
		 </form>
		
	   	</div>

   </div>
 </div>
<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">Upload the Distribution list</h4>
            </div>
             <div class="modal-body">
               
			  <form method="post" id="frm_import"  name="frm_import"  class="form-horizontal" enctype="multipart/form-data" >
				<div class="form-group">
				 <label class="control-label col-md-2">File(.xls|.xlsx)</label>
				  <div class="col-md-5">
                   <input id="excel_file"  name="excel_file" type="file" class="file" data-show-preview="false">
				  </div>
				  <div class="col-md-2"><a href ="<?php echo base_url().'public/data/list.xls'?>">Sample format</a>
				   </div>  
				</div>
				  <div class="form-group">
				  <div class="col-xs-9 col-xs-offset-2">
					<button type="submit" id="btnImport" name ="import" value="import"  class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			      </div>
			     </div> 
              </form>
			
            </div>
	       
		</div>
	</div>
</div>