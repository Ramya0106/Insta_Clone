$(document).ready(function () {
    $('.ul li a').click(function(e) {

         $('.ul li.active').removeClass('active');

         var $parent = $(this).parent();
         $parent.addClass('active');
         e.preventDefault();
     });
 });

 $("input[type='submit']").click(function() {
    $("input[id='my_file']").click();
});



function phpcall()
{
    $("#form").on('submit',(function(e) {
        //alert("ramya")
         e.preventDefault();// default action of the event will not be triggered.
         $.ajax({
             url: "proDelete.php",
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
}
$(document).on('click','#remove',function(){
    // alert("ramya");
    followerName = this.value;
    // alert(followerName);
    // alert("ramya")
    $.ajax({
        url: 'removeFollower.php',
        type: 'post',
        data: {
            'followerName': followerName,
        },
        success: function(data)
        {
            // alert(data)
            setInterval('refreshPage()', 100);   
        }
    });
});

$(document).on('click','#unfollow',function(){
    // alert("ramya");
    followingName = this.value;
    //alert(followingName);
    // alert("ramya")
    $.ajax({
        url: 'unFollow.php',
        type: 'post',
        data: {
            'followingName': followingName,
        },
        success: function(data)
        {
            //alert(data)
            setInterval('refreshPage()', 100);   
        }
    });
});

$(document).on('click','.img-thumbnail',function(){
    // alert("ramya");
    postName = $(this).attr('src');
    //alert(postName);
    // alert("ramya")
    $.ajax({
        url: 'selfPost.php',
        type: 'post',
        data: {
            'postName': postName,
        },
        success: function(data)
        {
            // alert(data)
            //setInterval('refreshPage()', 100);   
        }
    });
});