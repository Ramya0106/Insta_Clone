$(document).ready(function (e) {

	$("#uploadImage").change(function(){
		// alert("A file has been selected.");
		$('#form').submit();

});


$("#form").on('submit',(function(e) {
	// alert("ramya")
	 e.preventDefault();// default action of the event will not be triggered.
	 $.ajax({
		 url: "postData.php",
		 type: "POST",
		 data:  new FormData(this),
		 contentType: false,//what type data sending for eg. json or other type
		 cache: false,//do you store that in memory
		 processData:false,//That is no conversion to string and no encodings are performed. 
		 beforeSend : function()
		 {
			 //$("#preview").fadeOut();
			 $("#err").fadeOut();
		 },
		 success: function(data)
		 {
			//  alert(data)
			 if(data=='invalid')
			 {
				 // invalid file format.
				 $("#err").html("Invalid File !").fadeIn();
			 }
			 else
			 {
				 // view uploaded file.
				// $("#preview").html(data).fadeIn();
				 $("#form")[0].reset();	
			 }
			//  $('#modal').modal('toggle');
			 setInterval('refreshPage()', 100);
		 
			},
		   error: function(e) 
		 {
			 $("#err").html(e).fadeIn();
		 } 	        
	});
 }));







});
//it will returns(loading) status of current document
function readyStateChanged() {
    alert(document.readyState);
}
// $(document).on('readystatechange', readyStateChanged); 
//for refreshing the page
function refreshPage() {
    location.reload(true);
}