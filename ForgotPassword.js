function confirmation(){
    email = document.getElementById("mail").value;
    if(Boolean(email)){
        window.location.href = "TestMaileForgot.php?mail=" + email;
    }
    else{
        document.getElementById("warning").hidden = false;
    }
}