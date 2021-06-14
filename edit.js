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
            // alert(who);
        }
    });

    $(document).on('click','#Submit',function(){
        name1 = $("#usr").val();
        username = $("#pwd1").val();
        pass = $("#pwd").val();
        email = $("#pwd2").val();
        number = $("#nmber").val();
        dob = $("#dob").val();

        // alert(name1);
        // alert(username);
        // alert(pass);
        // alert(email);
        // alert(number);
        // alert(dob);
        var phoneno = /^\d{10}$/;
        if(number.match(phoneno)){
            $.ajax({
                url: 'edit_change.php',
                type: 'post',
                data: {
                    'name1': name1,
                    'username': username,
                    'pass':pass,
                    'email':email,
                    'number':number,
                    'dob':dob
                },
                // async: false,
                success: function(data)
                {
                    alert(data)
                }
            });
        }
        else
        {
            alert("Enter valid phone number");
        }
    });
});