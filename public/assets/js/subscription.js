   var base_url = window.location.href;
	 base_url = base_url.split('/');
			
	if (base_url[2] == 'subscription.mindtree.com')	{
		base_url = base_url[0]+'//'+base_url[2]+'/v2';
	}
	else {
		base_url = base_url[0]+'//'+base_url[2];
	}
	
$(document).ready(function() {
	
	//Scroll section 
	$(".data-section").each(function () {
		$(this).hide();
	}); 
	$(document).on('click', ".lists", function(){
		//alert("test");
		if ($(this).hasClass("selected")){
		  $(this).removeClass("selected");
		}
		else{
		  $(this).addClass("selected");
		}
	});
	
	
	$('li').click(function(){
	$(this).css('background-color',"#337ab7")
	$(this).css('border-bottom',"5px solid #fff")
		$(this).find('a').css('color',"#fff")

	});
	$("li").click(function(){
	$(this).data('clicked', true);
		$(this).css('background-color',"#fff")
		$(this).find('a').css('color',"#000")
		
	});
	/*$(".bt_save").hide(); 
	$("#email_address").blur(function(){
		$(".bt_save").show(); 	
	});*/
	
	
   //$(".brandclass").hide();
   //$(".siteclass").hide(); 	 
   $('#frm_category').validate({
 			submitHandler: function(form) {
			//form.submit();
			 //alert('sdsad'+cat_ids+"brand"+brand_ids);
			 
			 
			 if(cat_ids.length > 0 || brand_ids.length > 0 || site_ids.length > 0  || sol_ids.length > 0 || com_ids.length > 0){
		     $('#category-submit').modal('show');
			 }else {
               alert("Please choose any one from the list to proceed");				 
			 }	 
		  
			 $('#category_selected').text(cat_names);
			 
			 var tmp_bname = []; var temp_id = brand_names;
			   console.log('null:'+brand_names.length);
			  //console.log('null:'+temp_id);
		      $.each(cat_ids, function (id, val) {
				
				  if(temp_id.length > 0) {
					  //console.log(temp_id[key].brand+':'+temp_id[key].cat);
				   $.each(temp_id, function (key, tval) {
					   //console.log(val+'null:'+temp_id+'selected'+temp_id[key].cat);
				
				    if (temp_id[key].cat != val ){
						 tmp_bname.push('All brands and sites under the '+cat_names[id]+' category');
					}else{
					   tmp_bname.push(temp_id[key].brand);
					} 
				   });
				  }else{
					   tmp_bname.push('All brands and sites under the '+cat_names[id]+' category');
				 }
			});
			console.log(cat_ids+':'+tmp_bname);
		    //console.log(cat_relid);
			
			 var brand_name =  array_unique(tmp_bname);
					
			 $listSelector = $("#brand_selected") //Your list element
			 $.each(brand_name, function(i, obj) {
			  $listSelector.append("<li><span>"+obj+"</span></li>")
			 });
		
              			
			// $('#brand_selected').text(tmp_bname);
			// console.log(brand_names); 
			 
		    var tmp_sitename = []; var temp_sid = site_names;
			
		     $.each(brand_ids, function (sid, sval) {
				  
				   if(temp_sid.length > 0) {
				   $.each(temp_sid, function (skey, stval) {
					//console.log(temp_sid[skey].site+':'+temp_sid[skey].brand);
					if (temp_sid[skey].brand != sval){
						tmp_sitename.push('All sites under the '+brand_selected[sid]+' Brand');
					}else
						tmp_sitename.push(temp_sid[skey].site);
				  });
				}else
					tmp_sitename.push('All sites under the '+brand_selected[sid]+' Brand');
			  }); 
			  
	      	var site_name =  array_unique(tmp_sitename);

			$listSelector = $("#site_selected") //Your list element
			$.each(site_name, function(i, obj) {
			$listSelector.append("<li><span>"+obj+"</span></li>")
			});

			// $('#site_selected').text(tmp_sitename);
             //console.log(site_names); 			 

			 
			 $('#solution_selected').text(sol_names);
			 	console.log(com_ids+com_names); 
			 $('#communication_selected').text(com_names);
		     $('#submit').click(function(e){
			 e.preventDefault();
				// $('#frm_add').submit();// form submit
			 $.ajax({
						url :base_url+"/subscription/submit", 
						type: "POST",
						data:  { category: cat_ids,
								  brand: brand_ids,
								  site:site_ids,
								  solution:sol_ids,
								  communication:com_ids,
						
								},
						dataType: "json",
						success: function(res)
						{
							console.log(res); 
							 //alert(res);return false;
							window.location.href  = base_url+'/subscription'; 
						  //location.reload();// for reload a page
						},
						error: function (jqXHR, textStatus, errorThrown)
						{   
							
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
									//console.log(res); 
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
	
    $( "#frm_import" ).validate({
		  rules: {
			excel_file: {
			  required: true,
			  extension: "xls|xlsx",
			}
		  },
		submitHandler: function (form) {
        var postData = new FormData($("#frm_import")[0]);
  	    $.ajax({
	  			contentType: false,
				processData: false,
				data: postData,
				type: 'post',
				url: base_url+"/subscription/list_import",
			    success: function(res)	{
						console.log(res); 
						// alert(res);return false;
					  //window.location.href  = base_url+'/subscription/admin'; 
					  location.reload();// for reload a page
					},
					error: function (jqXHR, textStatus, errorThrown){   
						console.log(errorThrown);
						alert('Error in import ');
					}
			});		
		}
		 
	 });
 });
 //Cl

 function array_unique(parameter) {
	 	var result = parameter.filter(function(itm, i, a) {
		return i == parameter.indexOf(itm);
		});
		return result;
 }	 
 
 
 function export_excel() {

       var submit_val = $('#export').val();
		if(cat_ids.length <=0 && brand_ids.length <= 0 && site_ids.length <= 0 ) {
		  alert("Please choose any one from the list");		
		 }
		else {
			var category = $("<input>")
               .attr("type", "hidden")
               .attr("name", "category").val(cat_ids);
			   var brand = $("<input>")
               .attr("type", "hidden")
               .attr("name", "brand").val(brand_ids);
			     var site = $("<input>")
               .attr("type", "hidden")
               .attr("name", "site").val(site_ids);
               $('#frm_admin').append($(category));
		       $('#frm_admin').append($(brand));
			   $('#frm_admin').append($(site));
			   $("#frm_admin").attr("action", "/subscription/export").submit();
		/* $.ajax({
				url :base_url+"/subscription/export", 
				type: "POST",
				data:  {  category: cat_ids,
						  brand: brand_ids,
						  site:site_ids,
						  export_id:submit_val,
					  },
				success: function(res)	{
					console.log(res); 
					 //alert(res);return false;
					 //window.location.href  = base_url+'/subscription/export'; 
				  //location.reload();// for reload a page
				},
				error: function (jqXHR, textStatus, errorThrown)	{   
					console.log(errorThrown); 
					alert('Error adding / update data');
				}
			 }); */
		}
 }
  function add_subscription() {
	   //form.submit();
	   // $('#frm_admin').submit();
	     var email = $('#email_address').val();
		 //console.log(email); 
		 	if(cat_ids.length <=0 && brand_ids.length <= 0 && site_ids.length <= 0 ) {
		      alert("Please choose any one from the list");		
			 }
			else  if(email=='') {
			  alert("Please enter the email address of user to subscribe");
			}
			else {
			 $.ajax({
					url :base_url+"/subscription/submit", 
					type: "POST",
					data:  {  category: cat_ids,
							  brand: brand_ids,
							  site:site_ids,
							  email_address:email,
					
							},
					dataType: "json",
					success: function(res)	{
						console.log(res); 
						 //alert(res);return false;
						 window.location.href  = base_url+'/subscription'; 
					  //location.reload();// for reload a page
					},
					error: function (jqXHR, textStatus, errorThrown) {   
						
						console.log(errorThrown); return false;
						alert('Error adding / update data');
					}
				 });
			}	 

  }
  function remove_subscription() {
	   //form.submit();
	  // $('#frm_admin').submit();
	   var email = $('#email_address').val();
				// $('#frm_add').submit();// form submit
			//console.log(email); 
			
		    if(cat_ids.length <=0 && brand_ids.length <= 0 && site_ids.length <= 0 ) {
		      alert("Please choose any one from the list");		
			 }
			else  if(email=='') {
				alert("Please enter the email address of user to subscribe");
			}
			else {
			
		    $.ajax({
					url :base_url+"/subscription/unsubscribe", 
					type: "POST",
					data:  {  category: cat_ids,
							  brand: brand_ids,
							  site:site_ids,
							  email_address:email,
					
							},
					dataType: "json",
					success: function(res)	{
						console.log(res); 
						 //alert(res);return false;
						 window.location.href  = base_url+'/subscription'; 
					  //location.reload();// for reload a page
					},
					error: function (jqXHR, textStatus, errorThrown) {   
						
						console.log(errorThrown); return false;
						alert('Error adding / update data');
					}
				 });
			}			 

 }
 		 
 function import_excel()   {
      $('#upload_modal').modal('show'); // show bootstrap modal
	   $("#upload_excel").html('');
	    
    } 
 
 var cat_ids = [];var cat_names =[];
 function multiplecat(id) {
    var b;	 
	if(cat_ids.length ==0)
	{
		cat_ids.push(id);
		cat_names.push( $("#"+id).text());
		b = 1 ;
			
	}   
	//console.log(id,"cat");
	var a;
	if( b!=1){
    for (var i = 0; i < cat_ids.length; i++) {
		if(cat_ids[i]== id)
		{
		   cat_ids.splice(i, 1);
		   a=0;
		   
		
		   break;
		}else{
			a = 1;
		}
     }
   }
	if(a == 1){
			cat_ids.push(id);
			cat_names.push( $("#"+id).text());
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
	{
	    $("#brands").empty();
    	$("#sites").empty();
	}

}
var brand_ids = [];var brand_names =[];brand_selected =[];
function multipleids(id) {

	var d;	 
	if(brand_ids.length ==0)
	{
		brand_ids.push(id);
		var cat_relid = {
            cat: $("#brand #"+id).attr('data-related'), 
            brand: $("#brand #"+id).text()
        }; 
		brand_names.push(cat_relid);
		brand_selected.push($("#brand #"+id).text());
		d = 1 ;
	}   
	//console.log(id,"brand");
	var c;
	if( d!=1){
    for (var j = 0; j < brand_ids.length; j++) {
		if(brand_ids[j]== id)
		{
		    brand_ids.splice(j, 1);
			$('#brand_selected').text('');
		   c=0;
		   break;
		}else{
			c = 1;
		}
    }
   }
	if(c == 1){
			brand_ids.push(id);
			var cat_relid = {
            cat: $("#brand #"+id).attr('data-related'), 
            brand: $("#brand #"+id).text()
        }; 
		brand_names.push(cat_relid);
		brand_selected.push($("#brand #"+id).text());
			
	}
	if(brand_ids.length>0){
	var request = $.ajax({
	  type: "POST",
	  dataType: "json",
	  data: 'brand_id='+brand_ids,
	  url: base_url+"/subscription/get_sites", 
	  });
	   request.done(function( urls ) {
		 //console.log(urls);
		if(urls!=false) {			
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
var site_ids = []; var site_names =[];
function multiplesites(id) {
            
    var e;   
    if(site_ids.length ==0)
    {
        site_ids.push(id);
			var site_relid = {
            brand: $("#site #"+id).attr('data-related'), 
            site: $("#site #"+id).text()
        }; 
		site_names.push(site_relid);
		
            e = 1 ;
    }   
    console.log(id,"cat");
    var f;
    if( e!=1){
    for (var k = 0; k < site_ids.length; k++) {
        if(site_ids[k]== id)
        {
         site_ids.splice(k, 1);
           f=0;
           
           break;
        }else{
            f = 1;
        }
    }
   }
    if(f == 1){
            site_ids.push(id);
				var site_relid = {
            brand: $("#site #"+id).attr('data-related'), 
            site: $("#site #"+id).text()
        }; 
		site_names.push(site_relid);
    }
    //console.log(url_ids);
}

var sol_ids = [];var sol_names =[];
 function multiplesolutions(id) {
     
    var l;	 
	if(sol_ids.length ==0)
	{
		sol_ids.push(id);
		sol_names.push( $("#"+id).text());
	  
		l = 1 ;
			
	}   
	//console.log(id,"cat");
	var a;
	if( l!=1){
    for (var i = 0; i < sol_ids.length; i++) {
		if(sol_ids[i]== id)
		{
		   sol_ids.splice(i, 1);
		   a=0;
		
		   break;
		}else{
			a = 1;
		}
     }
   }
	if(a == 1){
			sol_ids.push(id);
			sol_names.push( $("#"+id).text());
	}
 }	
 var com_ids = [];var com_names =[];
 function multiplecoms(cid) {
     
    var h;	 
	if(com_ids.length ==0)
	{
		com_ids.push(cid);
		com_names.push( $("#communication #"+cid).text());
		h = 1 ;
			
	}   
	//console.log(cid,"cat");
	var j;
	if( h!=1){
    for (var i = 0; i < com_ids.length; i++) {
		if(com_ids[i]== cid)
		{
		   com_ids.splice(i, 1);
		   j=0;
		
		   break;
		}else{
			j = 1;
		}
     }
   }
	if(j == 1){
			com_ids.push(cid);
			com_names.push( $("#communication #"+cid).text());
	}
 }	