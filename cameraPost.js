$(document).ready(function (e) {


	$("#uploadImage").change(function(){
		// alert("A file has been selected.");
		$('#form').submit();

});


$("#form").on('submit',(function(e) {
	// alert("ramya")
	 e.preventDefault();
	 $.ajax({
		 url: "cameraPost.php",
		 type: "POST",
		 data:  new FormData(this),
		 contentType: false,
		 cache: false,
		 processData:false,
		 beforeSend : function()
		 {
			//  $("#preview").fadeOut();
			 $("#err").fadeOut();
		 },
		 success: function(data)
		 {
			//  alert(data)
			 if(data=='invalid')
			 {
				//  alert("invalid file format");
				 $("#err").html("Invalid File !").fadeIn();
			 }
			 else
			 {
                // alert("valid file format");
				 // view uploaded file.
				// $("#preview").html(data).fadeIn();
				 $("#form")[0].reset();	
			 }
			//  $('#modal').modal('toggle');
			 setInterval('refreshPage()', 2000);
		 
			},
		   error: function(e) 
		 {
			 $("#err").html(e).fadeIn();
		 } 	        
	});
 }));







});

function readyStateChanged() {
    alert(document.readyState);
}
// $(document).on('readystatechange', readyStateChanged); 

function refreshPage() {
    location.reload(true);
}