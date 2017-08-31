<?php // Main body ?>
  <div class="container mycontainer_inner">
    <div class="container-fluid" role="main">

        <?php // Main content ?>
	    <div class="row">
		<div class="col-xs-12" >
		 <form method="post" id="frm_category" class="form-inline">
     
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
		 
	     <div class="form-group" > 
			<div class="col-md-offset-10" style="width: 577px;padding-top: 10px;padding-bottom: 10px;">
			  <button type="submit" id="btnSave" class="btn subcriptionBtn" data-toggle="modal" >Subscribe</button>
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
			  	<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to submit the following details?</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr style="border-top:0;">
                        <th style="border-top:0;">Solutions</th>
                        <td style="border-top:0;" id="solution_selected"></td>
                    </tr>
                    <tr style="border-top:0;">
                        <th style="border-top:0;">Communication Type</th>
                        <td style="border-top:0;" id="communication_selected">All</td>
                    </tr>
                </table>

            </div>
	        <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" id="submit" class="btn btn-success success">Submit</button>
			</div>
		</div>
	</div>
</div>
