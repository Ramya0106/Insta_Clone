function myFunction(){
    if(document.getElementById("cpass").value && document.getElementById("pass").value) {
        document.getElementById("btn").disabled = false;
    } 
    else {
        document.getElementById("btn").disabled = true;
    }
}

function Check(){
    if(document.getElementById("cpass").value == document.getElementById("pass").value){
        pass = document.getElementById("pass").value;
        window.location.href = "PasswordChange.php?password="+ pass;
    }
    else{
        document.getElementById("warning").hidden = false;
    }
}