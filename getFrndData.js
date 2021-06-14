$(document).ready(function(){
    $.ajax({type:'GET',url:'getFrndData.php',dataType: "json",
        success:function(response){
            if(response.data!=null){
                $('#pro').append('<div id="preview"><img id="profileImage" style="width:100%; height:100%;" alt="..." class="img-circle" src="'+response.data.profile.dp+'"></img></div>');
                if(response.data.count!= null)
                {
                    $('#followers').append('<span style="font-weight:bold; padding-left:4%">'+ response.data.count.followers +'</span>' );
                }
                else
                {
                    $('#followers').append('<span style="font-weight:bold; padding-left:4%">'+ 0 +'</span>' );
                }
                if(response.data.count_following != null)
                {
                    $('#following').append('<span style="font-weight:bold; padding-left:4%">'+ response.data.count_following.following +'</span>' );
                }
                else
                {
                    $('#following').append('<span style="font-weight:bold; padding-left:4%">'+ 0+'</span>' );
                }
                if(response.data.count_pics!=null)
                {
                    $('#post').append('<span style="font-weight:bold; padding-left:4%">'+ response.data.count_pics.post +'</span>' );
                }
                else
                {
                    $('#post').append('<span style="font-weight:bold; padding-left:4%">'+ 0 +'</span>' );
                }
                $('#name').append('<h5 >'+response.data.first.fname+ '</h5>');
                if(response.data.images!=null)
                {
                    var image_length=response.data.images.length;
                    // alert(feed_length)
                    for(var i=0 ;i<image_length;i++)
                    {
                        // alert(response.data.images[i].pics);
                        // alert(response.data.images[i].pics);
                        $('#x').append('<img id="'+i+'" style="width:32%; height:30%; margin-top:1%; margin-bottom:1%; margin-right:1%;" alt="..." class="img-thumbnail" src="'+response.data.images[i].pics+'"></img>')
                    }
                }
            }
        }
    });
});