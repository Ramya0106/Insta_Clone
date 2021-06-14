function myFunction(){
    if(document.getElementById("mail").value && document.getElementById("pass").value) {
        document.getElementById("btn").disabled = false;
    } 
    else {
        document.getElementById("btn").disabled = true;
    }
}
function logIn(){
    email = document.getElementById("mail").value;
    password = document.getElementById("pass").value;
    window.location.href = "loginConnect.php?mail=" + email + "&password=" + password;
}