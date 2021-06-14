$(document).ready(function(){
    var who;
    $.ajax({
        url: "whoisthis.php",
        dataType: 'json',
        cache: false,
        async: false,//async:false = Code paused. (Other code waiting for this to finish.) async:true = Code continued. (Nothing gets paused. Other code is not waiting.)
        
        success: function(data) {
            who1= data.session.username;
            who = who1.replace(/\s/g,'');
        }
    });
        
        // console.log(who);
    
        $.ajax({type:'GET',url:'getData.php',dataType: "json",
        success:function(response){
            //alert(response.data.info.length)
            count = 0;
            count1 = 100;
            console.log(response)
            //alert(response.data.count.followers)
            // console.log(response.sql)
               
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
                $('#name').append('<h5 >'+response.data.first.fname+ '</h5>')
                $('#pro1').append('<img id="profileImage" alt="..." class="img-circle font-weight-bold col-lg-3 col-sm-3 col-md-3 col-xl-3 container-full" src="'+response.data.profile.dp+'" "></img>')
                
                if(response.data.info != null){
                    var follower_length=response.data.info.length;
                    for(var i=0 ;i<follower_length;i++)
                    {
                        // alert(response.data.images[i].pics);
                        $('#frnd_suggestion').append('<div class="card-body col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-n1 "><img src="'+response.data.info[i].frnds_profile+'" alt=""  class="h-100 img-circle col-lg-3 col-xl-3 col-sm-3 col-md-3 container-full"></img><div class="col-lg-6 col-sm-6 col-xl-6 col-md-6 " ><strong class="fName" role="button" id ="'+response.data.info[i].frnds_username+'">'+response.data.info[i].frnds_username+'</strong></div><button class="align-middle tag col-lg-3 col-xl-3 col-md-3 col-sm-3 " id="'+i+'" value="'+response.data.info[i].frnds_username+'">Follow</button></div><br>')
                    }
                }
                else{
                    $('#frnd_suggestion').append('<div class="card-body col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-n1 "><p>No one</p></div>');
                }
                

                if(response.data.following != null){
                    var length_following = response.data.following.length;
                    // alert(length_following);
                    for(var i = 0; i < length_following; i++){
                        // alert(response.data.following[i].profile2)
                        // $('following_name').('<p>hello</p>');
                        $('#following_name').append('<div class="row" style="height:50px width:auto;"><img src="'+response.data.following[i].profile2+'"  class="img-circle col-lg-3 col-md-3 col-xs-4 col-sm-3" alt=""><div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 text-center" style="margin-top:12px"><strong>'+response.data.following[i].frnd_name+ '</strong></div><div class="col-lg-5 col-md-5 col-xs-4 col-sm-5 text-center" style="margin-top:5px;"><button type="button" id="unfollow" value='+response.data.following[i].frnd_name+ ' class="btn btn-basic btn-sm hidden-sm hidden-xs">Unfollow</button></div></div> ');
                    }
                }
                else{
                    $('#following_name').append('<p>No One</p>');
                }

                if(response.data.follower != null){
                    var length_follower = response.data.follower.length;
                    // alert(length_follower);
                    for(var i = 0; i < length_follower; i++){
                        // alert(response.data.follower[i].profile2)
                        // $('following_name').('<p>hello</p>');
                        $('#follower_name').append('<div class="row" style="height:50px width:auto;"><img src="'+response.data.follower[i].profile3+'"  class="img-circle col-lg-3 col-md-3 col-xs-4 col-sm-3" alt=""><div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 text-center" style="margin-top:12px"><strong>'+response.data.follower[i].frnd_name2+ '</strong></div><div class="col-lg-5 col-md-5 col-xs-4 col-sm-5 text-center" style="margin-top:5px;"><button type="button" id="remove" value='+response.data.follower[i].frnd_name2+' class="btn btn-basic btn-sm hidden-sm hidden-xs">Remove</button></div></div> ');
                    }
                }
                else{
                    $('#follower_name').append('<p>No One</p>');
                }
                //alert(response.data.notification.notification_count);
                
                if(response.data.edit != null){
                    if(response.data.edit.phone != 0){
                        $('#edit').append('<div class="row sec"><img src="'+response.data.edit.profile1+'" style="margin:20px 0px 10px" class="img-circle col-lg-2 col-md-2 col-xs-3 col-sm-2" alt="Circular Image"><div class="col-lg-10 col-md-10 col-xs-9 col-sm-10"><h3>'+response.data.edit.name1+'</h3></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="usr">Name</label><div class="col-sm-10"><input type="text" class="form-control" id="usr" placeholder="Name" name="usr" value="'+response.data.edit.username2+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="name">Username</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd1" placeholder="Username" name="name" value="'+response.data.edit.name1+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="pwd">Password</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd" placeholder="Password" name="pwd" value="'+response.data.edit.password+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="mail">Email</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd2" name="mail" value="'+response.data.edit.email+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="nmber">Phone Number</label><div class="col-sm-10"><input type="text" class="form-control" id="nmber" placeholder="Phone Number" name="nmber" value="'+response.data.edit.phone+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="bod">Birth Date</label><div class="col-sm-10"><input type="date" class="form-control" id="dob" name="bod" value="'+response.data.edit.dob+'"></div></div><input type="Submit" class="btn btn-primary" style="margin:3% 45% auto 45%" id="Submit" value="Submit">')
                    }

                    else{
                        $('#edit').append('<div class="row sec"><img src="'+response.data.edit.profile1+'" style="margin:20px 0px 10px" class="img-circle col-lg-2 col-md-2 col-xs-3 col-sm-2" alt="Circular Image"><div class="col-lg-10 col-md-10 col-xs-9 col-sm-10"><h3>'+response.data.edit.name1+'</h3></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="usr">Name</label><div class="col-sm-10"><input type="text" class="form-control" id="usr" placeholder="Name" name="usr" value="'+response.data.edit.username2+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="name">Username</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd1" placeholder="Username" name="name" value="'+response.data.edit.name1+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="pwd">Password</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd" placeholder="Password" name="pwd" value="'+response.data.edit.password+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="mail">Email</label><div class="col-sm-10"><input type="text" class="form-control" id="pwd2" name="mail" value="'+response.data.edit.email+'"></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="nmber">Phone Number</label><div class="col-sm-10"><input type="text" class="form-control" id="nmber" placeholder="Phone Number" name="nmber" value=""></div></div><div class="form-group mb"><label class="control-label col-sm-2" for="bod">Birth Date</label><div class="col-sm-10"><input type="date" class="form-control" id="dob" name="bod" value="'+response.data.edit.dob+'"></div></div><input type="Submit" class="btn btn-primary" style="margin:3% 45% auto 45%" id="Submit" value="Submit">')
                    }
                }
                if(response.data.save !=null)
                    {
                        var image_length=response.data.save.length;
                        // alert(feed_length)
                        for(var i=0 ;i<image_length;i++)
                        {
                            // alert(response.data.images[i].pics);
                            // alert(response.data.images[i].pics);
                            $('#menu1').append('<img role = "button" value='+response.data.save[i].savePath+' id="'+i+'" style="width:32%; height:30%; margin-top:1%; margin-bottom:1%; margin-right:1%;" alt="..." class="img-thumbnail" src="'+response.data.save[i].savePath+'"></img>')
                        }
                    }
                if(response.data.feed != null)
                {
                    // console.log('aaraha hu main');
                    var feed_length=response.data.feed.length;
                    // alert(feed_length);
                    if(response.data.images!=null)
                    {
                        var image_length=response.data.images.length;
                        // alert(feed_length)
                        for(var i=0 ;i<image_length;i++)
                        {
                            // alert(response.data.images[i].pics);
                            // alert(response.data.images[i].pics);
                            $('#x').append('<img role = "button" value='+response.data.images[i].pics+' id="'+i+'" style="width:32%; height:30%; margin-top:1%; margin-bottom:1%; margin-right:1%;" alt="..." class="img-thumbnail" src="'+response.data.images[i].pics+'"></img>')
                        }
                    }
                    for(var i=0;i<feed_length;i++)
                    {
                        var jsonArray =  jQuery.parseJSON(response.data.feed[i].post_like)
                        console.log(jsonArray)
                        total_likes = 0;
                        who_likes = [];
                        var flag1="false";
                        // var name= '<?php echo $_SESSION["username"];?>';
                        // console.log($_SESSION["username"])
                        $.each(jsonArray, function(index,jsonObject){
                            $.each(jsonObject, function(key,val){
                                // console.log("key : "+key+" ; value : "+val);
                                if(key=="action" & val=='like'){
                                    total_likes = total_likes+parseInt('1');
                                }
                                if(key=="username"){
                                    // alert(who+"=whoo")
                                    if(val == who)
                                    {
                                        // alert("inside true")
                                        flag1="true";
                                        
                                    }
                                    who_likes.push(val);
                                }
                            });
                        });
                        //console.log("length :"+total_likes);
                        // console.log("who likes"+who_likes);
                        var jsonArray1 =  jQuery.parseJSON(response.data.feed[i].post_cmnt)
                        // alert(jsonArray1)
                        total_cmnt = 0;
                        who_cmnt = [];
                        cmnt=0;
                        cmnt_info=[];
                        time = [];
                        $.each(jsonArray1, function(index,jsonObject1){
                            $.each(jsonObject1, function(key1,val1){
                                //console.log("key : "+key1+" ; value : "+val1);
                                
                                if(key1=="username"){
                                    who_cmnt.push(val1);
                                    //console.log("this" + who_cmnt);
                                    
                                }
                                if(key1=="cmnt"){
                                    cmnt = cmnt+parseInt('1');
                                    //console.log("total"+cmnt)
                                }
                                if(key1=="cmnt")
                                {
                                    cmnt_info.push(val1);
                                    //console.log("comnt info"+cmnt_info)
                                }
                                if(key1=="time")
                                {
                                    time.push(val1)
                                }
                                
                            });
                        });

                    
                    
                        if(flag1=="true")
                        {
                            // alert(flag1+"like");
                            count = count +1;
                            count1 = count1 +1;
                            // alert("get"+response.data.feed[i].pics1);
                            $('#feed_article').append('<article class="art"><header><img src="'+response.data.feed[i].profile1+'" alt="" style="width:40px; margin-right:4%;" class="img-circle">'+response.data.feed[i].username1+'</img><a href=""><i class="fa fa-ellipsis-h pull-right center-block" style="color:black; font-size:200%"></i></a></header><div class="image" style="padding-bottom:125%;"><img  alt="not found" src="'+response.data.feed[i].pics1+'" class="ttt"></img></div><div class="art2"><section class="sec"><span id="'+response.data.feed[i].pics1+'" class="heart fa fa-heart"  style=" font-size:28px;" role="button"></span><span class="cmnt fa fa-comment-o" id="'+count1+'" value="'+response.data.feed[i].pics1+'" style="color:black; font-size:28px;" role="button" ></span><span class="fa fa-paper-plane-o" style="color:black; font-size:28px;" role="button"></span><span data-toggle="tooltip" title="Save" class="book fa fa-bookmark-o" id="'+response.data.feed[i].pics1+'" style="color:black; font-size:28px; margin-left:auto; margin-right:-16px;"></span></section><strong style="background-color:transparent;">'+total_likes+'&nbsplikes</strong ></br><strong>'+cmnt+' &nbspcomments</strong></br><strong style="background-color:transparent;">'+response.data.feed[i].time+'</strong><div style="margin-top:1%;"><textarea id="'+count+'" placeholder="add a comment.."></textarea><button id="'+count+'" type="submit" class="post" value="'+response.data.feed[i].pics1+'" style="float:right;background-color:transparent;border:none;color:#0095f6;outline:none;"><strong>POST</strong></button></div><div id="Comment" class="mydiv'+count1+'" style="background-color:transparent;"></div></div><article>')
                            $("div.mydiv"+count1).toggle();
                            //$('#feed_image').append('<img  alt="not found" src="'+response.data.feed[i].pics1+'" class="ttt"></img>')
                            // setInterval('refreshPage()', 100);

                        }
                        else{
                            // alert(flag1+"dislike")
                            count = count +1;
                            count1 = count1 +1;                           
                            $('#feed_article').append('<article class="art"><header><img src="'+response.data.feed[i].profile1+'" alt="" style="width:40px; margin-right:4%;" class="img-circle">'+response.data.feed[i].username1+'</img><a href=""><i class="fa fa-ellipsis-h pull-right center-block" style="color:black; font-size:200%"></i></a></header><div class="image" style="padding-bottom:125%;"><img  alt="not found" src="'+response.data.feed[i].pics1+'" class="ttt"></img></div><div class="art2"><section class="sec"><span id="'+response.data.feed[i].pics1+'" class="heart fa fa-heart-o"  style=" font-size:28px;" role="button"></span><span  class="cmnt fa fa-comment-o" id="'+count1+'" value="'+response.data.feed[i].pics1+'" style="color:black; font-size:28px;" role="button"></span><span class="fa fa-paper-plane-o" style="color:black; font-size:28px;" role="button"></span><span id="'+response.data.feed[i].pics1+'" class="book fa fa-bookmark-o" data-toggle="tooltip" title="Save" style="color:black; font-size:28px; margin-left:auto; margin-right:-16px;"></span></section><strong style="background-color:transparent;">'+total_likes+'&nbsplikes</strong ></br><strong>'+cmnt+' &nbspcomments</strong></br><strong style="background-color:transparent;">'+response.data.feed[i].time+'</strong><div style="margin-top:1%;"><textarea id="'+count+'" placeholder="add a comment.."></textarea><button id="'+count+'" type="submit" class="post" value="'+response.data.feed[i].pics1+'" style="float:right;background-color:transparent;border:none;color:#0095f6;outline:none;"><strong>POST</strong></button></div><div id="Comment" class="mydiv'+count1+'" style="background-color:transparent;"></div></div<article>')
                            $("div.mydiv"+count1).toggle();
                            //$('#feed_image').append('<img  alt="not found" src="'+response.data.feed[i].pics1+'" class="ttt"></img>')
                            // setInterval('refreshPage()', 100);
                        }
                    
                        for(var j=0;j<cmnt;j++)
                        {
                            // console.log("here"+cmnt_info[j])
                            // console.log("username"+who_cmnt[j]);
                            $("div.mydiv"+count1).append('<div style="background-color:transparent;padding-bottom:2%;"><strong style="margin-right:3%;">'+ who_cmnt[j] +'</strong>'+cmnt_info[j]+'<h6>'+time[j]+'</h6><br></div>' );
                        }


                    }
                
                    if(response.data.notification.notification_count == 0)
                    {
                        $('#noti').append('');
                    }
                    else
                    {
                        $('#noti').append('<span class="badge badge-light">'+response.data.notification.notification_count+'</span>');
                    }

                
                
                    // console.log('aaraha hu main');
                
                }
                if(response.data.activity!= null)
                {
                    // alert(response.data.activity.UnSorted_Activity[1])
                    var total_data = response.data.activity.UnSorted_Activity.length;
                    // alert(total_data)

                    // for(var i = 0; i < total_data; i++){
                        var jsonArray2 =  jQuery.parseJSON(response.data.activity.UnSorted_Activity[total_data-1]);
                        //alert(response.data.activity.UnSorted_Activity[i])
                        if(jsonArray2 != null){
                            //alert(jsonArray2)
                            var array = jsonArray2;
                            array.sort(function (a, b) {
                                return b.time.localeCompare(a.time);
                            });
                            // alert(array)
                            var total = 0;
                            var name = [];
                            var pics = [];
                            var time = [];
                            var react = [];
                            $.each(array, function(index,jsonObject1){
                                $.each(jsonObject1, function(key2,val2){
                                    // alert("key : "+key2+" ; value : "+val2);
                                    if(key2=="username"){
                                        name.push(val2);
                                        //console.log("this" + name);
                                        total= total+parseInt('1');
                                    }
                                    if(key2=="pics3"){
                                        pics.push(val2);
                                        //console.log("this pics" + pics);
                                    }
                                    if(key2=="time"){
                                        time.push(val2);
                                        //console.log("this pics" + pics);
                                    }
                                    if(key2 == "cmnt" || key2 == "action")
                                    {
                                        react.push(key2);
                                        //console.log("this react" + react);

                                    }
                                });
                            });
                            for(var j=0;j<total;j++)
                            {                            
                                // alert("hii")
                                if(react[j] == "action")
                                {
                                    $("#activity").append('<div class="col-xs-12 col-lg-12 col-xl-12 col-md-12 col-sm-12" style="background-color:#ffffff;margin-bottom:3%;"><img src="'+pics[j]+'" class="h-100 img-circle col-xs-2 col-lg-1 col-xl-1 col-sm-1 col-md-1 container-full"></img><p><strong>'+name[j]+'</strong>&nbsp&nbsp liked your photo &nbsp '+time[j]+' ago</p></div>')
                            
                                }
                                else
                                {
                                    $("#activity").append('<div class="col-xs-12 col-lg-12 col-xl-12 col-md-12 col-sm-12" style="background-color:#ffffff;margin-bottom:3%;"><img src="'+pics[j]+'" class="h-100 img-circle col-xs-2 col-lg-1 col-xl-1 col-sm-1 col-md-1 container-full"></img><p><strong>'+name[j]+'</strong>&nbsp&nbsp commented on  your photo &nbsp '+time[j]+' ago</p></div>')
                                }
                            }
                            // alert("total"+total)
                        }
                        // else{
                        //     alert("Null data")
                        // }
                    // }

                    // var jsonArray2 =  jQuery.parseJSON(response.data.activity.UnSorted_Activity);

                    // var array = jsonArray2;
                    
                    // array.sort(function (a, b) {
                    //     return b.time.localeCompare(a.time);
                    // });
                    // // alert(array)
                    // var total = 0;
                    // var name = [];
                    // var pics = [];
                    // var time = [];
                    // var react = [];
                    // $.each(array, function(index,jsonObject1){
                    //     $.each(jsonObject1, function(key2,val2){
                    //         //console.log("key : "+key2+" ; value : "+val2);
                    //         if(key2=="username"){
                    //             name.push(val2);
                    //             //console.log("this" + name);
                    //             total= total+parseInt('1');
                    //         }
                    //         if(key2=="pics3"){
                    //             pics.push(val2);
                    //             //console.log("this pics" + pics);
                    //         }
                    //         if(key2=="time"){
                    //             time.push(val2);
                    //             //console.log("this pics" + pics);
                    //         }
                    //         if(key2 == "cmnt" || key2 == "action")
                    //         {
                    //             react.push(key2);
                    //             //console.log("this react" + react);

                    //         }
                    //     });
                    // });
                    // for(var j=0;j<total;j++)
                    // {                            
                    //     // alert("hii")
                    //     if(react[j] == "action")
                    //     {
                    //         $("#activity").append('<div class="col-xs-12 col-lg-12 col-xl-12 col-md-12 col-sm-12" style="background-color:#ffffff;margin-bottom:3%;"><img src="'+pics[j]+'" class="h-100 img-circle col-xs-2 col-lg-1 col-xl-1 col-sm-1 col-md-1 container-full"></img><p><strong>'+name[j]+'</strong>&nbsp&nbsp liked your photo &nbsp '+time[j]+' ago</p></div>')
                    
                    //     }
                    //     else
                    //     {
                    //         $("#activity").append('<div class="col-xs-12 col-lg-12 col-xl-12 col-md-12 col-sm-12" style="background-color:#ffffff;margin-bottom:3%;"><img src="'+pics[j]+'" class="h-100 img-circle col-xs-2 col-lg-1 col-xl-1 col-sm-1 col-md-1 container-full"></img><p><strong>'+name[j]+'</strong>&nbsp&nbsp commente on  your photo &nbsp '+time[j]+' ago</p></div>')
                    //     }
                    // }
                    // // alert("total"+total)
                    
                }
                
            }
            else{
                alert("User not found...");
            }
        }
    
    });

});
