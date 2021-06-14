function phpcall()
{
    email = document.getElementById("mail").value;
    Uname = document.getElementById("Uname").value;
    user = document.getElementById("u").value;
    pass = document.getElementById("p").value;
    birth = document.getElementById("d").value;
    console.log(user,Uname,pass,birth,email);

    
    if(Boolean(email) && Boolean(Uname) && Boolean(user) && Boolean(pass) && Boolean(birth)){
        if (validateEmail(email)) {
            //alert("CORRECT EMAIL PATTERN !")
             window.location.href = "TestMaile.php?username=" + user + "&firstname=" + Uname  + "&password=" + pass + "&bod=" + birth + "&mail=" + email ;
             //do somthign for correct flow
             }
             else {
                 alert('ENTER CORRECT EMAIL');
                 return false;
             }
    }
    else{
        console.log("Enter");
    }
    //window.location.href = "TestMaile.php";
}

function myfunction(){
    if(document.getElementById("mail").value && document.getElementById("Uname").value && document.getElementById("u").value && document.getElementById("p").value && document.getElementById("d").value) {
        document.getElementById("btn").disabled = false;
    } 
    else {
        document.getElementById("btn").disabled = true;
    }
}
function validateEmail(email) {
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
}