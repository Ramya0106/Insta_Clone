$(document).ready(function(e) {

    
    // $(document).ready(function(){
        
    //     $('[data-toggle="popover"]').popover(); 
    // });
    $('body').on('click', 'button.tag', function() {
        var userID = this.value
            // alert(userID);
            //alert("ramya");
            $.ajax({
                type: "POST",
                url: 'Following.php',
                data: {section:userID},
                success: function(data)
                 {
                    // alert(data);
                    setInterval('refreshPage()', 100);
    
                 }
             });
        });
    
    });    

    $('body').on('click', '.book', function() {
        postId = this.id;
        // alert(postId);
        $.ajax({
            url: 'save_post.php',
            type: 'post',
            data: {
                'postId': postId
            },
            // async: false,
            success: function(data)
            {
                // alert(data)
                // alert(action);
                // alert(post_pics)
                // if(action == like){

                // }
               setInterval('refreshPage()', 100);   
            }
        });
    });

    $('body').on('click', '.fName', function() {
        var frndName = this.id
        window.location.assign("frndPage.php?frndName=" + frndName);

    });    
    
    function refreshPage() {
        location.reload(true);
        // $( ".art" ).load(window.location.reload + ".art" );
        // $(".art").load(" .art");
    }
    
    $(document).ready(function(){
    $("body").on('click', '.heart.fa', function() {
        var post_pics=this.id
        $clicked_btn = $(this);
        if($(this).hasClass("fa-heart"))
        {
            action = "dislike"
        }
        if($(this).hasClass("fa-heart-o"))
        {
            action = "like";
        }
        // alert(action)
        // alert(post_pics)
        $.ajax({
            url: 'post_like.php',
            type: 'post',
            data: {
                'action': action,
                'post_pics': post_pics
            },
            // async: false,
            success: function(data)
            {
                // alert(data)
                // alert(action);
                // alert(post_pics)
                // if(action == like){

                // }
               setInterval('refreshPage()', 100);   
            }
        });
        //$(this).toggleClass("fa-heart-o");
    
      });
        $("body").on('click','.cmnt.fa ',function(){
            
            //alert('div.mydiv'+this.id)
            var id='div.mydiv'+this.id;
            $(id).toggle();                                                                                                                                                                                                 
        });
        $("body").on('click','.post ',function(){
        
            var id=this.id;
            //alert(this.value)
            var value=this.value;
            // alert("value is "+value);
            var message = $('textarea#'+id).val();
            //alert("post");
            //alert(message)
            $.ajax({
                url: 'comment.php',
                type: 'post',
                data: {
                    'value': value,
                    'message':message
                },
                success: function(data)
                {
                   // alert(data)
                       // alert(data);
                        
                        setInterval('refreshPage()', 100);
        
                }
            });
        });
    
    });    
    // jQuery(document).ready(function() {
    //     $('#typeahead-input').typeahead({
    //         source: function (query, process) {
    //             return $.get('ajaxpro.php?query=' + query, function (data) {
    //                 console.log(data); 
    //                 data = $.parseJSON(data);   
    //                 return process(data);
    //             });
    //         }
    //     });
    // });
