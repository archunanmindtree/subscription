<?php // Footer ?>


<footer class="container-fluid container-footer">
<div class="container">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="copyright">
					Subscription System 
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
			 <div class="design">
					 <a href="<?php echo base_url();?>subscription/category">Subscribe By Category</a>	
                     <a href="<?php echo base_url();?>subscription/solution">Subscribe By Solution</a>						 
					 <a href="<?php echo base_url();?>subscription/index">My Subscriptions</a> 
                     					 
			 </div>
			</div>
		</div>
	</div>
</div>
</footer>
<script type="text/javascript" src="<?php echo base_url("public/assets/js/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
<!--<script type="text/javascript" src="<?php //echo base_url("public/assets/js/chosen.jquery.min.js"); ?>"></script>-->
<script type="text/javascript" src="<?php echo base_url("public/assets/js/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/assets/js/select.js"); ?>"></script>
   <?php // Javascript files ?>
   <script type="text/javascript">
   var base_url = window.location.href;
	base_url = base_url.split('/');
			
	if (base_url[2] == 'wots.mindtree.com')
	{
		base_url = base_url[0]+'//'+base_url[2]+'/v2';
	}
	else
	{
		base_url = base_url[0]+'//'+base_url[2];
	}
$(document).ready(function() {
	
	//Scroll section 
	$(".data-section").each(function () {
		$(this).hide();
	
	}); 
	/*$(".lists").click(function(){
		alert("test");
        if ($(this).hasClass("selected")){
          $(this).removeClass("selected");
        }
        else{
          $(this).addClass("selected");
        }
    });
*/


	$('.category a').on("click", function (e) {
		e.preventDefault();
		var id = $(this).attr('data-related');
		var type = id.slice(0,3);
		var type_id = id.slice(5,10);
		//var cat_ids = multiplecat();
		if( type == 'cat'){
			// console.log(category_ids);
			  var request = $.ajax({
			  type: "POST",
			  data: 'category='+type_id,
			  dataType: "json",
			  url: base_url+"/subscription/get_brands", 
			  });
			  request.done(function( res ) {
				 //console.log(res);
				if(res!=false)
				{
				  // $(".brandclass").show();
				  
				  
				// updateBrands(res);
				}else
				 $(".brandclass").hide();
					
			  });
		}
		else{
			
		}
		$(".data-section").each(function () {
       
			if ($(this).attr('id') == id) {
		
				$(this).toggle();
				
			}
			
	
		});
});
	
	
	
	
	
    //$(".brandclass").hide();
   //$(".siteclass").hide(); 	 
   $('#frm_add').validate({
		  	
 			submitHandler: function(form) {
			//form.submit();
			
		    $('#confirm-submit').modal('show');
			
		    var options = jQuery("#category option:selected");
			var category_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   	
			$('#category_selected').text(category_ids);
			
			var options = jQuery("#brand option:selected");
			var brand_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   
			$('#brand_selected').text(brand_ids);
			
			var options = jQuery("#site option:selected");
			var site_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			}); 
			$('#site_selected').text(site_ids);	  
			
			/* solution page datas  */
			var options = jQuery("#solution option:selected");
			var solution_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   	
			$('#solution_selected').text(solution_ids);
			
			var options = jQuery("#communication option:selected");
			var communication_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   
			$('#communication_selected').text(communication_ids);
			
	 
			  $('#submit').click(function(e){
				  	e.preventDefault();
				 // $('#frm_add').submit();// form submit
					 $.ajax({
								url :base_url+"/subscription/submit", 
								type: "POST",
								data: $('#frm_add').serialize(),
								dataType: "JSON",
								success: function(res)
								{
									//console.log(res); 
									window.location.href  = base_url+'/subscription'; 
								  //location.reload();// for reload a page
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									console.log(jqXHR); 
									console.log(errorThrown); return false;
									alert('Error adding / update data');
								}
							 });
				});
			}	
	});
     $('#frm_unsubscribe').validate({
		  	
 			submitHandler: function(form) {
			//form.submit();
			
		    $('#confirm-submit').modal('show');
			
		    var options = jQuery("#usercategory option:selected");
			
			var category_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   	
			$('#category_selected').text(category_ids);
			
			var options = jQuery("#userbrand option:selected");
			var brand_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   
			$('#brand_selected').text(brand_ids);
			
			var options = jQuery("#usersite option:selected");
			var site_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			}); 
			$('#site_selected').text(site_ids);	  
			
			/* solution page datas  */
			var options = jQuery("#usersolution option:selected");
			var solution_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   	
			$('#solution_selected').text(solution_ids);
			
			var options = jQuery("#usercommunication option:selected");
			var communication_ids = jQuery.map(options, function (option) {
			//console.log(option.value);
			return option.text; //option.text;
			});   
			//console.log(communication_ids);
			//if(communication_ids != "")
			$('#communication_selected').text(communication_ids);
			
	 
			  $('#submit').click(function(e){
				  	e.preventDefault();
				 // $('#frm_unsubscribe').submit();// form submit
					 $.ajax({
								url :base_url+"/subscription/unsubscribe", 
								type: "POST",
								data: $('#frm_unsubscribe').serialize(),
								dataType: "JSON",
								success: function(res)
								{
									console.log(res); 
									window.location.href  = base_url; 
								  //location.reload();// for reload a page
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									console.log(jqXHR); 
									console.log(errorThrown); return false;
									alert('Error adding / update data');
								}
							 });
				});
			}	
	}); 

	
    //$("#brand,#site").chosen();
	//$("#team,#communication").chosen();
    $("#category").change(function(){

	  //var category_id = $(this).find(":selected").val();
	  
	  //categoryval = jQuery(this).find("option:selected").val();   
  
	  var options = jQuery("#category option:selected");
	 
	  var category_ids = jQuery.map(options, function (option) {
      //console.log(option.value);
       return option.value; //option.text;
      });   
	 // console.log(category_ids);
	  var request = $.ajax({
	  type: "POST",
	  data: 'category='+category_ids,
	  dataType: "json",
	  url: base_url+"/subscription/get_brands", 
	  });
	  request.done(function( res ) {
		 //console.log(res);
		if(res!=false)
		{
		 $(".brandclass").show();
         updateBrands(res);
		}else
		 $(".brandclass").hide();
			
      });
   });
   $("#brand").on('change', function (e) {
	  // var brand_id = $(this).find(":selected").val();
	  var options = jQuery("#brand option:selected");
	 
	  var brand_ids = jQuery.map(options, function (option) {
      //console.log(option.value);
       return option.value; //option.text;
      });   
	  var request = $.ajax({
	  type: "POST",
	  dataType: "json",
	  data: 'brand_id='+brand_ids,
	  url: base_url+"/subscription/get_urls", 
	  });
	   request.done(function( urls ) {
		 //console.log(urls);
		if(urls!=false)
		{			
	     $(".siteclass").show();   
         updateSites(urls);
		}
		else
		 $(".siteclass").hide();
      });
  });
 });
 var cat_ids = [];var cat_names =[]
 function multiplecat(id) {
       
    var b;	 
	if(cat_ids.length ==0)
	{
		cat_ids.push(id);

			b = 1 ;
			$("#brands li a").addClass("selected");
	}   
	console.log(id,"cat");
	var a;
	if( b!=1){
    for (var i = 0; i < cat_ids.length; i++) {
		if(cat_ids[i]== id)
		{
		cat_ids.splice(i, 1);
		   a=0;
		   $("#brands li a").removeClass("selected");
		   break;
		}else{
			a = 1;
		}
    }
   }
	if(a == 1){
			cat_ids.push(id);
	}
		
	if(cat_ids.length>0){
	var request = $.ajax({
			  type: "POST",
			  data: 'category='+cat_ids,
			  dataType: "json",
			  url: base_url+"/subscription/get_brands", 
			  });
			  request.done(function( res ) {
				// console.log(res);
				if(res!=false)
				{
				  $(".brandclass").show();
				  	  
				  $("#brands").html(res);
				// updateBrands(res);
				}else
				 $(".brandclass").hide();
					
			  });
	}
	else
		 $("#brands").empty();
}
var brand_ids = [];
function multipleids(id) {

        if ($(this).hasClass("selected")){
          $(this).removeClass("selected");
        }
        else{
          $(this).addClass("selected");
        }
    

	var d;	 
	if(brand_ids.length ==0)
	{
		brand_ids.push(id);
			d = 1 ;
	}   
	console.log(id,"brand");
	var c;
	if( d!=1){
    for (var j = 0; j < brand_ids.length; j++) {
		if(brand_ids[j]== id)
		{
			console.log('deleting before',brand_ids[j]);
		brand_ids.splice(j, 1);
			console.log('after before',brand_ids[j]);
			console.log('after before',brand_ids);
		   c=0;
		   break;
		}else{
			c = 1;
		}
    }
   }
	if(c == 1){
			brand_ids.push(id);
	}
	if(brand_ids.length>0){
	var request = $.ajax({
	  type: "POST",
	  dataType: "json",
	  data: 'brand_id='+brand_ids,
	  url: base_url+"/subscription/get_urls", 
	  });
	   request.done(function( urls ) {
		 //console.log(urls);
		if(urls!=false)
		{			
	     $(".siteclass").show(); 
         $("#sites").html(urls);		 
        // updateSites(urls);
		}
		else
		 $(".siteclass").hide();
      });
	}
	else{
		$("#sites").empty();
	
	}
}

/*function deleteElem(arr, el) {
	console.log("deleting");
      var index = arr.indexOf(el);
      if (index > -1) {
        var len = arr.length - 1;
        for (var i = index; i < len; i++) {
          arr[i] = arr[i + 1];
        }
        arr.length = len;
      }
    } */
 function updateBrands(data) {
		//console.log(data);
		var $SubItems = [],
			values = $("#category").val();
			if (values) $.each(values, function (i, c) {
				$.each(data[c], function (index, item) {
					$SubItems.push($("<option/>", {
						value: item.Value,
						text: item.Text
					}));
				});
			 });
	$("#brand").empty().append($SubItems).trigger("chosen:updated");
 }
 function updateSites(sitedata) {
	   // console.log(data);
		var $Subsites = [],
			Brandvalues = $("#brand").val();
			if (Brandvalues) $.each(Brandvalues, function (i, c) {
				$.each(sitedata[c], function (index, item) {
					$Subsites.push($("<option/>", {
						value: item.Value,
						text: item.Text
					}));
				});
			 });

	$("#site").empty().append($Subsites).trigger("chosen:updated");
 }

 
</script>

</body>
</html>
